<fieldset>
<legend>Datos del ciclo.</legend>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ciclo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="rowform">
		<?php echo $form->label($model,'clave'); ?><br/>
		<?php echo $form->textField($model,'clave',array('size'=>10,'maxlength'=>4)); ?><br/>
		<?php echo $form->error($model,'clave'); ?>
	</div>

	<div class="rowform buttons">
		<?php echo CHtml::Button('Cancelar',array('id'=>'cancelar', 'class'=>'btnCancelar')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</fieldset>