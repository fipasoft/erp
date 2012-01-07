<?php

/**
 * This is the model class for table "ciclo".
 *
 * The followings are the available columns in table 'ciclo':
 * @property string $id
 * @property string $annio_id
 * @property string $clave
 *
 * The followings are the available model relations:
 * @property Annio $annio
 * @property Cotizacion[] $cotizacions
 * @property Historial[] $historials
 */
class Ciclo extends CActiveRecord
{
	public $filtros;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ciclo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ciclo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('annio_id, clave', 'required'),
			array('annio_id, clave', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, annio_id, clave', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'annio' => array(self::BELONGS_TO, 'Annio', 'annio_id'),
			'cotizacions' => array(self::HAS_MANY, 'Cotizacion', 'ciclo_id'),
			'historials' => array(self::HAS_MANY, 'Historial', 'ciclo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'annio_id' => 'Annio',
			'clave' => 'Clave',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
        $criteria->order = "clave DESC";

		$this->clave = trim($this->clave);
		if($this->clave!='') {
			$criteria->compare('clave',$this->clave,true);
			$this->filtros = true;
		}
		
		$criteria -> order = 'clave DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}