<?php

/**
 * This is the model class for table "annio".
 *
 * The followings are the available columns in table 'annio':
 * @property string $id
 * @property string $numero
 *
 * The followings are the available model relations:
 * @property Ciclo[] $ciclos
 */
class Annio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Annio the static model class
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
		return 'annio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numero', 'required'),
			array('numero', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, numero', 'safe', 'on'=>'search'),
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
			'ciclos' => array(self::HAS_MANY, 'Ciclo', 'annio_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numero' => 'Numero',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('numero',$this->numero,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	/**
	 * Regresa una lista con todos los registros de la tabla annio
	 * @return Array con objetos Annio
	 */
	public static function todos()
	{
		$annios = Annio::model()->findAll("1 ORDER BY numero DESC");
		return $annios;	
		
	}
}