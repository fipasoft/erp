<div>
<?php echo CHtml::beginForm($this->createUrl('//rbac/assignment/edit', $getVars), 'post') ?>
<?php echo CHtml::hiddenField('username', $user->$colUsername) ?>
<?php echo CHtml::hiddenField('userid', $user->$colUserid) ?>
	<table>
	 	<tr>
	 		<th>Role</th>
	 		<th>Buisness Rule</th>
	 		<th>Data</th>
	 	</tr>
<?php foreach($assignments as $assignment): ?>
		<tr>
			<td><b><?php echo CHtml::encode($assignment->itemname) ?></b></td>
			<td><?php echo CHtml::textArea("assignments[".$assignment->itemname."][bizrule]", $assignment->bizrule, array('cols'=>60, 'rows'=>5))?> </td>
			<td><?php echo CHtml::textArea("assignments[".$assignment->itemname."][data]", $assignment->data, array('cols'=>30, 'rows'=>5))?> </td>
		</tr>
<?php endforeach ?>
	</table>
<span style="padding-left:4em"><?php echo CHtml::submitButton('Save Changes') ?></span>
<?php echo CHtml::endForm() ?>
</div>