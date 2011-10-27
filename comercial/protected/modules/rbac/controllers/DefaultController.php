<?php
class DefaultController extends RBACBaseController
{
	public function actionIndex()
	{
		$this->redirect(array('//rbac/rbac'));
	}
}