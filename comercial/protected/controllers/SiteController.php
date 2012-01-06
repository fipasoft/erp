<?php

class SiteController extends Controller {
	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array(
		// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array('class' => 'CCaptchaAction', 'backColor' => 0xFFFFFF, ),
		// page action renders "static" pages stored under 'protected/views/site/pages'
		// They can be accessed via: index.php?r=site/page&view=FileName
			'page' => array('class' => 'CViewAction', ), );
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');
		$this -> redirect('site/login');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
		if ($error = Yii::app() -> errorHandler -> error) {
			if (Yii::app() -> request -> isAjaxRequest)
				echo $error['message'];
			else
				$this -> render('error', $error);
		}
	}


	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		if (Yii::app() -> user -> name != 'Guest') {
			$this -> redirect(Yii::app() -> request -> baseUrl . '/ciclo/index');
		}

		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model -> attributes = $_POST['LoginForm'];

			// validate user input and redirect to the previous page if valid

			if ($model -> validate() && $model -> login()) {

				//Establece las variables de session
				$actual = Ciclo::model() -> find("activo = '1'");
				$session = new CHttpSession;
				$session -> open();
				$session['ciclo.id'] = $actual -> id;
				$session['ciclo.numero'] = $actual -> clave;
				$session['usr.login'] = Yii::app()->user->name;

				$auth = Yii::app() -> authManager;
				$roles = $auth -> getRoles(Yii::app() -> user -> getId());
				if (!array_key_exists('cliente', $roles)) {
					$this -> redirect(Yii::app() -> request -> baseUrl . '/ciclo/index');
				} else {
					Yii::app() -> user -> logout();
					$this -> redirect(Yii::app() -> homeUrl);
				}
			}
		}
		// display the login form
		$this -> render('login', array('model' => $model));
	}

	public function actionCiclo() {
		$session = new CHttpSession;
		$session -> open();
		$actual = Ciclo::model() -> findByPk($_POST['ciclo']);
		$session['ciclo.id'] = $actual -> id;
		$session['ciclo.numero'] = $actual -> numero;
		$this -> redirect(Yii::app() -> baseUrl . '/' . $_POST['controlador'] . '/index');
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app() -> user -> logout();
		$session = new CHttpSession;
		$session -> open();
		$session -> destroy();

		$this -> redirect(Yii::app() -> homeUrl);
	}

}
