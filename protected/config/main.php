<?php

// 自定义函数
require_once dirname(__FILE__) . '/../extensions/functions.php';

!defined('SOFT_VERSION') && define('SOFT_VERSION', 'v1.0');

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Lankesoft Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
        'application.components.*',
        'application.components.process.*',
        'application.components.exception.*',
        'application.extensions.*',
    ),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

        'admin'
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		'urlManager' => require(dirname(__FILE__) . '/route.php'),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'info',
				),
				// uncomment the following to show log messages on web pages
/*
				array(
					'class'=>'CWebLogRoute',
				),
*/
			),
		),
        'cache'=>array( 'class'=>'CFileCache'),

    ),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',

        'adminConfig' => array(
            'webnav' => require(dirname(__FILE__).'/adminnav.php'),
        ),
	),

    'language' => 'zh_cn',
    'timeZone'=>'Asia/Chongqing',
);
