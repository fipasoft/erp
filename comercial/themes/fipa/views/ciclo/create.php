<?php
$this->breadcrumbs=array(
	'Ciclos'=>array('index'),
	'Create',
);

?>

<h1>Crear Ciclo</h1>

<div class="menucrud">
<?php
	echo CHtml::link('Volver <img src="'.Yii::app()->theme->baseUrl.'/img/system/volver.png"/>', 
						array('ciclo/index'));
 ?>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>