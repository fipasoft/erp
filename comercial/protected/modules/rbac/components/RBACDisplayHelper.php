<?php

/**
 * 
 * @desc see renderTree() and displayErrors() of this Class
 * @author steffomio
 *
 */
class RBACDisplayHelper
{
	private $colUsername;
	private $colUserid;
	private $_rbacTree;
	private $_model;
	private $_context;
	public $treeFormat;
	public $types=array(
			'Operation', 
			'Task', 
			'Role'
		);
	// only needed from renderCode
	private $_renderedItems=array();
	
	private $_user; // needed in renderItemAssign()
	
	/**
	 * 
	 * @desc see renderTree() and displayErrors() of this Class
	 * @param object $model RbacController
	 * @param string $context method of item renderer
	 */
	public function __construct($model, $context)
	{
		$this->colUsername=Yii::app()->controller->module->columnUsername;
		$this->colUserid=Yii::app()->controller->module->columnUserid;
		$this->_model=		$model;
		$this->treeFormat = array(
			'groupIn' => 	'<table id="rbacFolder" ><tr><td>'."\n",
			'groupOut' => 	'</td></tr></table>'."\n",
			'itemIn' => 	'<tr><td id="rbacFolder">'."\n",
			'itemOut' => 	'</td></tr>'."\n",
		);
		$this->_context=	$context;
		$treeBuilder=new RBACTree;
		$this->_rbacTree=$treeBuilder->getItemTree();
		
	}
	
	public function hasItems()
	{
		return count($this->_rbacTree['childs'])>0;
	}
	
	/**
	 * 
	 * @desc Load RBAC Tree from Database and render it to a nice HTML Tree with its Form buttons. Form header, footer and submit Buttons are not includet.
	 * @uses class RBACTree
	 * @param string $renderPrefix
	 * @param string $renderSuffix
	 */
	public function renderTree($renderPrefix='', $renderSuffix='')
	{
		$html=$this->_walkTree($this->_rbacTree['childs'], '');
		return $renderPrefix.$html.$renderSuffix;
	}
	
	/**
	 * 
	 * @desc return html string of Itemname by type
	 * @param string $name itemname
	 * @param integer $type 0-2
	 */
	private function _displayName($name, $type)
	{
		if($type==0){
			return '<i>'.$name.'</i>';
		}elseif($type==1){
			return '<b>'.$name.'</b>';
		}elseif($type==2){
			return '<big><b>'.$name.'</b></big>';
		}
		return $name;
	}
	
	/**
	 * @desc render the RBAC Tree
	 * @uses function renderItem
	 * @param array $tree part of RBAC Tree
	 * @param string $out render result
	 * @param string $this->treeFormat html Tree format
	 * @return string $out render result
	 */
	private function _walkTree($tree, $out)
	{
		$context = $this->_context;
		$closed = false;
		foreach($tree as $child)
		{
			$out .= $this->treeFormat['groupIn'].$this->treeFormat['itemIn'].$this->{$this->_context}($child);
			if(count($child['childs']) > 0)
			{
				$out = $this->_walkTree($child['childs'], $out).$this->treeFormat['itemOut'].$this->treeFormat['groupOut'];
				$closed = true;
			}
			if(!$closed) $out .= $this->treeFormat['itemOut'].$this->treeFormat['groupOut'];
			$closed = false;
		}
		return $out;
	}
	
