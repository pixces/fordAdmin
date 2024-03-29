<?php
// Get the domain
$domain = $_SERVER['SERVER_NAME'];
$environment = ($domain == 'localhost') ? 'dev' : 'production';
$yii=dirname(__FILE__).'/../yiiFramework/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/'.$environment.'.php';

// remove the following lines when in production mode
if (isset($_GET['debug'])) define('YII_DEBUG', true);

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
