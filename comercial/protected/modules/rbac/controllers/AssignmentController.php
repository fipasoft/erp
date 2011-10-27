<?php

class AssignmentController extends RBACBaseController
{
	
	// user List
	public $users;
	public $authAssignments; // yii crashes by name $assignments in CWebApplication in Line 391: if(!classExists(...
	
	// manage user Assignments
	public $manageUser;
	
	// edit Assignments from User
	public $editUser;
	public $assignments;
	
	
	// CPagination
	public $paginate;
	public $usersPerPage=20;
	
	// search
	public $searchFields;
	public $defaultSearchFields=array(
		's1'=>'Username', // displayed default value
		's2'=>'Role',
		's3'=>'Buisness Rule',
		's4'=>'Data'
		);
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->checkAccess('RbacAssignmentViewer', true);
		$this->doRender('index', array(
			'assignUser'=>$this->manageUser,
			'users' => $this->_getUserlist(),
			'pages' => $this->paginate,
			'getVars' => $this->getGetVars()
		));
	    Yii::app()->end();
		
	}
	
	/**
	 * 
	 * @desc
	 */
	private function _getUserlist()
	{
		/**
		 * get changeable table- and columnnames
		 */
		$module=Yii::app()->controller->module;
		$tblUser=$module->tableUser;
		$colUsername=$module->columnUsername;
		$columnUserid=$module->columnUserid;
		
		/*
		 * this is a very ugly yii workaround
		 * of Paginate Tables with HAS_MANY Joins and Conditions
		 * 
		 * I do this with two selects:
		 * one for count, limit and offset
		 * and one for the Item select
		 * In both we have to use the conditions
		 * 
		 */
		
		// create criteria for count, limit and offset select
		$criteria=new CDbCriteria(
			array(
				'with'=>array('assignment'),
				'order'=>'t.$colUsername ASC'
				)
			);
		
		// get Getvars and diff $this->searchFields and $this->defaultSearchFields
		$this->_getSearchFields();
		
		// combine getvars with tablenames
		$columns=array(
			's1'=>'t.'.$colUsername,
			's2'=>'assignment.itemname',
			's3'=>'assignment.bizrule',
			's4'=>'assignment.data');
		
		// array for second itemselect
		$conditions=array();
		
		// get the conditions from getvars s1, s2, s3 and s4
		if(isset($this->searchFields['s1']) && $this->searchFields['s1'] != $this->defaultSearchFields['s1'])
		{
			$criteria->addSearchCondition($columns['s1'], $this->searchFields['s1'], true, 'AND', 'LIKE');
			$conditions['s1']="$tblUser.$colUsername LIKE :s1";
		}
		if(isset($this->searchFields['s2']) && $this->searchFields['s2'] != $this->defaultSearchFields['s2'])
		{
			$criteria->addSearchCondition($columns['s2'], $this->searchFields['s2'], true, 'AND', 'LIKE');
			$conditions['s2']="AuthAssignment.itemname LIKE :s2";
		}
		if(isset($this->searchFields['s3']) && $this->searchFields['s3'] != $this->defaultSearchFields['s3'])
		{
			$criteria->addSearchCondition($columns['s3'], $this->searchFields['s3'], true, 'AND', 'LIKE');
			$conditions['s3']="AuthAssignment.bizrule LIKE :s3";
		}
		if(isset($this->searchFields['s4']) && $this->searchFields['s4'] != $this->defaultSearchFields['s4'])
		{
			$criteria->addSearchCondition($columns['s4'], $this->searchFields['s4'], true, 'AND', 'LIKE');
			$conditions['s4']="AuthAssignment.data LIKE :s4";
		}
		
		// get the DB for the count select
		$db=Yii::app()->getDb();
		
		// the first half query
		$sql="SELECT COUNT(*)
			FROM $tblUser
			LEFT JOIN AuthAssignment
				ON AuthAssignment.userid = $tblUser.$colUsername
			";
		
		// add the WHERE condition
		if(count($conditions)){
			$sql.=" WHERE (".implode(' AND ', $conditions).") ";
		}
		
		// create the command
		$command=$db->createCommand($sql);
		
		// bind the values
		foreach($conditions as $key => $value)
		{
			$command->bindValue($key, '%'.$this->searchFields[$key].'%');
		}
		// and finaly get the REAL count of Items
		$count=$command->queryScalar();
		
		// create the pagination
		$this->paginate=new CPagination($count);
		$this->paginate->pageSize=$this->usersPerPage;
		
		// after this we will find limit and offset in the criteria
		$this->paginate->applyLimit($criteria);
		
		// now begin the second select for the Items
		$sql=" SELECT $tblUser.$columnUserid, $tblUser.$colUsername, AuthAssignment.itemname, AuthAssignment.bizrule, AuthAssignment.data
			FROM $tblUser
			LEFT JOIN AuthAssignment
				ON AuthAssignment.userid = $tblUser.$columnUserid
			";
		
		// add the WHERE condition
		if(count($conditions)){
			$sql.=" WHERE (".implode(' AND ', $conditions).") ";
		}
		// add ORDER
		$sql.=" ORDER BY $tblUser.$colUsername ASC, AuthAssignment.itemname";
		
		// add limit and offset from $criteria
		$sql.=" LIMIT ".$criteria->offset.','.$criteria->limit;
		
		// create the command
		$command=$db->createCommand($sql);
		
		// bind the values
		foreach($conditions as $key => $value)
		{
			$command->bindValue($key, '%'.$this->searchFields[$key].'%');
		}
		
		// and here the are
		$this->users=$command->queryAll();
		return $this->users;
	}
	
	
	/**
	 * 
	 * @desc
	 */
	private function _getSearchFields()
	{
		if($this->searchFields !== null) return;
		if(isset($_GET['s1']))
		{
			$resource = $_GET;
		}elseif(isset($_POST['search'])){
			$resource = $_POST['search'];
		}else{
			$this->searchFields=$this->defaultSearchFields;
			return;
		}
		foreach($this->defaultSearchFields as $k => $v)
		{
			if(!isset($resource[$k]))
			{
				$this->searchFields[$k]='';
			}else{
				$this->searchFields[$k]=($resource[$k] != '' ? urldecode($resource[$k]) : $this->defaultSearchFields[$k]);
			}
		}
	}
	
	
	
	
	/**
	 * @desc merge getvars from pagination and searchfields
	 */
	private function getGetVars()
	{
		return isset($_GET['page']) ? array_merge(array('page'=>$_GET['page']), $this->searchFields) : $this->searchFields;
	}
	
	/**
	 * @desc addassignments
	 */
	public function actionManage(){
		
		// get changable collumnnames
		$colUsername=Yii::app()->controller->module->columnUsername;
		$colUserid=Yii::app()->controller->module->columnUserid;
		
		// check access to view
		$this->checkAccess('RbacAssignmentViewer', true);
		if(isset($_GET['userid']))
		{
			// warn if user is protected
			if(in_array($_GET['userid'], $this->protectedUsers))
				$this->messageWarnings[]="Warning! User is protected by Controller";
			
			// user must exist
			if($user=User::model()->findByAttributes(array("$colUserid"=>urldecode($_GET['userid'])))){
				$this->manageUser=$user;
			}else{
				throw new CHttpException("Selected User ".urldecode($_GET['username'])." does not exist");
			}
		}elseif(isset($_POST['userid']))
		{
			// check access for edit assignments
			$this->checkAccess('RbacAssignmentEditor', true);
			if(in_array($_POST['userid'], $this->protectedUsers))
			{
				$this->messageErrors[]="Sorry, User is protected by Controller";
				$this->actionIndex();
			}
			$username = $_POST['username'];
			$userid=(int)$_POST['userid'];
			if(!$user=User::model()->findByAttributes(array("$colUserid"=>$userid)))
				throw new CHttpException("Managed User $username does not exist");
			// add selected assignments
			if(isset($_POST['addAssignments']))
			{
				// fill bizRule with deny-always code if selected from user
				$bizRule=isset($_POST['secureMode']) ? 'return false;' : '';
				foreach($_POST['addAssignments'] as $itemname)
				{
					// add default code to bizRule if selected
					if(isset($_POST['addData'])){
						$item=AuthItem::model()->findByAttributes(array('name'=>$itemname));
						$bizRule.=$item->data;
					}
					// add assignment
                    $assignment=new AuthAssignment;
					$assignment->attributes=(array('userid'=>$userid, 'itemname'=>$itemname, 'bizrule'=>$bizRule, 'data'=>''));
					if(!$assignment->validate())
						throw new CHttpException("New Assignment validation Error");
					$assignment->save();
					$this->messageSuccess[]="Assignment $itemname succesfull added.";
				}
			}
			// remove selected assignments
			if(isset($_POST['removeAssignments']))
			{
				foreach($_POST['removeAssignments'] as $itemname)
				{
					$assignment=AuthAssignment::model()->findByAttributes(array('userid'=>$userid, 'itemname'=>$itemname));
					$assignment->delete();
					$this->messageSuccess[]="Assignment $itemname succesfull removed.";
				}
			}
			$this->manageUser=$user;
		}else{
			 $this->actionIndex();
		}
		$this->manageUser=$user;
		$this->_getSearchFields();
		
		$displayHelper=new RBACDisplayHelper($this, 'renderItemAssign');
		$displayHelper->setUser($this->manageUser);
		
	    $this->doRender('manage', array(
	    	'displayHelper'=>$displayHelper,
			'manageUser'=>$this->manageUser,
			'getVars' => $this->getGetVars()
		));
	    Yii::app()->end();
	}
	
	/**
	 * @desc eject assignment or edit assignment data
	 */
	public function actionEdit()
	{
		$colUsername=Yii::app()->controller->module->columnUsername;
		$colUserid=Yii::app()->controller->module->columnUserid;
		
		$this->checkAccess('RbacAssignmentViewer', true);
		
		if(isset($_GET['userid']))
		{
			if(in_array($_GET['userid'], $this->protectedUsers))
			{
				$this->messageWarnings[]="Warning! User is protected by Controller";
			}
			if($this->editUser=User::model()->findByAttributes(array($colUserid=>$_GET['userid'])))
			{
				$this->assignments=AuthAssignment::model()->findAllByAttributes(array('userid'=>$this->editUser->$colUserid));
				$this->_getSearchFields();
				$this->doRender('edit', array(
					'user'=>$this->editUser,
					'assignments'=>$this->assignments,
					'getVars' => $this->getGetVars()
				));
			}else{
				throw new CHttpException("Selected User ".CHtml::encode($_GET['username'])." does not exist");
			}
		}elseif(isset($_POST['userid']) 
				&& isset($_POST['assignments']) 
				&& is_array($_POST['assignments']))
		{
			$this->checkAccess('RbacAssignmentEditor', true);
			if(in_array($_POST['userid'], $this->protectedUsers))
			{
				$this->messageErrors[]="Sorry, User is protected by Controller";
				$this->actionIndex();
			}
			if($this->editUser=User::model()->findByAttributes(array($colUserid=>$_POST['userid'])))
			{
				foreach($_POST['assignments'] as $itemName => $values)
				{
					$modelAssign=AuthAssignment::model()->findByAttributes(array('itemname'=>$itemName, 'userid'=>$this->editUser->$colUserid));
					$modelAssign->attributes=array('bizrule'=>$values['bizrule'], 'data'=>$values['data']);
					if($modelAssign->validate())
					{
						$modelAssign->save();
						$this->messageSuccess[]="Assignment $itemName successfull updated.";
					}
				}
				$this->_getSearchFields();
					$this->doRender('edit', array(
						'user'=>$this->editUser,
						'assignments'=>$this->assignments=AuthAssignment::model()->findAllByAttributes(array('userid'=>$this->editUser->$colUserid)),
						'getVars' => $this->getGetVars()
					));
				    Yii::app()->end();
			}else{
				throw new CHttpException("User ".CHtml::encode($_POST['username'])." does not exist");
			}
		}else{
			throw new CHttpException("Not enougth Data for Edit Assignments found");
		}
		
	}
	
	
	
	
}
?>