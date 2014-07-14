<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Crom',

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
        'db'=>array(
            'connectionString' => 'mysql:host=127.0.0.1:3306;dbname=coxnkings',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'enableParamLogging'=>true,
        ),
        'session' => array (
            'autoStart' => true,
        ),
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            //'class' => 'WebUser',
            'loginUrl' => array('login'),
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'logFile'=>'cron.log',
                    'levels'=>'info, error, warning',
                ),
                array(
                    'class'=>'CFileLogRoute',
                    'logFile'=>'cron_trace.log',
                    'levels'=>'trace',
                ),
            ),
        ),
    ),



    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    //add more config params is required
    'params'=>array(
        'checkStatus' => 'processing',
        'APPROVED' => 'approved',
    ),
);