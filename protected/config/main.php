<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'vDesk',
	'language' => 'ru',

	// preloading 'log' component
	'preload'=>array(
	'log',
	'bootstrap',
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
	
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'p5or2l',
			'generatorPaths'=>array(
            'bootstrap.gii',
        ),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','194.84.103.7','82.142.170.42','188.35.130.125'),
		),

	),

	// application components
	'components'=>array(
    'mailer' => array(
      'class' => 'application.extensions.mailer.EMailer',
      'pathViews' => 'application.views.email',
      'pathLayouts' => 'application.views.email.layouts'
   ),
	'authManager' => array(
    // Будем использовать свой менеджер авторизации
    'class' => 'PhpAuthManager',
    // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
    'defaultRoles' => array('guest'),
),
	

	'bootstrap'=>array(
        'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
    ),
		'user'=>array(
	    'class' => 'WebUser',
		// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
	
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			
			),
		),
	/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		*/
		'db'=>array(
			'connectionString' => 'mysql:host=p7982.mysql.ihc.ru;dbname=p7982_support',
			'emulatePrepare' => true,
			'username' => 'p7982_support',
			'password' => '!Ghjabkm69',
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
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'i@aivanov.pro',
	),
);