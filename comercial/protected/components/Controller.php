<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout = '//layouts/column2';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();

	public $controlador;
	public $accion;
	public $operacion;

	public function beforeAction() {
		try {
			$controller = Yii::app() -> controller -> id;
			$action = Yii::app() -> controller -> action -> id;
			$operation = $controller . ucfirst($action);

			$this -> controlador = $controller;
			$this -> accion = $action;
			$this -> operacion = $operation;
			if (Yii::app() -> user -> name == 'Guest') {
				$identity = new UserIdentity('Guest', 'Guest');
				$identity -> authenticate();
				Yii::app() -> user -> login($identity);
			}

			if (!Yii::app() -> user -> checkAccess($operation)) {
				throw new Exception("No cuenta con los privilegios necesarios para ver el contenido. ");
			}

			$session = new CHttpSession;
			$session -> open();
			$session['sys.controlador'] = $this->controlador;
			$session['sys.accion'] = $this->accion;

			return true;
		} catch(Exception $e) {
			throw new CHttpException("de privilegios", $e -> getMessage());
		}
	}

	public function behaviors() {
		return array('RBACAccessComponent' => array('class' => 'application.modules.rbac.components.RBACAccessVerifier',
		// optional default settings
			'checkDefaultIndex' => 'id', // used with buisness Rules if no Index given
			'allowCaching' => false, // cache RBAC Tree -- do not enable while development ;)
			'accessDeniedUrl' => '/site/login', // used if User is logged in
			'loginUrl' => '/site/login'// used if User is NOT logged in
		), );
	}

}
?>
