<?php echo 'do not run this file'; exit(); ?>
  
Here some steps how to install RBAC Manager:

1)
Copy rabc folder to protected/modules/rbac


2)
Query the DB Schema rbac/data/schema.sql to your Database
an make sure you have a User with id 1 elso you can't
access the RBAC Manager. 
If not, edit the second Field in the SQL Schema to your needs:
...
INSERT INTO `AuthAssignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('SuperAdmin', '1', '', '');
...


3)
Copy rbac/data/rbac.css to your Webdirectory where the other Yii-css Files are stored
eg. htdocs/css/rbac.css


4)
Open File protected/config/main.php and add the Module to the Yii Config
$config=array(
	...
	'modules'=>array(
	...
	// rbac configured to run with module Yii-User
	'rbac'=>array(
		'tableUser'=>'User', 			// Table where Users are stored. RBAC Manager use it as read-only
		'columnUserid'=>'id', 			// The PRIMARY column of the User Table
		'columnUsername'=>'username', 	// used to display name and could be same as columnUserid
		'columnEmail'=>'email' 			// email (only for display)
		),
	...
	),
	...
	
	
	
	// make sure you have a db connection and authManager running
	// and look at last both entrys 
	// 'defaultRoles' and 'showErrors' in 'authManager'
	'components'=>array(
		...
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=yourDatabase',
			'emulatePrepare' => true,
			'username' => 'yourDatabase',
			'password' => 'password',
			'charset' => 'utf8',
		),
		...
		'authManager'=>array(
            'class'=>'CDbAuthManager', 				// Database driven Yii-Auth Manager
            'connectionID'=>'db', 					// db connection as above
			'defaultRoles'=>array('registered'), 	// default Role for logged in users
			'showErrors'=>true, 					// show eval()-errors in buisnessRules
		),
		...
	),
)


5)
Open Base Controller of your Application and/or Module eg. protected/components/controller.php
and add attach the AccessVerifier Component

	public function behaviors()
	{
		return array(
			'accessComponent'=>array(
				'class'=>'application.modules.rbac.components.RBACAccessVerifier',
				// optional default settings
				'checkDefaultIndex'=>'id', 			// used from buisness Rule if no Index given
				'allowCaching'=>false,				// cache RBAC Tree ### D-O--N-O-T--E-N-A-B-L-E ### while development ;)
				'accessDeniedUrl'=>'/user/login',	// used if User is logged in
				'loginUrl'=>'/user/login'			// used if User is NOT logged in
			),
		);
	}


#################### optional steps #####################


6 optional)
RBAC Manager supports protected Users and RBAC Items
You find them in rbac/components/RBACBaseController.php
class RBACBaseController extends CController
{
...
	/*
	 * not changeable (protected) rbac items
	 */
	public $protectedItems=array(
		'SuperAdmin', 
			'RbacAdmin',
				'RbacAssignmentEditor',
					'RbacAssignmentViewer',
				'RbacEditor',
					'RbacViewer');
	/*
	 * protected users with not changeable assignments
	 */
	public $protectedUsers=array(1); // from User Table collumn module->columnUserid
...


7 optional)
If you want to temporaly disable any checkAccess effects
open rbac/components/RBACAccessVerifier and uncomment this Line:
...
	public function checkAccess($role, $autoRedirect=false)
	{
		// return true; // uncomment this Line to disable any checkAccess effects
		if(is_array($role)){
		...
		
		
##################### Thats All #####################

Add first Roles
A good praktice is to have a SuperAdmin wich have all Sub-Roles.
Feel free to add your application Roles as childRole to the predefined Role 'SuperAdmin'
or make your Application Tree in the RBAC TopLevel.
<?php
	
//	1) 	Check access in your Controller
		// we have only tree methods for checking access in the RBACAccessVerifier to work with
		// checkAccess(string role[, boolean redirect=false])
		// checkAccessByValue(string role, mixed value[, boolean redirect=false])
		// checkAccessByData(string role, array(mixed index => mixed value[, ...])[, boolean redirect=false])
		
		// For simple Check 
		$this->checkAccess('anyRole'); 
		
		// simple check with redirect
		$this->checkAccess('anyRole', true);
		
		// extended check with bizRule (will use default index)
		$this->checkAccessByValue('anyRole', $mixedValue);
		
		// extended check with bizRule with redirect (will use default index)
		$this->checkAccessByValue('anyRole', 123, true);
		
		// even more komplex check with more data 
		$this->checkAccessByData('anyRole', array('pet'=>'doc', 'number'=>123));
		
		// even more komplex check with more data and with redirect
		$this->checkAccessByData('anyRole', array('pet'=>'doc', 'number'=>123), true);
		
		// thats all you can do in your Controller
		
// 2)	Now bring them together with buisness Rules stored in your Database
		// at this point you have to know, how the bizRules work:
		/*
		After a Buisness Rule the AccessController ends with the Buisness Rule Result 
		and does not climp up to Parent any more.
		
		Check Access steps in Detail:
		1.) if User has requested Item Assigned do 2) - else do 4)
		2.) if requested User Assignment Item has Buisness Rule check and end - else do 3)
		3.) if requested RBAC Item has Buisness Rule check and end - else end with true
		4.) if requested Item has parent do 1) with parent as requested Item - else end with false

		The Data field is not used while checking access. Feel free to use it fore your needs.
		*/
		
		// we have only two methods for BizRules in the RBACAccessVerifier to work with 
		// bizRule([mixed value, ...])
		// bizParam(mixed index, array([mixed value, ...]))
		
		// you have all other methods of Yii aviable like
		// Yii::app()->...any value or method with any params
	
		// Let's go!:
		
		// extended check with method bizRule (will use default index, normaly 'id')
		$this->checkAccessByValue('anyRole', $mixedValue);
		// should have bizRule:
		Yii::app()->controller->bizRule($mixedValue, $mixedValue2, $mixedValue_n, $and_so_on);
		
		// very extended check with bizParam (will use your index
		$this->checkAccessByData('anyRole', array('name'=>'Peter'));
		// should have bizRule:
		Yii::app()->controller->bizParam('name', array('Peter', 'Lucy'));
		// or:
		Yii::app()->controller->bizParam('name', 'Peter');
		
		// if your default index is 'id' this works too
		$this->checkAccessByData('anyRole', array('id'=>$mixedValue));
		// with bizRule
		Yii::app()->controller->bizRule($mixedValue, $mixedValue2, $mixedValue_n, $and_so_on);
		// or in opposide
		$this->checkAccessByValue('anyRole', $mixedValue);
		// with bizRule 
		Yii::app()->controller->bizParam('id', $mixedValue);
		
		// this will throw an error
		$this->checkAccess('anyRole');
		// with bizRule 
		Yii::app()->controller->bizParam('id', $mixedValue);
		
		
		
		?>