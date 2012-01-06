<?php
$this->breadcrumbs=array(
	'Ciclos'=>array('index'),
	$model->id,
);

$this->menu=array(
);
?>

<h1>Ver ciclo</h1>

<div class="menucrud">
<?php
    echo CHtml::link('Volver <img src="'.Yii::app()->theme->baseUrl.'/img/system/volver.png"/>', 
                        array('ciclo/index'));
 ?>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'annio_id',
		'clave',
	),
)); ?>
