<?php

/**
 * 
 * @desc Manage the RBAC Tree, extends AuthItemChild
 * @author steffomio
 *
 */
class RBACTree extends AuthItemChild
{
	
	/**
	 * runtime Vars move Item
	 */
	public $moveTo;
	public $moveFrom;
	
	/**
	 * runtime Vars edit Item
	 */
	public $item;
	
	/**
	 * checkRecursion() switch this to true if check was positive
	 * used from moveItem()
	 */
	private $rekursionCheck = false;
	private $rekursionCheckDepthLimit=300;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return AuthItemChild the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Move Item in RBAC Tree
	 * @throws CHttpException if no recursion check was detected
	 */
	public function moveItem(){
		if(!$this->rekursionCheck) throw new CHttpException("No valid recursionCheck detected");
		$this->parent = $this->moveTo;
		$this->child = $this->moveFrom;
		$this->save();
		$foo=1;
	}
	
	/**
	 * 
	 * @desc check if User is assigned to an AuthItem
	 * @param string $username from table user.username
	 * @param string $itemname from table authAssignment.itemname
	 * @return boolean
	 */
	public function userIsAssigned($username, $itemname)
	{
		return (AuthAssignment::model()->findByAttributes(array('unserid'=>$username, 'itemname'=>$itemname)) !== null ? true : false);
	}
	
	/**
	 * @desc make exist- and recursioncheck before moving Items
	 */
	public function checkRecursion(){
		$model = new AuthItemChild;
		// climb up moveTo tree and search for moveFrom Item.
		$source = $this->moveFrom;
		$target = $this->moveTo;
		//quick precheck if moving items are nowhere in the Tree
		if(!$model->findByAttributes(array('child'=>$source)) && !$model->findByAttributes(array('parent'=>$source)))
		{
			$this->rekursionCheck = true;
			return true;
		}
		/*
		 * this is a bit tricky, cause we can not search by child in top level
		 * so we have to switch searching one last time by parent if no more items are found with searching by child
		 */
		$column = 'child';
		
		$currentItem = $target;
		$depth = 0;
		$depthLimit = $this->rekursionCheckDepthLimit;
		while(true){
			$result = $model->findAllByAttributes(array("$column"=>$currentItem));
			if(!count($result) && $column == 'parent')
			{
				// nothing found in child column
				// this switch should never entered with $column == 'parent'
				$this->rekursionCheck = true;
				return true;
			}elseif(!count($result)){
				// top Level Items can't be detected via child, so we make last search again in column parent
				$column = 'parent';
				continue;
			}
			// check parents if they are same with source
			foreach($result as $row){
				if($row->parent == $source)
				{
					$this->rekursionCheck = false;
					return false;
				}
			}
			// last top level Item was checked
			if($column == 'parent')
			{
				$this->rekursionCheck = true;
				return true;
			}
			$currentItem = $row->parent;
			if($depth++ >= $depthLimit) throw new CHttpException("CheckRecursion Error: Depthlimit of $depthLimit parents executed");
		}
		return $this->rekursionCheck;
	}
	
	
	/**
	 * 
	 * @return the RBAC Item Tree
	 */
	public function getItemTree()
	{	
		$rbacTree = $this->_buildItemTree(array(), 0);
		return $rbacTree;
	}
	
