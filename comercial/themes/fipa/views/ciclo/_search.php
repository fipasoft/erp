<div id='buscar_div' class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'id'=>'formBusqueda'
)); ?>

	<div class="row derecha">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
		
		<?php echo $form->label($model,'Año'); ?>
		<select size="1" name="Ciclo[annio_id]" id="Ciclo_annio_id">
			<option value="T">Todos</option>
			<?php
			$anios = Annio::todos();
			foreach ($anios as $a) {
				?>
				
			<option value="<?php echo $a->id; ?>"><?php echo $a->numero; ?></option>
				<?php
				
			}
			?>
		</select>

		<?php echo $form->label($model,'clave'); ?>
		<?php echo $form->textField($model,'clave',array('size'=>10,'maxlength'=>10)); ?>
	</div>
	<br/>
	
	<div class="row derecha">			
		<?php echo CHtml::submitButton('Buscar'); ?>
		<?php echo CHtml::Button('Limpiar',array('id'=>'btnLimpiar')); ?>		
		<?php echo CHtml::Button('Quitar filtros',array('id'=>'btnQuitar')); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- search-form -->