	/**
	 * @desc render RBAC Item in context "Move"
	 * @param array $item
	 * @return string rendered RBAC Item
	 */
	public function renderItemTree($child)
	{
		$urlPrefix='index.php?r=';
		$item = $child['this'];
		$out = "\n";
		$types = $this->types;
		
		$hrefItemName='<a  id="rbacItem'.$item->type.'" href="'.$this->_model->createUrl('rbac/edit', array('item' => $item->name)).'">'.$item->name.'</a>';
		
		// Manage Tree Header
		$out .= '
		<table id="rbacItem" ><tr>
				<th width="10%" id="rbacItem'.$item->type.'" >'.$this->_displayName($hrefItemName, $item->type).'</th>'
				.'<th width="5%" id="rbacItem" '.($item->type < 1 ? 'colspan="2"' : '').'><b>Make this</b></th>'
				.($item->type > 0 ? '<th width="10%" id="rbacItem" ><b>to Child<br>of this</b></th>' : '').'</th>'
				.'<th width="5%" id="rbacItem" ><b>Type</b></th>'
				.'<th width="20%" id="rbacItem" ><b>Description</b></th>'
				.'<th width="20%" id="rbacItem" ><b>Buisness Rule</b></th>'
				.'<th width="5%" id="rbacItem" ><b>Data</b></th>
			</tr>
			';
		$getVars = ($child['parent-name'] !== null ? array('child' => $child['this-name'], 'parent' => $child['parent-name']) : array('child' => $child['this-name']));
		$out .= '
			<tr>
				<td id="rbacItem" >'.($child['parent-name'] !== null ? '<a href="'.$this->_model->createUrl('rbac/eject', $getVars).'">Eject</a>' : '').'</td>'
				.'<td id="rbacItem" '.($item->type < 1 ? 'colspan="2">' : '>').CHtml::radioButton('moveFromItem', false, array('value' => $item->name)).'</td>'
				.($item->type > 0 ? '<td id="rbacItem" >'.CHtml::radioButton('moveToItem', false, array('value' => $item->name)).'</td>' : '') 
				.'<td id="rbacItem" >'.$types[$item->type].'</td>'
				.'<td id="rbacItem" >'.nl2br(CHtml::encode($item->description)).'</td>'
				.'<td id="rbacItem" >'.nl2br(CHtml::encode($item->bizrule)).'</td>'
				.'<td id="rbacItem" >'.nl2br(CHtml::encode($item->data)).'</td></tr></table>';
		return $out;
	}
	
	/**
	 * 
	 * @desc set User for renderItemAssign()
	 * @param object $user instance of User
	 */
	public function setUser($user)
	{
		$this->_user=$user;
	}
	
	/**
	 * @desc render RBAC Item in context "Move"
	 * @param array $item
	 * @return string rendered RBAC Item
	 */
	public function renderItemAssign($child)
	{
		$colUsername=$this->colUsername;
		$colUserid=$this->colUserid;
		if(!$this->_user) throw new CHttpException("RBACDisplayHelper::_user is not set. Use setUser(object \$user)");
		$urlPrefix='index.php?r=';
		$item = $child['this'];
		$out = "\n";
		$types = $this->types;
		
		// Manage Tree Header
		$out .= '
		<table id="rbacItem" ><tr>
				<th width="10%" id="rbacItem'.$item->type.'" >'.$this->_displayName($child['this-name'], $item->type).'</th>'
				.'<th width="5%" id="rbacItem" ><b>Type</b></th>'
				.'<th width="20%" id="rbacItem" ><b>Description</b></th>'
				.'<th width="20%" id="rbacItem" ><b>Buisness Rule</b></th>'
				.'<th width="5%" id="rbacItem" ><b>Data</b></th>
			</tr>
			';
		$isAssigned=AuthAssignment::userIsAssigned($this->_user->$colUserid, $child['this-name']);
		$checkBoxName=($isAssigned ? 'removeAssignments[]' : 'addAssignments[]');
		$out .= '
			<tr>
				<td id="rbacItem" >'.CHtml::checkbox($checkBoxName, false, array('value'=>$child['this-name'])).' '.($isAssigned ? '<span style="color:#ff0000">Eject</span>' : 'Assign').'</td>'
				.'<td id="rbacItem" >'.$types[$item->type].'</td>'
				.'<td id="rbacItem" >'.nl2br(CHtml::encode($item->description)).'</td>'
				.'<td id="rbacItem" >'.nl2br(CHtml::encode($item->bizrule)).'</td>'
				.'<td id="rbacItem" >'.nl2br(CHtml::encode($item->data)).'</td></tr></table>';
		return $out;
	}
	
/**
	 * @desc render RBAC Item in context "Move"
	 * @param array $item
	 * @return string rendered RBAC Item
	 */
	public function renderItemInfo($child)
	{
		$colUsername=$this->colUsername;
		$item = $child['this'];
		$out = "\n";
		$types = $this->types;
		$hrefItemName='<a  id="rbacItem'.$item->type.'" href="'.$this->_model->createUrl('rbac/edit', array('item' => $child['this-name'])).'">'.$child['this-name'].'</a>';
		// Manage Tree Header
		$out .= '
		<table id="rbacItem" ><tr>
				<th width="10%" id="rbacItem'.$item->type.'" >'.$this->_displayName($hrefItemName, $item->type).'</th>'
				.'<th width="5%" id="rbacItem" ><b>Type</b></th>'
				.'<th width="20%" id="rbacItem" ><b>Description</b></th>'
				.'<th width="20%" id="rbacItem" ><b>Buisness Rule</b></th>'
				.'<th width="5%" id="rbacItem" ><b>Data</b></th>
			</tr>
			';
		$out .= '
			<tr>
				<td id="rbacItem" >&nbsp;</td>'
				.'<td id="rbacItem" >'.$types[$item->type].'</td>'
				.'<td id="rbacItem" >'.nl2br(CHtml::encode($item->description)).'</td>'
				.'<td id="rbacItem" >'.nl2br(CHtml::encode($item->bizrule)).'</td>'
				.'<td id="rbacItem" >'.nl2br(CHtml::encode($item->data)).'</td></tr></table>';
		return $out;
	}
	
