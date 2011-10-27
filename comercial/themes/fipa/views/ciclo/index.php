<?php
$this->breadcrumbs=array(
	'Ciclos',
);

?>

<h1>Ciclos</h1>

<div class="menucrud">
 <?php
	echo CHtml::link('Agregar <img src="'.Yii::app()->theme->baseUrl.'/img/system/nuevo.png"/>',
							array('create'));
 ?> /
<?php

echo CHtml::link(' Buscar <img src="'.Yii::app()->theme->baseUrl.'/img/system/buscar.png"/>',array('cursos'),array('id'=>'btnBusqueda'));

 ?>
</div>

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
</div><!-- search-form -->



<?php

	$cols = array(			
			'id',
			array(            
            'name'=>'año',
            'value'=>'$data->annio->numero',
	        ),
	        'clave',  
			);
						
	$cols[] = array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
			'viewButtonImageUrl' => Yii::app()->theme->baseUrl.'/img/system/ver.png',
			'updateButtonImageUrl' => Yii::app()->theme->baseUrl.'/img/system/editar.png',
			'deleteButtonImageUrl' => Yii::app()->theme->baseUrl.'/img/system/eliminar.png'
			
        );
         

$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
  	'columns'=> $cols,
)); ?>
