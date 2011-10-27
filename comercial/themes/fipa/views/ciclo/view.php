<?php
$this->breadcrumbs=array(
	'Ciclos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ciclo', 'url'=>array('index')),
	array('label'=>'Create Ciclo', 'url'=>array('create')),
	array('label'=>'Update Ciclo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ciclo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ciclo', 'url'=>array('admin')),
);
?>

<h1>View Ciclo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'annio_id',
		'clave',
	),
)); ?>
