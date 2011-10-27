<?php
$this->breadcrumbs=array(
	'Assignments'=>$this->createUrl('//rbac/assignment'),
	'Edit',
);
?>
<h1>Edit Role Assignmnents</h1><br>
<?php
// form errors and success
$model->renderMessages();
?>
<h3>from:</h3>
<table>
	<tr>
		<th>Username</th>
		<th>Email</th>
	</tr>
	<tr>
		<td><?php echo CHtml::encode($user->$colUsername) ?>
		<td><?php echo CHtml::encode($user->$colEmail) ?>
	</td>
</table>
<b>Or back to: <a href="<?php echo $this->createUrl('//rbac/assignment', $getVars)?>">Userlist</a>, 
<a href="<?php echo $this->createUrl('//rbac/assignment/manage', array_merge(array('userid'=>$user->$colUserid),$getVars))?>">Assign/Eject Roles</a></b><br><br>
<?php 
if(count($assignments)):
	$this->renderPartial('_editForm', array('getVars'=>$getVars, 'assignments'=>$assignments, 'user'=>$user, 'colUsername'=>$colUsername, 'colUserid'=>$colUserid));
 else: 
?>User has no <a href="<?php echo $this->createUrl('//rbac/assignment/manage', array_merge(array('userid'=>$user->$colUserid),$getVars))?>">Assignments</a></b><br><br>
<?php 
endif;