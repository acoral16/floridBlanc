<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'language' => 'es',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Test',//'Proyectos Florida Blanca',
	


	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	
 

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'macl123456',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			 'class' => 'application.components.extenCWebUser',               
			 'allowAutoLogin'=>false,
			 'loginUrl' => array('site/login'),
		),
		
		//Encripta las urls	
 		'urlManager'=>array(
 			'urlFormat'=>'path',
 			'showScriptName'=>false,
			'rules'=>array(
						array(
								'class' => 'application.components.CustomUrlRule',
						),
				),
 		),
			
			'session' => array(
					'class' => 'CDbHttpSession',
					'timeout' => 600, //10 minutes
			),
				
			
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=floridab_proyectos',
			//'connectionString' => 'mysql:host=localhost;dbname=florida',
			'emulatePrepare' => true,
			'username' => 'floridab_root',
			'password' => 'macl123456',
			//'username' => 'root',
			//'password' => '',
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
		'adminEmail'=>'acoral16@gmail.com',
	),
);