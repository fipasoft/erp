<?php
$this->breadcrumbs=array(
	'Ciclos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Editar ciclo </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>