<?php

/**
 * This Class manage the Access Items Tree
 * It does create, move and delete AuthItems
 * 
 * The main action is to build an array Tree with AuthItems
 * 
 */
class AuthItemChild extends CActiveRecord
{	
	
	public $parent;
	public $child;
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return AuthItemChild the static model class
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
		return 'AuthItemChild';
	}

	/**
	 * @see framework/base/CModel::rules()
	 */
	public function rules()
	{
		return array(
			array('parent, child', 'required'),
			// array('parent, child', 'safe'), // is a child of all other validations
		);	
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			/*
			 * These both are used tu build the RBAC Tree
			 * look in $this->getItemTree()
			 */
			'parents' => array( // LEFT OUTER JOIN AuthItemChild AS parents ON AuthItemChild.parent = parents.child
				self::HAS_MANY,
					'AuthItemChild',
					'child',
				),
			'childs' => array( // LEFT OUTER JOIN AuthItem AS childs ON (AuthItemChild.child = childs.name)
				self::BELONGS_TO,
					'AuthItem',
					'child',
				),
		);
	}
	
	
}