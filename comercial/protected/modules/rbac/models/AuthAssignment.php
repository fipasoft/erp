<?php

/**
 * This is the model class for table "AuthAssignment".
 *
 * The followings are the available columns in table 'AuthAssignment':
 * @property string $itemname
 * @property string $userid
 * @property string $bizrule
 * @property string $data
 *
 * The followings are the available model relations:
 */
class AuthAssignment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AuthAssignment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * 
	 * @desc check if User is assigned to an AuthItem
	 * @param string $username from table user.username
	 * @param string $itemname from table authAssignment.itemname
	 * @return boolean
	 */
	public static function userIsAssigned($userid, $itemname)
	{
		return (AuthAssignment::model()->findByAttributes(array('userid'=>$userid, 'itemname'=>$itemname)) !== null ? true : false);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'AuthAssignment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('itemname, userid', 'required'),
			array('itemname, userid', 'length', 'max'=>64),
			array('bizrule, data', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('itemname, userid, bizrule, data', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'user'=>array(
				self::HAS_MANY,
				'User',
				'username'
			)
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'itemname' => 'Itemname',
			'userid' => 'Username',
			'bizrule' => 'BizRule',
			'data' => 'Data',
		);
	}

	
}