<?php
class Config{
	
	public static function carga($nombre){
		
		$variables = include Yii::app()->basePath 
          				.'/config/'.$nombre.'.php';
          				
         return $variables;
		
	}
	
}

?>