<fieldset>
<legend>Datos del ciclo.</legend>
<div class="form fvalidator">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'ciclo-form',
	'enableAjaxValidation' => false
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="rowform">
		<?php echo $form->label($model,'Año'); ?><br/>
		<?php echo $form->textField($model,'clave',array('size'=>10,'maxlength'=>4,'id'=>'id1', 'class' => 'entero')); ?><br/>
		<?php echo $form->error($model,'clave'); ?>
	</div>


</div><!-- form -->
</fieldset>

	<div class="rowform buttons derecha">
		<?php echo CHtml::Button('Cancelar',array('id'=>'cancelar', 'class'=>'btnCancelar')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>
<?php $this->endWidget(); ?>
