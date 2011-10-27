<?php echo CHtml::beginForm($this->createUrl('//rbac/assignment/manage', $getVars), 'post') ?>
	<?php echo CHtml::hiddenField('userid', $manageUser->$colUserid) ?>
	<?php echo CHtml::hiddenField('username', $manageUser->$colUsername) ?>
	<br>
	<?php echo CHtml::submitButton('Apply changes') ?><br><br>
	<?php echo CHtml::checkBox('secureMode', false) ?> Assign in secure Mode: Assignment has BizRule "return false;" (will be first Line)<br>
    <?php echo CHtml::checkBox('addData', true) ?> Add Data to User Buisness Rule<br><br>

	<div style="width: 90%">
	<?php echo $displayHelper->renderTree() ?>
	</div>
	<br>
	<?php echo CHtml::submitButton('Apply changes') ?>
<?php CHtml::endForm() ?>