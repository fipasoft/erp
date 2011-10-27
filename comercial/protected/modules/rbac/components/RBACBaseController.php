<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */

class RBACBaseController extends CController
{
	
	public $layout='//layouts/column2';
	public $menu=array(
			array('label'=>'RBAC Tree', 	'url'=>array('//rbac/rbac')),
			array('label'=>'Assignments', 	'url'=>array('//rbac/assignment')),
		);
	public $breadcrumbs=array();
	public $getVars;
	
	/*
	 * messages
	 */
	public $messageErrors=array();
	public $messageWarnings=array();
	public $messageInfos=array();
	public $messageSuccess=array();
	
	/*
	 * not changeable rbac items
	 */
	public $protectedItems=array(
		'SuperAdmin', 
			'RbacAdmin',
				'RbacAssignmentEditor',
					'RbacAssignmentViewer',
				'RbacEditor',
					'RbacViewer');
	/*
	 * users with not changeable assignments
	 */
	public $protectedUsers=array(1);
	
	/*
	 * wrapper to set default vars for the renderer
	 */
	public function doRender($page, $vars=array())
	{
		$addVars = array(
				'model'=>$this,
				'colUsername'=>Yii::app()->controller->module->columnUsername,
				'colUserid'=>Yii::app()->controller->module->columnUserid,
				'colEmail'=>Yii::app()->controller->module->columnEmail,
			);
		$this->render($page, array_merge($addVars, $vars));
	}
	
	public function filterString($str, $pattern)
	{
		preg_match($pattern, $str, $res);
		return empty($res) ? '' : $res[0];
	}
	
	/*
	 * render User Infos and Errors
	 */
	public function renderMessages()
	{
		if(count($this->messageErrors))
			$this->renderPartial('/messages/_formErrors', array('messageErrors'=>$this->messageErrors));
		if(count($this->messageWarnings))
			$this->renderPartial('/messages/_formWarnings', array('messageWarnings'=>$this->messageWarnings));
		if(count($this->messageInfos))
			$this->renderPartial('/messages/_formInfos', array('messageInfos'=>$this->messageInfos));
		if(count($this->messageSuccess))
			$this->renderPartial('/messages/_formSuccess', array('messageSuccess'=>$this->messageSuccess));
	}
	
	public function behaviors()
	{
		return array(
			'accessComponent'=>array(
				'class'=>'application.modules.rbac.components.RBACAccessVerifier',
				// optional settings
				'checkDefaultIndex'=>'id',
				'allowCaching'=>false,
				'accessDeniedUrl'=>'/user/login',
				'loginUrl'=>'/user/login'
			),
		);
	}
}











