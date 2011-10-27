<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>ERP - Comercial</h1>

<div style="float:left;width:65%">
</div>

<div style="float:right;width:35%">
<fieldset style="">
<h3>Acceso</h3>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<br/>
	<div class="row">
		<?php echo $form->label($model,'Nombre de usuario'); ?><br/>
		<?php echo $form->textField($model,'username'); ?><br/>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Contrase&ntilde;a'); ?><br/>
		<?php echo $form->passwordField($model,'password'); ?><br/>
		<?php echo $form->error($model,'password'); ?>
		
	</div>

	<div class="row rememberMe">
	</div>

	<div class="izquierda">
		<?php echo CHtml::submitButton('Acceso',array('id'=>'btnLg')); ?>
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'Recordarme'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</fieldset>
</div>