<?php
$this->breadcrumbs=array(
	'Assignments'=>$this->createUrl('//rbac/assignment'),
);
?>
<h1><b>Role Assignments</b> - Userlist</h1><br>
<?php
// form errors and success
$model->renderMessages();
// pager
$this->widget('CLinkPager', array(
    'pages' => $pages,
))
?><br><br><?php 
// Form Userlist with Roles
$this->renderPartial('_listForm', array('getVars'=>$getVars, 'users'=>$users, 'colUsername'=>$colUsername, 'colUserid'=>$colUserid));

// pager
$this->widget('CLinkPager', array(
    'pages' => $pages,
))
?>


