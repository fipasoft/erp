<?php
$this->breadcrumbs=array(
	'Manage Rbac Tree'=>$this->createUrl('//rbac/rbac'),
);
?>
<h1>Manage RBAC Tree</h1>
<h3>Move, edit, create, delete Items</h3>
<?php 

// form errors and success
$model->renderMessages();

// edit form
if($editItem !== null || !$displayHelper->hasItems()):
	if(!$displayHelper->hasItems()): 
		$editItem=new AuthItem; 
	endif;
	$this->renderPartial('_editForm', array('editItem'=>$editItem, 'displayHelper'=>$displayHelper, 'nameFilter'=>$nameFilter));
endif;

// eject form
if(count($ejectItemsGet)):
	$this->renderPartial('_ejectForm', array('ejectItemsGet'=>$ejectItemsGet, 'displayHelper'=>$displayHelper));
endif;

// edit form
if($treeFormat == 'renderItemTree'):
	?>
	<br>
	<a href="<?php echo $this->createUrl('//rbac/rbac',array('createNew'=>1)) ?>">Create new Item</a>
	<br>
	<?php 
endif;
if($displayHelper->hasItems()):
	$this->renderPartial('_treeForm', array('displayHelper'=>$displayHelper, 'treeFormat'=>$treeFormat));
endif;
?>
<br><b>Note:<br></b>
After a Buisness Rule the AccessController ends with the Buisness Rule Result and does not climp up to Parent any more.<br>
Check Access steps in Detail: <br>
1.) if User has requested Item Assigned do 2) - else do 4)<br>
2.) if requested User Assignment Item has Buisness Rule check and end - else do 3)<br>
3.) if requested RBAC Item has Buisness Rule check and end - else end with true<br>
4.) if requested Item has parent do 1) with parent as requested Item - else end with false<br><br>
The Data field is not used while checking access. Feel free to use it fore your needs.
