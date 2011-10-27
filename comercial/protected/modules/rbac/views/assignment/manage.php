<?php
$this->breadcrumbs=array(
	'Assignments'=>$this->createUrl('//rbac/assignment'),
	'Manage',
);
?>
<h1>Role Assignments - Assign/Eject Roles</h1><br>
<?php
// form errors and success
$model->renderMessages();
?>
<b>Assign/Eject Roles from:
<table>
	<tr>
		<th>User</th>
		<th>Email</th>
	</tr>
	<tr>
		<td><?php echo CHtml::encode($manageUser->$colUsername)?></td>
		<td><?php echo CHtml::encode($manageUser->$colEmail)?></td>
	</tr>
</table>
<b>Or back to: <a href="<?php echo $this->createUrl('//rbac/assignment', $getVars)?>">Userlist</a>,   
<a href="<?php echo $this->createUrl('//rbac/assignment/edit', array_merge(array('userid'=>$manageUser->$colUserid), $getVars)) ?>">edit Assignments</a></b>.
</b>
<?php

if($manageUser && $displayHelper->hasItems()):
	$this->renderPartial('_treeForm', 
			array(
				'displayHelper'=>$displayHelper, 
				'getVars'=>$getVars, 
				'manageUser'=>$manageUser, 
				'colUsername'=>$colUsername, 
				'colUserid'=>$colUserid
			)
		);
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