	/**
	 * 
	 */
	public function renderCode($child)
	{
		$auth="\$auth";
		$item = $child['this'];
		$out='';
		if(!in_array($item->name, $this->_renderedItems))
		{
		$out.="\${$item->name} = $auth"."->create".$this->types[$item->type]
			."('".str_replace("'", "\\'", $item->name)."', "
			."'".str_replace("'", "\\'", $item->description)."', "
			."'".str_replace("'", "\\'", $item->bizrule)."', "
			."'".str_replace("'", "\\'", $item->data)."');\n";
			$this->_renderedItems[]=$item->name;
		}
		if($child['parent-name'] !== null)
		{
			$out.="\$".$child['parent-name']."->addChild('{$item->name}');\n";
		}
		$out=nl2br(htmlspecialchars($out));
		return $out;
	}
	
	
	/**
	 * @desc render RBAC Item in context "Move"
	 * @param array $item
	 * @return string rendered RBAC Item
	 */
	public function renderItemEject($item)
	{
		$out = "\n";
		$types = $this->types;
		// Manage Tree Header
		$out .= '
		<table id="rbacItem" >
			
			<tr>
				<th width="10%" id="rbacItem'.$item->type.'" >'.$this->_displayName($item->name, $item->type).'</th>
				<th width="5%" id="rbacItem" ><b>Type</b></th>
				<th width="20%" id="rbacItem" ><b>Description</b></th>
				<th width="20%" id="rbacItem" ><b>BizRule</b></th>
				<th width="5%" id="rbacItem" ><b>Serialized Data</b></th>
			</tr>
			<tr>
				<td id="rbacItem" >&nbsp;</td>
				<td id="rbacItem" >'.$types[$item->type].'</td>
				<td id="rbacItem" >'.nl2br(CHtml::encode($item->description)).'</td>
				<td id="rbacItem" >'.nl2br(CHtml::encode($item->bizrule)).'</td>
				<td id="rbacItem" >'.nl2br(CHtml::encode($item->data)).'</td>
			</tr>
		</table>
		';
		return $out;
	}
	
	/**
	 * 
	 * @desc render minimal items
	 * @param unknown_type $this->_model
	 * @param unknown_type $child
	 */
	public function renderDebugTree($child, $newLine="\n")
	{
		return str_repeat(' + ', $child['depth']).$child['this']->name.' ('.$child['parent-name'].')'.$newLine;
	}
}