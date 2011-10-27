<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
<br/>
<br/>
<a href="<?php echo Yii::app()->request->baseUrl; ?>" title="volver">Volver</a>
</div>