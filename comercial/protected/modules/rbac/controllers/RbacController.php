<?php

class RbacController extends RBACBaseController
{
	public $ejectItemsGet=array();
	public $ejectItemsPost=array();
	
	public $editItem;
	public $authItem;
	
	public $filterNames='/^[a-zA-Z]+[a-zA-Z0-9-_]+/';
	/*
	 * @desc this is called by default and after each action of this controller
	 */
	public function actionIndex()
	{
		$this->checkAccess('RbacViewer', true);
		$model=new RBACTree;
		if(isset($_GET['createNew'])) 
			$this->editItem=AuthItem::model();
		$treeFormat = 'renderItemTree';
		if(isset($_GET['generateCode']))
		{
			$treeFormat = 'renderCode';
		}elseif(isset($_GET['item']) || isset($_GET['createNew']) || (!empty($_POST) && count($this->messageErrors))){
			$treeFormat = 'renderItemInfo';
		}
		
		$this->doRender('index', array(
			'model'=>$this,
			'displayHelper'=>new RBACDisplayHelper($this, $treeFormat),
			'treeFormat'=>$treeFormat,
			'ejectItemsGet'=>$this->ejectItemsGet,
			'ejectItemsPost'=>$this->ejectItemsPost,
			'editItem'=>$this->editItem,
			'authItem'=>$this->authItem,
			'nameFilter'=>$this->filterNames
			)
		);
	    Yii::app()->end();
	}
	
	
	
	/**
	 * 
	 * @desc
	 */
	public function actionEdit()
	{
		$this->checkAccess('RbacViewer', true);
		$model=new AuthItem;
		if(empty($_POST)){
			if(isset($_GET['item']))
			{
				if(in_array($_GET['item'], $this->protectedItems))
				{
					$this->messageErrors[]="Warning! Item is protected by Controller";
				}
				$model->attributes=$_GET;
				if($model->validate()){
					$name=urldecode($_GET['item']);
					if($item=$model->findByAttributes(array('name'=>$name))){
						// display edit Item box
						$this->editItem=$item;
						$this->actionIndex();
					}else{
						$this->messageErrors[]="The Item you want to edit does not exist";
					}
				}else{
					$this->messageErrors[]="Unsecure Data detected. Please mail the Siteadmin if this Problem returns.";
				}
			}else{
				//ignore missing item and display index
				$this->actionIndex();
			}
		}else{
			$this->checkAccess('RbacEditor', true);
			// filter names
			$_POST['editItem']['name']=$this->filterString($_POST['editItem']['name'], $this->filterNames);
			$model->attributes=$_POST['editItem'];
			$oldName=$_POST['oldName'];
			if(in_array($oldName, $this->protectedItems) || in_array($_POST['editItem']['name'], $this->protectedItems))
			{
				$this->messageErrors[]="Sorry, Item is protected by Controller";
				$this->actionIndex();
			}
			if($model->validate()){
				if(isset($_POST['updateItem']))
				{
					$this->_updateItem($_POST['editItem'], $oldName);
				}elseif(isset($_POST['createItem']))
				{
					if(!AuthItem::model()->findByAttributes(array('name'=>$_POST['editItem']['name'])))
					{
						$model->setIsNewRecord(true);
						$model->save();
						$this->messageSuccess[]="Item {$_POST['editItem']['name']} successfull created.";
					}else{
						$this->messageErrors[]="Create Error: New Item <i>{$_POST['editItem']['name']}</i> already exists";
						$this->editItem=$model;
						$this->actionIndex();
					}
				}elseif(isset($_POST['deleteItem']))
				{
					AuthItem::model()->deleteAllByAttributes(array('name'=>$oldName));
					AuthItemChild::model()->deleteAllByAttributes(array('parent'=>$oldName));
					AuthItemChild::model()->deleteAllByAttributes(array('child'=>$oldName));
					AuthAssignment::model()->deleteAllByAttributes(array('itemname'=>$oldName));
					$this->messageSuccess[]="Item $oldName successfull deleted.";
				}else
				{
					// ignore not existing submit option and render page
				}
				$this->actionIndex();
			}else{
				//use Yii error system
				$model->setIsNewRecord(true);
				$this->editItem=$model;
				$this->actionIndex();
			}
		}
	}
	
	/**
	 * 
	 * @desc 
	 * @param unknown_type $model
	 * @param unknown_type $attributes
	 * @param unknown_type $oldName
	 */
	private function _updateItem($attributes, $oldName)
	{
		if(in_array($oldName, $this->protectedItems) || in_array($attributes['name'], $this->protectedItems))
		{
			$this->messageErrors[]="Sorry, Item is protected by Controller";
			$this->actionIndex();
		}
		if(!$item=AuthItem::model()->findByAttributes(array('name' => $oldName)))
		{
			$this->messageErrors[]="Edit Error: Update Item does not exist";
			$this->actionIndex();
		}
		
		if($attributes['type']==0 && $item->type>0)
		{
			if(count(AuthItemChild::model()->findAllByAttributes(array('parent'=>$oldName))))
			{
				$this->messageErrors[]="Type <i>Action</i> can't have Childs.<br/>Please eject Childs from <i>$oldName</i> before switch type to <i>Operation</i>";
				$this->editItem=$item;
				$this->actionIndex();
			}
		}
		
		if($attributes['name'] != $oldName)
		{
			
			if(AuthItem::model()->findByAttributes(array('name'=>$attributes['name'])))
			{
				$this->messageErrors[]="Create Error: New Item <i>{$_POST['editItem']['name']}</i> already exists";
				//
				return;
			}
			$item->attributes=$attributes;
			$item->save();
			// update RBAC-Tree AuthItemChild bindings in parent
			$newName=$attributes['name'];
			$treeItems=AuthItemChild::model()->findAllByAttributes(array('parent'=>$oldName));
			foreach($treeItems as $treeItem)
			{
				$treeItem->parent=$newName;
				$treeItem->save();
			}
			// update RBAC-Tree AuthItemChild bindings in child
			$treeItems=AuthItemChild::model()->findAllByAttributes(array('child'=>$oldName));
			foreach($treeItems as $treeItem)
			{
				$treeItem->child=$newName;
				$treeItem->save();
			}
			// update AuthAssignment bindings in itemname
			$assignments=AuthAssignment::model()->findAllByAttributes(array('itemname'=>$oldName));
			foreach($assignments as $assignment)
			{
				$assignment->itemname=$newName;
				$assignment->save();
			}
		}else{
			// simple update if primary key is same
			$item->attributes=$attributes;
			$item->save();
		}
		$this->messageSuccess[]="Item ". (!isset($newName) ? $oldName : $newName)." successfull updated.";
	}
	
