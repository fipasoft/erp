<?php

Yii::import('application.extensions.*');
require_once ('utilerias/main.php');

class CicloController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array('accessControl',     // perform access control for CRUD operations
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this -> render('view', array('model' => $this -> loadModel($id), ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        try {

            $model = new Ciclo;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Ciclo'])) {

                $transaction = Yii::app() -> db -> beginTransaction();

                if (!is_numeric($_POST['Ciclo']['clave'])) {
                    throw new Exception("Los datos no son validos.", 1);
                }

                if (Ciclo::model() -> find("clave = '" . $_POST['Ciclo']['clave'] . "'")) {
                    throw new Exception("El ciclo con clave " . $_POST['Ciclo']['clave'] . " ya existe.", 1);
                }

                $annio = Annio::model() -> find("numero = '" . $_POST['Ciclo']['clave'] . "'");
                if ($annio -> id == "") {
                    $annio = new Annio;
                    $annio -> numero = $_POST['Ciclo']['clave'];
                    if (!$annio -> save()) {
                        throw new Exception("Ocurrio un errro al crear el annio.", 1);
                    }
                }
                
                $model->activo = $_POST['Ciclo']['activo'];
                
                if($_POST['Ciclo']['activo']=='1'){
                    $actual = Ciclo::model() -> find("activo = '1'");
                    if($actual->id!=""){
                        $actual->activo = 0;
                        if (!$actual -> save()) {
                           throw new Exception("Error al desactivar el ciclo.");
                        }
                    }
                } 
                 
                $model -> clave = $annio -> numero;
                $model -> annio_id = $annio -> id;
                if ($model -> save()) {
                    Historial::entrada("Se agrego el ciclo ".$model->clave.".", "Ciclo", $model->id);
                    $transaction -> commit();
                    $this -> redirect(array('view', 'id' => $model -> id));
                } else {
                    throw new Exception("Ocurrio un errro al crear el ciclo.", 1);
                }

            }

            $this -> render('create', array('model' => $model, ));
        } catch(Exception $e) {

            if ($transaction != null)
                $transaction -> rollback();

            throw new CHttpException("de sistema ", $e -> getMessage());

        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        try {
            $model = $this -> loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Ciclo'])) {

                $clave = trim($_POST['Ciclo']['clave']);

                if (!is_numeric($clave)) {
                    throw new Exception("El año no es valido.");
                }

                $transaction = Yii::app() -> db -> beginTransaction();

                $ciclo = Ciclo::model() -> find("clave='" . $clave . "' AND " . "id!='" . $model -> id . "'");
                if ($ciclo -> id != "") {
                    throw new Exception("Ya existe un ciclo con el año " . $clave . ".");
                }

                $annio = Annio::model() -> find("numero='" . $clave . "'");
                if ($annio -> id == "") {
                    $annio = new Annio;
                    $annio -> numero = $clave;
                    if (!$annio -> save()) {
                        throw new Exception("Error al guardar el annio.");

                    }
                }

                $model -> annio_id = $annio -> id;
                $model -> clave = $clave;
                
                if($_POST['Ciclo']['activo'] != ""){
                    if(!$model->activo){
                        if($_POST['Ciclo']['activo']=='1'){
                            $model->activo = $_POST['Ciclo']['activo'];
                            $actual = Ciclo::model() -> find("activo = '1'");
                            if($actual->id!=""){
                                $actual->activo = 0;
                                if (!$actual -> save()) {
                                   throw new Exception("Error al desactivar el ciclo.");
                                }
                            }
                        } 
                    }
                }
                
                if (!$model -> save()) {
                    throw new Exception("Error al guardar el ciclo.");
                }

                Historial::entrada("Se edito el ciclo ".$model->clave.".", "Ciclo", $model->id);
                $transaction -> commit();
                $this -> redirect(array('view', 'id' => $model -> id));
            }

            $this -> render('update', array('model' => $model, ));
        } catch(Exception $e) {
            if ($transaction != null)
                $transaction -> rollback();

            throw new CHttpException("de sistema ", $e -> getMessage());
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app() -> request -> isPostRequest) {
            // we only allow deletion via POST request
            $model = $this -> loadModel($id);
            $model -> delete();

            $annio = Annio::model() -> find("numero='" . $model -> clave . "'");
            $annio -> delete();
            Historial::entrada("Se elimino el ciclo ".$model->clave.".", "Ciclo", $model->id);
            

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this -> redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        //Verifica si hay algo cargado en la cache del paginador,
        //si es asi redirecciona a la pagina indicada
        Utils::cargaCache($this -> operacion);

        $model = new Ciclo('search');
        $model -> unsetAttributes();
        // clear any default values
        if (isset($_GET['Ciclo']))
            $model -> attributes = $_GET['Ciclo'];

        $this -> render('index', array('model' => $model, 'dataProvider' => $model -> search(), ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Ciclo::model() -> findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ciclo-form') {
            echo CActiveForm::validate($model);
            Yii::app() -> end();
        }
    }

}
