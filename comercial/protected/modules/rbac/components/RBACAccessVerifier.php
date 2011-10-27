<?php

/**
 * Description of RBACAccessVerifier
 * 
 * attach this Behavior in your Base Controller with :
 * 
 	public function behaviors()
	{
		return array(
			'RBACAccessVerifier'=>array(
				'class'=>'application.modules.rbac.components.RBACAccessVerifier',
				// optional settings
				'checkDefaultIndex'=>'id',
				'allowCaching'=>false,
				'accessDeniedUrl'=>'/user/login', // this redirect is used if user is logged in
				'loginUrl'=>'/user/login' // this redirect is used if user is NOT logged in
			),
		);
	}
	
	Simply call in your controller (vars in [] are optional):
	$this->checkAccess('anyRole');
	$this->checkAccess('anyRole'[, $redirect=false]);
	$this->checkAccessByValue('anyRole', $anyValue[, $redirect=false]);
	$this->checkAccessByData('anyRole', array('id'=>$anyValue)[, $redirect=false]);
	$this->checkAccessByData('anyRole', array('id'=>$anyValue, 'text'=>$anotherValue)[, $redirect=false]);
	
	Use by default the overload Function that uses default index $this->checkDefaultIndex
	Yii::app()->controller->bizRule(1[, 2, ...]);
	
	Or use for more komplex BizRules  (vars in [] are optional):
	Yii::app()->controller->bizParam(array(1,2,3));
	Yii::app()->controller->bizParam(array(1,2,3), 'id');
	
 * @author steffomio
 */
class RBACAccessVerifier implements IBehavior{
	// needed from Behavior
    private $_component;
    private $_componentEnabled=true;
    
    // vars changeable by attachBehavior
	public $checkDefaultIndex='id';
	public $allowCaching=false;
	public $accessDeniedUrl = array("/user/login");
	public $loginUrl = array("/user/login");
	
	// this array will contain the Data to check by buisness Rule
	private $_checkAccessData=array();

	/*
	 * force deny access
	 * works same as checkAccess if access denied and autoRedirect is true
	 */
	public function denyAccess()
	{
		$this->redirect(array(!Yii::app()->user->isGuest ? $this->accessDeniedUrl : $this->loginUrl));
		Yii::app()->end();
	}

	/**
	* is called after any checkAccess...
	* to cleanup Data Container $this->_checkAccessData
	*/
	private function _resetCheckAccessData()
	{
		$this->_checkAccessData=array();
	}
	
	/**
	* check access by using function overload and default index $this->checkDefaultIndex
	* 
	*/
	public function bizRule(){
		return $this->bizParam(func_get_args(), $this->checkDefaultIndex);
	}
	
	/**
	 *
	 * called from buisness Rule like
	 * return Yii::app()->controller->checkAccessParam(array(1,2,3), 'id');
	 * @param mixed $data string or array with value(s) to check with $index
	 * @param string $ident index of $this->checkAccessData
	 * @return boolean return null if index is not set in $this->_checkAccessData
	 */
	public function bizParam($data, $index)
	{
		if(!isset($this->_checkAccessData[$index])) return null;
		if(is_array($data))
		{
			return (isset($this->_checkAccessData[$index]) ? in_array($this->_checkAccessData[$index], $data) : false);
		}else
		{
			return (isset($this->_checkAccessData[$index]) ? $this->_checkAccessData[$index]==$data : false);
		}
	}
	
	/**
	* wrapper to checkAccessByData. Check only one Value and uses default index $this->checkDefaultIndex
	* eg. checkAccessByData('anyRole', $yourValue)
	* 
	* @param string $role
	* @param mixed $value
	* @param boolean $autoRedirect
	* @return boolean
	*/
	public function checkAccessByValue($role, $value, $autoRedirect=false){
		return $this->checkAccessByData($role, array($this->checkDefaultIndex=>$value), $autoRedirect);
	}
	
	/**
	 *	check access by Data eg. checkAccessByData('anyRole', array('id'=>$yourValue))
	 * 
	 * @param string $role
	 * @param array $data will be data for bizRule check and temp. placed in $this->_checkAccessData
	 * @param boolean $autoRedirect
	 * @return boolean
	 */
	public function checkAccessByData($role, $data, $autoRedirect=false)
	{
		if(!is_array($data)) $data=array($this->checkDefaultIndex=>$data);
		$this->_checkAccessData=$data;
		if($this->checkAccess($role, false))
		{
			$this->_resetCheckAccessData();
			return true;
		}
		$this->_resetCheckAccessData();
		if($autoRedirect)
		{
			$this->redirect(array(!Yii::app()->user->isGuest ? $this->accessDeniedUrl : $this->loginUrl));
			Yii::app()->end();
		}
		return false;
	}

	/**
	 *
	 * @param mixed $role string or array of roles
	 * @param boolean $autoRedirect if false only the check result will be returned
	 * @return boolean
	 */
	public function checkAccess($role, $autoRedirect=false)
	{
		 //return true; // uncomment this Line to disable any checkAccess effects
		if(is_array($role)){
			foreach($role as $r)
			{
				// call Yii's checkAccess
				if(Yii::app()->user->checkAccess($r, $this->_checkAccessData, $this->allowCaching))
					return true;
			}
			if($autoRedirect)
			{
				Yii::app()->controller->redirect(!Yii::app()->user->isGuest ? $this->accessDeniedUrl : $this->loginUrl);
				Yii::app()->end();
			}
			return false;
		}else{
			// call Yii's checkAccess
			if(!Yii::app()->user->checkAccess($role, $this->_checkAccessData, $this->allowCaching))
			{
				if($autoRedirect)
				{
					Yii::app()->controller->redirect(array(!Yii::app()->user->isGuest ? $this->accessDeniedUrl : $this->loginUrl));
					Yii::app()->end();
				}
				return false;
			}
			return true;
		}
		return true;
	}

	
	/**
	 * Attaches the behavior object to the component.
	 * @param CComponent the component that this behavior is to be attached to.
	 */
	public function attach($component){
		$this->_component=$component;
	}
	/**
	 * Detaches the behavior object from the component.
	 * @param CComponent the component that this behavior is to be detached from.
	 */
	public function detach($component){
		if($component===$this->_component) $this->_component=null;
	}
	/**
	 * @return boolean whether this behavior is enabled
	 */
	public function getEnabled(){
		return $this->_componentEnabled;
	}
	/**
	 * @param boolean whether this behavior is enabled
	 */
	public function setEnabled($value){
		$this->_componentEnabled=!(!$value);
	}
	
	

}
