<?php
if($treeFormat == 'renderItemTree'): 
?>
	<div>
	<?php echo CHtml::beginForm($this->createUrl('//rbac/rbac/move'), 'post') ?>
		<br>
		<?php echo CHtml::submitButton('Move Item') ?>
		<div style="width: 90%">
		<?php echo $displayHelper->renderTree(); ?>
		</div>
		<br>
		<?php echo CHtml::submitButton('Move Item') ?>
	<?php echo CHtml::endForm() ?>
	</div>
	<br>
	<a href="<?php echo $this->createUrl('//rbac/rbac',array('generateCode'=>1)) ?>">Generate PHP Code</a>
	<br>
<?php 
elseif($treeFormat == 'renderCode'): 
?>
	<br>
	<?php
		echo $displayHelper->renderTree("\$auth=Yii::app()->authManager;\n");
	?>
	<br>
	<a href="<?php echo $this->createUrl('//rbac/rbac') ?>">Return to Tree View</a>
	<br>
<?php
elseif($treeFormat == 'renderItemInfo'):
?>
	<br>
	<?php
		echo $displayHelper->renderTree();
	?>
<?php
endif;