<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'E-Warung Management System',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.EExcelWriter.*', 
		),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			),
		
		),

	'theme'=>'kenny',
	'language'=>'id',
	'sourceLanguage'=>'id',
	'timeZone'=>'Asia/Jakarta',	

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			),

		'authManager'=>array(
			'class'=>'RDbAuthManager',
			),
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:w+>/<id:d+>'=>'<controller>/view',
				'<controller:w+>/<action:w+>/<id:d+>'=>'<controller>/<action>',
				'<controller:w+>/<action:w+>'=>'<controller>/<action>',

				//Page URL Default Settings
				'login' => 'site/login',
				'logout' => 'site/logout',
				'dashboard' => 'site/dashboard',
				'index' => 'site/index', 
				'contact' => 'site/contact',


				'penjualan/search/<term:(.*)>' => 'penjualan/JuiAutoComplete',
				'pembelian/search/<term:(.*)>' => 'pembelian/JuiAutoComplete',

				),
			
			'showScriptName'=>false,
			'caseSensitive'=>false
				// 'urlSuffix'=>'.html',
			),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database


		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=i_warung',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			),

		// 'db'=>array(
		// 	'connectionString' => 'mysql:host=localhost;dbname=u0282705_regal_bisnis',
		// 	'emulatePrepare' => true,
		// 	'username' => 'u0282705_regal',
		// 	'password' => ',7%xoETy@_UF',
		// 	'charset' => 'utf8',
		// 	),
		
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
		'adminEmail'=>'infomugi@gmail.com',
		),
	);