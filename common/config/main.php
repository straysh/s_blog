<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('common',dirname(__FILE__).'/../');
// Yii::setPathOfAlias('oututils',dirname(__FILE__).'/../../../YiiOutUtils/');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>"Straysh's Blog",
	'layout' => 'column1',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'common.models.*',
		'common.qmodels.*',
		'common.components.*',
		'common.components.utils.*'
	),
	
	'modules' => array(
		// uncomment the following to enable the Gii tool
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => '884168',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array(
				'127.0.0.1',
				'::1'
			)
		)
	),

	'defaultController'=>'site',

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
// 		'db'=>array(
// 			'connectionString' => 'sqlite:protected/data/blog.db',
// 			'tablePrefix' => 'tbl_',
// 		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=s_blog',
			'emulatePrepare' => true,
			'enableProfiling' => TRUE,
			'enableParamLogging' => TRUE,
			'username' => 'root',
			'password' => '123456',
			'charset' => 'utf8',
			'tablePrefix' => 's_',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
			 'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
			),
		),
		
		'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
			'defaultRoles'=>array('authenticated', 'guest'),
			'itemTable'=>'AuthItem',
			'itemChildTable'=>'AuthItemChild',
			'assignmentTable'=>'AuthAssignment',
		),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);