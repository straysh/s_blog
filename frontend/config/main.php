<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('frontend',dirname(__FILE__).'/../');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>"Straysh's Blog",
		
	// autoloading model and component classes
	'import'=>array(
		'frontend.models.*',
		'frontend.components.*',
		'frontend.controllers.*',
		),
	
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'article/<category:\w+>/' => '/article/category',
				'<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
			),
		),
		'cache'=>array(
			'class'=>'CFileCache',
			),
		),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);