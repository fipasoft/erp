<?php
$yiiPath = Yii::app()->baseUrl . '/'; 
$path = Yii::app()->theme->baseUrl . '/';
$basepath = Yii::app()->theme->basePath . '/';
$css_path = $path . 'css/';
$js_path = $path . 'javascript/';
$year = date('Y');

$controlador = Yii::app()->controller->id;
$action =Yii::app()->controller->action->id;

$vista = ($action == '' ? 'index' : $action);
?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <link href="<?php echo $css_path ?>system/tripoli.base.css" type="text/css" rel="stylesheet" />
  <link href="<?php echo $css_path ?>system/tripoli.type.css" type="text/css" rel="stylesheet" />
  <link href="<?php echo $css_path ?>system/tripoli.visual.css" type="text/css" rel="stylesheet" />
  <link href="<?php echo $css_path ?>system/tripoli.layout.css" type="text/css" rel="stylesheet" />
  <!--[if IE]><link rel="stylesheet" type="text/css" href="<?php echo $css_path ?>system/tripoli.base.ie.css" /><![endif]-->

  <title>ERP - Comercial</title>
  
 <link href="<?php echo $js_path ?>system/jquery-ui-1.8.16/css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css"/>
  <script src="<?php echo $js_path ?>system/jquery-ui-1.8.16/js/jquery-ui-1.8.16.custom.min.js"></script>
 <link href="<?php echo $css_path ?>system/nav.css" type="text/css" rel="stylesheet" />
  <link href="<?php echo $css_path ?>system/style.css" type="text/css" rel="stylesheet" />
  <link href="<?php echo $css_path ?>system/print.css" type="text/css" rel="stylesheet" media="print" />
	
<?php if(file_exists($basepath . 'css/view/' . $controlador . '.css')){?>
  <link href="<?php echo $css_path . 'view/' . $controlador ?>.css" type="text/css" rel="stylesheet" />
<?php }?>
<?php  if(file_exists($basepath . 'css/view/' . $controlador . '.' . $vista . '.css')){?>
  <link href="<?php echo $css_path . 'view/' . $controlador . '.' . $vista ?>.css" type="text/css" rel="stylesheet" />
<?php }?>
<?php if(file_exists($basepath . 'css/view/' . $controlador . '.' . $vista . '.print.css')){?>
  <link href="<?php echo $css_path . 'view/' . $controlador . '.' . $vista ?>.print.css" type="text/css" rel="stylesheet" media="print" />
<?php }?>
  <script type="text/javascript" src="<?php echo $js_path ?>system/event/adddomloadevent.js"></script>
  
  <script type="text/javascript" src="<?php echo $js_path ?>plugins/class.jquery.js"></script>
  <script type="text/javascript" src="<?php echo $js_path ?>system/sys.js"></script>
  <script type="text/javascript" src="<?php echo $js_path ?>system/funciones.js"></script>
  <script type="text/javascript" src="<?php echo $js_path ?>plugins/fvalidator.jquery.js"></script>
  
<?php if(file_exists($basepath . 'javascript/view/' . $controlador . '.js')){?>
  <script type="text/javascript" src="<?php echo $js_path . 'view/' . $controlador ?>.js"></script>
<?php }?>
<?php if(file_exists($basepath . 'javascript/view/' . $controlador . '.' . $vista . '.js')){?>
  <script type="text/javascript" src="<?php echo $js_path . 'view/' . $controlador . '.' . $vista?>.js"></script>
<?php }?>

		<?php 
		$jqueryslidemenupath = Yii::app()->assetManager->publish(Yii::app()->basePath.'/scripts/jqueryslidemenu/');
 
		//Register jQuery, JS and CSS files
		Yii::app()->clientScript->registerCssFile($jqueryslidemenupath.'/jqueryslidemenu.css');
		 
		Yii::app()->clientScript->registerCoreScript('jquery');
		 
		Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'/jqueryslidemenu.js');
		?>

</head>
<body class="l10 wide">
<div id="container">
	<div id="header">
	
		<?php if(Yii::app()->user->name != 'Guest'){ ?>
		<div class="content">
			<div id="menu_container">

	<div id="myslidemenu" class="jqueryslidemenu">
 
			<?php 
					$this->widget('zii.widgets.CMenu',array(
						'items'=>array(			   
							array('label'=>'Sistema', 'url'=>array('#'), 'items'=>array(
								array('label'=>'Ciclos', 'url'=>array('/ciclo/index')),
								array('label'=>'Historial', 'url'=>array('/historial/index'), 'tag'=>'Historial'),
								array('label'=>'Usuarios', 'url'=>array('/usuario/index')),
								array('label'=>'RBAC', 'url'=>array('/rbac/rbac'), 'visible'=>Yii::app()->user->name == 'root'),
					        	array('label'=>'Crear permisos', 'url'=>array('/permisos/crea'), 'visible'=>Yii::app()->user->name == 'root')
					        	), 'visible'=>Yii::app()->user->name != 'Guest'
					        ) 
							
						)
					));
			?>
			
			<br style="clear: left" />
			 
			</div><!-- myslidemenu-->
			<?php
				
				$session=new CHttpSession;
  				$session->open();
		  		
				$ciclos = Ciclo::model()->findAll("1 ORDER BY clave DESC");
				$actual = Ciclo::model()->findByPk($session['ciclo.id']);
			?>
				<?php if(Yii::app()->user->name != 'Guest'){ ?>		
			<div id="SCiclo" >
			<?php echo Yii::app()->user->name; ?> /
				<a href="<?php echo $yiiPath ?>site/logout">Cerrar sesi&oacute;n</a> /
			<a href="#" id="cicloBtn" title="Cambiar de ciclo escolar">
					Ciclo <?php echo $actual->clave?>
				</a>
				<div id="cicloSel" style="display:none;" class="derecha">
					<form id="frm_ciclo" method="post" action="<?php echo $yiiPath ?>site/ciclo">
						<input type="hidden" name="controlador" value="<?php echo $controlador ?>" />
						
						<select name="ciclo" id="cicloSelect">
							<?php foreach($ciclos as $ccl){?>
							<option value="<?php echo $ccl->id?>"
									<?php if($ccl->id == $actual->id){ ?>selected="selected"<?php } ?>>
									<?php echo $ccl->clave?>
							</option>
							<?php } ?>
						</select>
					
					</form>
				</div>
			</div>
			<?php } ?>
			</div>
		</div>
		
			<?php } ?>
	</div>
	<br/>
	<br/>
		<input type="hidden" name="YIIbaseUrl" id="YIIbaseUrl" value="<?php echo $yiiPath; ?>" />
		<input type="hidden" name="controller" id="controller" value="<?php echo $controlador; ?>" />
		<input type="hidden" name="action" id="action" value="<?php echo $vista; ?>" />
	<?php echo $content; ?>
	<div id="footer">
		<div class="content">
			<span class="sub2">
				FiPa Software <?php echo $year ?>
			</span>
		</div>
	</div>
</div>
</body>
</html>