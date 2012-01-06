<?php

/**
 * This is the model class for table "historial".
 *
 * The followings are the available columns in table 'historial':
 * @property string $id
 * @property string $ciclo_id
 * @property string $usuario
 * @property string $descripcion
 * @property string $controlador
 * @property string $accion
 * @property string $modelo
 * @property string $registro
 * @property string $saved_at
 *
 * The followings are the available model relations:
 * @property Ciclo $ciclo
 */
class Historial extends CActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     * @return Historial the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'historial';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array( array('usuario, descripcion, controlador, accion, modelo, registro, saved_at', 'required'), array('ciclo_id', 'length', 'max' => 10), array('usuario', 'length', 'max' => 16), array('descripcion', 'length', 'max' => 255), array('controlador, accion, modelo, registro', 'length', 'max' => 32),
        // The following rule is used by search().
        // Please remove those attributes that should not be searched.
            array('id, ciclo_id, usuario, descripcion, controlador, accion, modelo, registro, saved_at', 'safe', 'on' => 'search'), );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array('ciclo' => array(self::BELONGS_TO, 'Ciclo', 'ciclo_id'), );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array('id' => 'ID', 'ciclo_id' => 'Ciclo', 'usuario' => 'Usuario', 'descripcion' => 'Descripcion', 'controlador' => 'Controlador', 'accion' => 'Accion', 'modelo' => 'Modelo', 'registro' => 'Registro', 'saved_at' => 'Saved At', );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria -> compare('id', $this -> id, true);
        $criteria -> compare('ciclo_id', $this -> ciclo_id, true);
        $criteria -> compare('usuario', $this -> usuario, true);
        $criteria -> compare('descripcion', $this -> descripcion, true);
        $criteria -> compare('controlador', $this -> controlador, true);
        $criteria -> compare('accion', $this -> accion, true);
        $criteria -> compare('modelo', $this -> modelo, true);
        $criteria -> compare('registro', $this -> registro, true);
        $criteria -> compare('saved_at', $this -> saved_at, true);

        return new CActiveDataProvider($this, array('criteria' => $criteria, ));
    }

    public static function entrada($descripcion, $modelo, $registro) {
        try {
            $session = new CHttpSession;
            $session -> open();

            $historial = new Historial;
            $historial -> ciclo_id = $session['ciclo.id'];
            $historial -> usuario = $session['usr.login'];
            $historial -> descripcion = $descripcion;
            $historial -> controlador = Yii::app()->controller->id;
            $historial -> accion = Yii::app()->controller->action->id;
            $historial -> modelo = $modelo;
            $historial -> registro = $registro;
            $historial -> saved_at = new CDbExpression('NOW()');
            if(!$historial -> save()){
                var_dump($historial->errors);exit;
            }
        } catch(Exception $e) {
            var_dump($e->getMessage());
        }
    }

}
