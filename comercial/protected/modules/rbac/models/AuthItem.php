<?php

/**
 * This is the model class for table "AuthItem".
 *
 * The followings are the available columns in table 'AuthItem':
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $bizrule
 * @property string $data
 *
 * The followings are the available model relations:
 */
class AuthItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AuthItem the static model class
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
		return 'AuthItem';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		if(isset($_GET['item'])) return array(array('name', 'safe'));
		return array(
			array('name, type', 'required'),
			array('type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('description, bizrule, data', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('name, type, description, bizrule, data', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			/*
			 * These both are used to find AuthItem they are not bound in AuthItemChild
			 * and don't appear in the RBAC Tree.
			 * Relation 'childs' is exactly the same as Relation 'unbound Child'
			 * look in AuthItemChild::_findUnboundItems()
			 */
			'unboundParents' => array( // LEFT OUTER JOIN AuthItemChild AS unboundParents ON t.name = unboundParents.parent
				self::HAS_MANY,
					'AuthItemChild',
					'parent',
					'select' => 'unboundParents.parent AS uParent',
				),
			'unboundChilds' => array( // LEFT OUTER JOIN AuthItemChild AS unboundChilds ON t.name = unboundChilds.child
				self::HAS_MANY,
					'AuthItemChild',
					'child',
					'select' => 'unboundChilds.child AS uChild',
				),
		);
	}

	/**
	 * @desc If Items are not listed in table AuthItemChild, they don't appear in the RBAC Tree. 
	 * @desc So wo have to find them seperately
	 * 
	 */
	public function findUnboundItems()
	{
		/*
		 * SELECT `t`.`name` AS `t0_c0`, 
		 * 		`t`.`type` AS `t0_c1`, 
		 * 		`t`.`description` AS `t0_c2`, 
		 * 		`t`.`bizrule` AS `t0_c3`, 
		 * 		`t`.`data` AS `t0_c4`, 
		 * 		`unboundParents`.`parent` AS `t1_c0`, 
		 * 		`unboundParents`.`child` AS `t1_c1`, 
		 * 		`unboundChilds`.`parent` AS `t2_c0`, 
		 * 		`unboundChilds`.`child` AS `t2_c1` 
		 * FROM `AuthItem` `t`  
		 * LEFT OUTER JOIN `AuthItemChild` `unboundParents` 
		 * 		ON (`unboundParents`.`parent`=`t`.`name`)  
		 * LEFT OUTER JOIN `AuthItemChild` `unboundChilds` 
		 * 		ON (`unboundChilds`.`child`=`t`.`name`)  
		 * WHERE (unboundParents.parent is Null AND unboundChilds.child is NULL) 
		 * ORDER BY t.parent
		 */
		$result = $this->findAll(array(
				'with' => array('unboundParents', 'unboundChilds'),
				'condition' => 'unboundParents.parent is Null AND unboundChilds.child is NULL',
				'order' => 't.type ASC, t.name DESC'
				)
			);
		return $result;
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Item Name',
			'type' => 'Type',
			'description' => 'Description',
			'bizrule' => 'Bizrule',
			'data' => 'Data',
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

		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('bizrule',$this->bizrule,true);
		$criteria->compare('data',$this->data,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}