	/**
	 * 
	 * @desc recursive method 
	 * @uses AuthItem::findUnboundItems()
	 * @param array $tree Part of or empty array as main RBAC Tree container
	 * @param integer $depth the Tree depth, which is not realy needed and nowhere used yet
	 * @return array with AuthItem ['this', 'childs' => ['this', 'childs[...]]]
	 * 
	 */              
	private function _buildItemTree($tree, $depth)
	{	
		if(count($tree) < 1)
		{
			/*
			 * find the Top Level Items with its childs
			 * 
			 * SELECT 
			 * 		`t`.`parent` AS `t0_c0`, 
			 * 		`t`.`parent` AS `t0_c0`, 
			 * 		`t`.`child` AS `t0_c1`, 
			 * 		`parents`.`parent` AS `t1_c0`, 
			 * 		`parents`.`child` AS `t1_c1`, 
			 * 		`items`.`name` AS `t2_c0`, 
			 * 		`items`.`type` AS `t2_c1`, 
			 * 		`items`.`description` AS `t2_c2`, 
			 * 		`items`.`bizrule` AS `t2_c3`, 
			 * 		`items`.`data` AS `t2_c4` 
			 * FROM `AuthItemChild` `t`  
			 * LEFT OUTER JOIN `AuthItemChild` `parents` 
			 * 		ON (`parents`.`child`=`t`.`parent`)  
			 * LEFT OUTER JOIN `AuthItem` `items` 
			 * 		ON (`t`.`child`=`items`.`name`)  
			 * WHERE (parents.parent IS NULL) 
			 * ORDER BY t.parent
			*/
			$result = $this->findAll(array(
				'with' => array('parents', 'childs'),
				'condition' => 'parents.parent IS NULL',
				'order' => 'parents.parent DESC'
				)
			);
			$depth++;
			$tree['depth'] = 0;
			$tree['parent-name'] = null;
			$tree['this-name'] = null;
			$tree['this'] = null;
			$tree['childs'] = array();
			$modelAuthItem = new AuthItem();
			//if(!count($result)) return $tree;
			foreach($result as $row)
			{
				$cnt = count($tree['childs']) - 1;
				if(isset($tree['childs'][0]) && $tree['childs'][$cnt]['this-name'] == $row->parent)
				{
					// build second depth in existing first depth
					$tree['childs'][$cnt]['childs'][] = $this->_buildItemTree(array(
									'depth' => $depth + 1,
									'parent-name' => $row->parent,
									'this-name' => $row->childs->name,
									'this' => $row->childs,
									'childs' => array()), $depth + 1
									);
				}else{
					// build new first depth and included second depth
					$tree['childs'][] = array(
								'depth' => $depth,
								'parent-name' => null,
								'this-name' => $row->parent,
								'this' => $modelAuthItem->findByAttributes(array('name'=>$row->parent)),
								'childs' => array($this->_buildItemTree(array(
									'depth' => $depth + 1,
									'parent-name' => $row->parent,
									'this-name' => $row->childs->name,
									'this' => $row->childs,
									'childs' => array()), $depth + 1)
									)
								);
				}
			}
			// add unbound items
			$model = new AuthItem();
			$unboundItems = $model->findUnboundItems();
			foreach($unboundItems as $item)
			{
				$child = array(
					'depth' => 1, 
					'parent-name' => null, 
					'this-name' => $item->name,
					'this' => $item,
					'childs' => array(),
				);
				array_unshift($tree['childs'], $child);
			}
			return $tree;
		}else{
			/*
			 * SELECT 
			 * 		`t`.`parent` AS `t0_c0`, 
			 * 		`t`.`child` AS `t0_c1`, 
			 * 		`childs`.`name` AS `t1_c0`, 
			 * 		`childs`.`type` AS `t1_c1`, 
			 * 		`childs`.`description` AS `t1_c2`, 
			 * 		`childs`.`bizrule` AS `t1_c3`, 
			 * 		`childs`.`data` AS `t1_c4` 
			 * FROM `AuthItemChild` `t`  
			 * LEFT OUTER JOIN `AuthItem` `childs` 
			 * 		ON (`t`.`child`=`childs`.`name`)  
			 * WHERE (`t`.`parent`=:yp0) 
			 * ORDER BY childs.name
			 */
			$ct=new CDbCriteria(array('order' => 'childs.name'));
			$ct->addColumnCondition(array('t.parent'=>$tree['this']->name));
			$result = AuthItemChild::model()->with('childs')->findAll($ct);
			
			/*
			$result = $this->findAllByAttributes(
				array('parent'=>$tree['this']->name),
				array(
					'with' => 'childs',
					//'condition' => array('t.parent'=>$tree['this']->name),
					'order' => 'childs.name',
					)
			);
			*/
			$depth++;
			if (count($result) > 0)
			{
				foreach($result as $row){
					$tree['childs'][] = $this->_buildItemTree(
						array(
							'depth' => $depth,
							'parent-name' => $row->parent,
							'this-name' => $row->childs->name,
							'this' => $row->childs, 
							'childs' => array()
						), $depth
					);
				}
			}
			return $tree;
		}
	}
	
}