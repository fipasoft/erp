<?php
$this->breadcrumbs=array(
	'Ciclos',
);
?>

<h1>Ciclos</h1>

<div class="menucrud">
 <?php
	echo CHtml::link(
		'Buscar <img src="'.Yii::app()->theme->baseUrl.'/img/system/buscar.png" alt="buscar"/>',
		array('#'),
		array('id'=>'btnBusqueda')
	);
 ?> / 
 <?php
	echo 
		CHtml::link(
			'Agregar <img src="'.Yii::app()->theme->baseUrl.'/img/system/nuevo.png" alt="nuevo"/>',
			array('create')
		);
 ?>
</div>

<div class="search-form" id="divBusqueda" <?php if(!$model->filtros){ echo 'style="display:none;"'; } ?>>
	<p>
		De forma opcional puedes utilizar los siguientes operadores de comparaci&oacute;n
		(<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
		or <b>=</b>).
	</p>
	
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
	)); ?>
</div>

<?php if($dataProvider->totalItemCount>0){ ?>
<?php
    $cols = array(
            array(            
            'name'=>'Año',
            'value'=>'$data->clave.($data->activo? "<br/><span class=\'true\'>Activo</span>":"")',
            'type'=>'raw'
            )
            );
            
	$cols[] = array(// display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
            'template'=>'{update} {delete}',
            'updateButtonImageUrl' => Yii::app()->theme->baseUrl.'/img/system/editar.png',
            'deleteButtonImageUrl' => Yii::app()->theme->baseUrl.'/img/system/eliminar.png'
            );

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=> $cols,
));
?>
<?php }else{?>
<div class="info">
<br/>
No se encontro ningun registro para las condiciones establecidas.
<br/>
</div>
<?php } ?>