	/**
	 * @desc collect _POST and _GET Data, compare and validate->required them.
	 * @desc on fail abort eject and actionIndex
	 * @return array ('parent'=>string, 'child'=>string)
	 */
	private function validateEject()
	{
		// collect vars
		if(empty($_POST))
		{
			if(!isset($_GET['parent'])){
				$this->messageErrors[]="Eject Error: Item ".$_GET['child']." is already ejected or in top Level";
				$this->actionIndex();
			}
			$itemNames=array('parent'=>urldecode($_GET['parent']), 'child'=>urldecode($_GET['child']));
		}else{
			$itemNames=array('parent'=>urldecode($_POST['eject']['parent']), 'child'=>urldecode($_POST['eject']['child']));
		}
		$model=new AuthItemChild;
		$model->attributes=$itemNames;
		if(!$model->validate())
		{
			$this->messageErrors[]="Unsecure Data detected. Please mail the Siteadmin if this Problem returns.";
			$this->actionIndex();
		}
		return $itemNames;
	}
	
	/**
	 * 
	 */
	public function actionEject()
	{
		$this->checkAccess('RbacViewer', true);
		$itemNames=$this->validateEject();
		$model=new AuthItem();
		// check only if parent is protected
		if(in_array($itemNames['parent'], $this->protectedItems))
		{
			if(in_array($itemNames['child'], $this->protectedItems))
			{
				$this->messageErrors[]="Warning! Item is protected by Controller";
			}
		}
		$child=$model->findByAttributes(array('name'=>$itemNames['child']));
		$parent=$model->findByAttributes(array('name'=>$itemNames['parent']));
		
		if(empty($_POST)){
			if(!$child || !$parent){
				$this->messageErrors[]="One ore more Item(s) does not exist";
				$this->actionIndex();
			}else{
				$this->ejectItemsGet=array('parent'=>$parent, 'child'=>$child);
			}
		}else{
			$this->checkAccess('RbacEditor', true);
			$model=AuthItemChild::model();
			$model->attributes=array('parent'=>$parent->name, 'child'=>$child->name);
			$model->delete();
			$this->messageSuccess[]="Item {$child->name} successfull ejected from {$parent->name}.";
			
		}
		$this->actionIndex();
	}
		
	/**
	 * 
	 * @desc
	 */
	public function actionMove()
	{
		$this->checkAccess('RbacViewer', true);
		if(!empty($_POST))
		{
			
			$this->checkAccess('RbacEditor', true);
			$from=isset($_POST['moveFromItem']) ? $_POST['moveFromItem'] : null;
			$to=isset($_POST['moveToItem']) ? $_POST['moveToItem'] : null;
		
			// check only if parent is protected
			if(in_array($to, $this->protectedItems))
			{
				if(in_array($from, $this->protectedItems))
				{
					$this->messageErrors[]="Sorry, Item is protected by Controller";
					$this->actionIndex();
				}
			}
			if(!$from || !$to || $from==$to)
			{
				$this->messageErrors[]="Please select Parent- and Childitem and care that they are not same.";
				$this->actionIndex();
			}
			// default validate
			$model=new AuthItemChild;
			$model->attributes=array('child'=>$from, 'parent'=>$to);
			if(!$model->validate())
			{
				$this->messageErrors[]="Post validation Error. Please mail Siteadmin if this Error returns.";
				$this->actionIndex();
			}
			// check if branch already exists
			if($model->findByAttributes(array('child'=>$from, 'parent'=>$to)) !== null)
			{
				$this->messageErrors[]="Create Brunch Error: Brunch already exists.";
				$this->actionIndex();
			}
			
			// Items exist?
			$model=new AuthItem;
			if(!count($model->findByAttributes(array('name'=>$from))) || !count($model->findByAttributes(array('name'=>$to))))
			{
				$this->messageErrors[]="Check Items exists Error. Please mail Siteadmin if this Error returns.";
				$this->actionIndex();
			}
			// make recursioncheck and move Items
			$model=new RBACTree;
			$model->moveFrom=$from;
			$model->moveTo=$to;
			if($model->checkRecursion())
			{
				$model->moveItem();
				$this->messageSuccess[]="Item $from successfull moved to $to.";
			}else{
				$this->messageErrors[]="Can't move Selection cause that will produce a Recursion.
				<br>If you can't see producing a Recursion, it may help to eject Item before moving it.";
				$this->actionIndex();
			}
		}
		$this->actionIndex();
	}
}