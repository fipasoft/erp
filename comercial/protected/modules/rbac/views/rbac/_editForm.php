<div>
	
	<script type="text/javascript">
	confirmDelete = function(_t){
		if(confirm("Realy delete Item?")){
			_t.form.submit();
		}
	}
	</script>

	<?php echo CHtml::errorSummary($editItem, '<div id="rbacError">', '</div>'); ?>
	<?php echo CHtml::beginForm($this->createUrl('rbac/edit'), 'post') ?>
	<?php echo CHtml::hiddenField('oldName', $editItem->name); ?>
	<table style="width: 50%">
		<tr>
			<td>Item Name:</td>
			<td>
			<?php echo CHtml::textField		('editItem[name]', 			$editItem->name); ?>
			</td>
			<td><span style="color:#cc0000">Required (min.2 Chars)</span><br>Filter: <?php echo $nameFilter ?></td>
		</tr>
		<tr>
			<td>Type:</td>
			<td colspan=2">
			<?php echo CHtml::dropDownList	('editItem[type]', 			$editItem->type, 		array('Operation', 'Task', 'Role')) ?><br/>
			</td>
		</tr>
		<tr>
			<td>Description:</td>
			<td colspan=2">
			<?php echo CHtml::textArea		('editItem[description]', 	$editItem->description, 	array('cols' => 70, 'rows' => 4)) ?><br/>
			</td>
		</tr>
		<tr>
			<td>Bizrule:</td>
			<td colspan=2">
			<?php echo CHTML::textArea		('editItem[bizrule]', 		$editItem->bizrule, 		array('cols' => 70, 'rows' => 4)) ?><br/>
			</td>
		</tr>
		<tr>
			<td>Data:</td>
			<td colspan=2">
			<?php echo CHTML::textArea		('editItem[data]', 			$editItem->data, 		array('cols' => 70, 'rows' => 4)); ?><br/>
			</td>
		</tr>
		<tr>
			<td colspan="3">
			<?php 
			if(!$displayHelper->hasItems() || isset($_GET['createNew'])):
				echo  CHtml::submitButton('Create Item', array('name'=>'createItem'));
			else:
				?>Edit/Create/Delete:<br/>
				<table>
					<tr>
						<td>
						<?php echo  CHtml::submitButton('Update Item',		array('name'=>'updateItem')) ?>
						</td>
						<td>
						<?php echo  CHtml::submitButton('Save as new Item',		array('name'=>'createItem')) ?>
						</td>
						<td>
						<?php echo  CHtml::submitButton('Delete Item ´'.$editItem->name.'´',		array('name'=>'deleteItem', 'onClick'=>"confirmDelete(this)")) ?>
						</td>
					</tr>
				</table>
				<b>or <a href="<?php echo $this->createUrl('//rbac/rbac') ?>">close</a> input Fields.</b>
				<?php endif ?>
			</td>
		</tr>
	</table>
	<?php echo CHtml::endForm(); ?>
</div>