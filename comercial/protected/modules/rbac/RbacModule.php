<?php

class RbacModule extends CWebModule
{
    
	/**
	 * User Table config
	 * feel free, to extend this Table
	 */
	public $tableUser='User';
	public $columnUserid='id';
	public $columnUsername='username';
	public $columnEmail='email';
	
	/**
	 * config Table AuthItem,  AuthItemChild and AuthAssignment:
	 * These Tables are default Yii-Tables from framework/web/auth/schema.sql
	 */
	
	
	public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
            'rbac.models.*',
            'rbac.components.*',
        ));
    }
	
    /**
     * 
     * @desc 
     * @see framework/web/CWebModule::beforeControllerAction()
     */
    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action))
        {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }
}