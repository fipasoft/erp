<?php ?>
<div style="padding: 2em; clear: both; border-left: 2px solid #cccccc; border-top: 2px solid #cccccc; border-bottom: 2px solid #cccccc" >
	<?php echo CHtml::beginForm($this->createUrl('rbac/eject'), 'post') ?>
		<?php echo CHtml::hiddenField	('eject[parent]', 	$ejectItemsGet['parent']->name); ?>
		<?php echo CHtml::hiddenField	('eject[child]', 	$ejectItemsGet['child']->name); ?>
		<h3>Eject Child <i><?php echo $ejectItemsGet['child']->name ?></i> from Parent <i><?php echo $ejectItemsGet['parent']->name ?></i></h3>
		<?php
		echo $displayHelper->treeFormat['groupIn'];
		echo $displayHelper->renderItemEject($ejectItemsGet['parent']);
		echo $displayHelper->treeFormat['groupIn'];
		echo $displayHelper->renderItemEject($ejectItemsGet['child']);
		?>
		<br />
		<?php echo CHtml::submitButton	('Eject Item'); ?>
		<?php
		echo $displayHelper->treeFormat['groupOut'];
		echo $displayHelper->treeFormat['groupOut'];
		?>
	<?php echo CHtml::endForm() ?>
</div>