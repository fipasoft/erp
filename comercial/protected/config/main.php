<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Sincronizador',
	'theme'=>'fipa',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*'
	),

	'modules'=>array(
		// rbac configured to run with module Yii-User
		'rbac'=>array(
		    // Table where Users are stored. RBAC Manager use it as read-only
		    'tableUser'=>'usuario', 
		    // The PRIMARY column of the User Table
		    'columnUserid'=>'id',
		    // only for display name and could be same as id
		    'columnUsername'=>'login',
		    // only for display email for better identify Users
		    'columnEmail'=>'mail' // email (only for display)
		    ),
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'yii',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		 'authManager'=>array(
		    'class'=>'CDbAuthManager', // Database driven Yii-Auth Manager
		    'connectionID'=>'db', // db connection as above
			'defaultRoles'=>array('registered'), // default Role for logged in users
			'showErrors'=>true, // show eval()-errors in buisnessRules
		    ),
		'urlManager'=>array(
			'urlFormat'=>'path',
		    'showScriptName'=>false,
		     'caseSensitive'=>false,      
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			)
		),
		
	/*	'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
	
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=erp_comercial',
			'emulatePrepare' => true,
			'username' => 'erp_comercial',
			'password' => '.erp_comercial',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),*/
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'jlopez@fipasoft.mx',
		'defaultController' => 'site'
	),
	'language'=>'es', // Este es el lenguaje en el que querés que muestre las cosas

    'sourceLanguage'=>'en', //  este es el lenguaje por default de los archivos
	
	
);