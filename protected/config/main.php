<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Admin Portal',
	'theme'=>'cnktheme',

    //default controller to be called
    'defaultController' => 'login',

	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'ext.YiiMailer.YiiMailer',
	),

	// application components
	'components'=>array(
        'session' => array (
            'autoStart' => true,
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            //'class' => 'WebUser',
            'loginUrl' => array('login'),
		),
        /*
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
        ),
        */
        'cache'=>array(
            'class'=>'system.caching.CFileCache',
            ),
        'settings'=>array(
            'class'             => 'application.extensions.CmsSettings',
            'cacheComponentId'  => 'cache',
            'cacheId'           => 'global_website_settings',
            'cacheTime'         => 84000,
            'tableName'         => 'config',
            'dbComponentId'     => 'db',
            'createTable'       => true,
            'dbEngine'      	=> 'InnoDB',
            ),

		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
            'caseSensitive'=>false,
			'rules'=>array(
                // REST patterns
                array('api/getSocialUser', 'pattern'=>'api/v1/getSocialUser/<social:\w+>', 'verb'=>'GET'),
                array('api/authenticate', 'pattern'=>'api/v1/authenticate/<social:\w+>', 'verb'=>'GET'),
                array('api/list', 'pattern'=>'api/v1/<model:\w+>', 'verb'=>'GET'),
                array('api/view', 'pattern'=>'api/v1/<model:\w+>/<id:\d+>', 'verb'=>'GET'),
                array('api/create', 'pattern'=>'api/v1/<model:\w+>', 'verb'=>'POST'),
                array('api/update', 'pattern'=>'api/v1/update/<model:\w+>', 'verb'=>'POST'),

                //disable all put and delete rest patterns
                //array('api/update', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
                //array('api/delete', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),

                //all general patterns
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		/*
		 * Uncomment for sql lite implementation
        'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
//
//		'db'=>array(
//			'connectionString' => 'mysql:host=emporiadb.clunjnqjscmn.ap-southeast-1.rds.amazonaws.com;dbname=emporia',
//			'emulatePrepare' => true,
//			'username' => 'root',
//			'password' => 'y3zg9S4T5RHe',
//			'charset' => 'utf8',
//		),

		/*'db'=>array(
			'connectionString' => 'mysql:host=emporiadb.clunjnqjscmn.ap-southeast-1.rds.amazonaws.com;dbname=emporia',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'y3zg9S4T5RHe',
			'charset' => 'utf8',
		),*/

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
                // disable on production
				array(
					'class'=>'CWebLogRoute',
				),
			),
		),
        'twitter'=>array(
            'class' => 'application.extensions.twitter_oauth', // path to the twitter extension
            'oauth_access_token' => '54500373-zO7lhekUGXugfzgYuZcyuPylfR35YUqz6q7nr6mPD',
            'oauth_access_token_secret' => 'V6ylBzbyUA9zXUMQcCkb8m6G4A28fA6fuFq1SJGOZGk',
            'consumer_key' => 'qAYiR5nyrvKboWJk8Lw',
            'consumer_secret' => 'A6Zu1EDv6nkGrPezShTcVaasGwVge5EMum2XxHwjo'
        ),
        'facebook'=>array(
            'fb_app_id' => '231422860345111',
            'fb_secret_key' => '67d7134df5ded4d780ea72a351729ec6',
        ),
    ),

// application-level parameters that can be accessed
// using Yii::app()->params['paramName']
    //add more config params is required
	'params'=>array(
		// this is used in contact page
		'adminEmail'        => 'pixces@yahoo.com',
        'default'           => 'default',
        'thumb'             => 'thumb',
        'extension'         => 'jpg',
        'galleryImageName'  => 'gallery_',
        'contentImageName'  => 'content_',
        'widgetImageName'   => 'widget_',
        'pageImageName'     => 'page_',
        'uploadPath'        => 'uploadedImages',
        'deleteStatus'      => 'deleted',
        'activeStatus'      => 'active',
        'inactiveStatus'    => 'inactive',
        'pendingStatus'     => 'pending'
	),
);