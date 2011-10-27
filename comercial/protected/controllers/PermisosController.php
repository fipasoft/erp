<?php
Yii::import('application.modules.rbac.models.*');
Yii::import('application.extensions.*');
require_once ('config/main.php');


class PermisosController extends Controller
{
	public $layout='//layouts/column2';
	
	public function actionCrea(){
		//Limpia BD			
			$variables = Config::carga('permisos');
			$query = $variables['script'];
			
			$command = Yii::app()->db->createCommand($query);
			$command->execute();
			$this->redirect('crear');
			
	}

	/**
	 * Establece los privilegios del sistema
	 */
	public function actionCrear()
	{
		try{
			//return;
			
			$auth=Yii::app()->authManager;
			
			$rolesObj = $auth->getRoles();
			
			$operationsObj = $auth->getOperations();
			
			
			//Roles
				$superAdmin = $rolesObj['SuperAdmin'];
				$registered = $rolesObj['registered'];
				$invitado = $auth->createRole('invitado');
				$administrador = $auth->createRole('administrador');
			
			//operaciones para el invitado
				$controlador = 'site';
				$task = $auth->createTask($controlador);

				$auth->createOperation($controlador.'Login','Autenticación del sistema.');
				$auth->createOperation($controlador.'Index','Indice del sistema.');
				$auth->createOperation($controlador.'Error','Autenticacion del sistema.');
				$auth->createOperation($controlador.'Logout','Salir del sistema.');
				$auth->createOperation($controlador.'Ciclo','Seleccionar el ciclo del sistema.');


				$task->addChild($controlador.'Login');
				$task->addChild($controlador.'Index');
				$task->addChild($controlador.'Error');
				$task->addChild($controlador.'Logout');
				$task->addChild($controlador.'Ciclo');

				//$invitado->addChild($controlador);
				
				$registered->addChild($controlador);
			

			//operaciones APP
			
				//historial
				$controlador = 'historial';
				$task = $auth->createTask($controlador);
				
				$auth->createOperation($controlador.'Index','Indice del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'View','Vista del controlador ' .$controlador.' .');
			
				$task->addChild($controlador.'Index');
				$task->addChild($controlador.'View');
				
				
				$administrador->addChild($controlador);
			
				//ciclo
				$controlador = 'ciclo';
				$task = $auth->createTask($controlador);
				
				$auth->createOperation($controlador.'Index','Indice del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'View','Vista del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'Update','Actualizar del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'Create','Crear del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'Admin','Administrador del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'Delete','Eliminar del controlador ' .$controlador.' .');
			
				$task->addChild($controlador.'Index');
				$task->addChild($controlador.'View');
				$task->addChild($controlador.'Update');
				$task->addChild($controlador.'Create');
				$task->addChild($controlador.'Admin');
				$task->addChild($controlador.'Delete');
				
				$administrador->addChild($controlador);
					
				//usuario
				$controlador = 'usuario';
				$task = $auth->createTask($controlador);
				
				$auth->createOperation($controlador.'Index','Indice del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'View','Vista del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'Update','Actualizar del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'Create','Crear del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'Admin','Administrador del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'Delete','Eliminar del controlador ' .$controlador.' .');
				$auth->createOperation($controlador.'Pass','Cambiar el password del usuario.');
			
				$task->addChild($controlador.'Index');
				$task->addChild($controlador.'View');
				$task->addChild($controlador.'Update');
				$task->addChild($controlador.'Create');
				$task->addChild($controlador.'Admin');
				$task->addChild($controlador.'Delete');
				$task->addChild($controlador.'Pass');
				
				$administrador->addChild($controlador);
			
				/************/
				//Permisos
				$controlador = 'permisos';
				$task = $auth->createTask($controlador);
				
				$auth->createOperation($controlador.'Crea','Crear estructura de permisos.');
				$auth->createOperation($controlador.'Crear','Crear estructura de permisos.');
				
				$task->addChild($controlador.'Crea');
				$task->addChild($controlador.'Crear');
				$superAdmin->addChild($controlador);
				
				
				$superAdmin->addChild('administrador');
				
				
							
			//Operaciones del app
			
			//roles de los usuarios
				
				$usuarios  = Usuario::model()->findAll();			
				foreach($usuarios as $u){
					if($u->login != 'root'){
						if($u->login == 'Guest'){
							$auth->assign('invitado',$u->id);	//invitado
						}else{			
							$auth->assign('administrador',$u->id); //admin
						}
					}
				}			
				
				var_dump('Exito al crear');
		}catch (Exception $e){
			var_dump($e->getMessage());
			exit;
		}
		
	}
	
	/**
	 * Muestra el status
	 */
	public function actionStatus()
	{
		try{
			
			$auth=Yii::app()->authManager;
			$rolesObj = $auth->getRoles();
			$roles = array_keys($rolesObj);
			
			$operationsObj = $auth->getOperations();
			$operations = array_keys($operationsObj);
			
			var_dump($roles);
			var_dump($operations);
		}catch (Exception $e){
			var_dump($e->getMessage());
			exit;
		}
	}


}
