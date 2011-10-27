<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $id
 * @property string $login
 * @property string $pass
 * @property string $nombre
 * @property string $ap
 * @property string $am
 * @property string $mail
 *
 * The followings are the available model relations:
 * @property Aprobacion[] $aprobacions
 * @property Cambios[] $cambioses
 * @property Version[] $versions
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Usuario the static model class
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
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, pass, nombre, ap, am, mail', 'required'),
			array('login', 'length', 'max'=>16),
			array('pass', 'length', 'max'=>50),
			array('nombre', 'length', 'max'=>30),
			array('ap, am', 'length', 'max'=>20),
			array('mail', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, login, pass, nombre, ap, am, mail', 'safe', 'on'=>'search'),
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
			'aprobacions' => array(self::HAS_MANY, 'Aprobacion', 'usuario_id'),
			'cambioses' => array(self::HAS_MANY, 'Cambios', 'usuario_id'),
			'versions' => array(self::HAS_MANY, 'Version', 'genera'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
			'pass' => 'Pass',
			'nombre' => 'Nombre',
			'ap' => 'Ap',
			'am' => 'Am',
			'mail' => 'Mail',
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('ap',$this->ap,true);
		$criteria->compare('am',$this->am,true);
		$criteria->compare('mail',$this->mail,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}