<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<h1>ERP - Comercial</h1>
<div>
	<fieldset>
	<legend>Iniciar sesi&oacute;n</legend>
	
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>

		<div>
			<?php echo $form->label($model,'Usuario'); ?>
			<?php echo $form->textField($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>		

		<div>
			<?php echo $form->label($model,'Contrase&ntilde;a'); ?> 
			<?php echo $form->passwordField($model,'password'); ?><br/>
			<?php echo $form->error($model,'password'); ?>
		</div>

		<div>
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'Recordarme'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		</div>
		
		<?php echo CHtml::submitButton('.: Entrar',array('id'=>'btnLg')); ?>
	
		<?php $this->endWidget(); ?>
		
	</fieldset>
</div>