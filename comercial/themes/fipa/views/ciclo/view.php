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
                        array('index'));
 ?> / 
 <?php
    echo 
        CHtml::link(
            'Agregar <img src="'.Yii::app()->theme->baseUrl.'/img/system/nuevo.png" alt="nuevo"/>',
            array('create')
        );
 ?> / 
 <?php
    echo CHtml::link('Editar <img src="'.Yii::app()->theme->baseUrl.'/img/system/editar.png"/>', 
                        array('ciclo/update/'.$model->id));
 ?>
</div>
<br/>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(            
            'label'=>'Año',
            'value'=>$model->clave,
            'type'=>'raw'
            ),
        array(            
            'label'=>'Activo',
            'value'=>($model->activo? '<span class="true">Si</span>':'<span class="false">No</span>'),
            'type'=>'raw'
            )
	),
)); ?>
