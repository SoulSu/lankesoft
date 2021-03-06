<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// 一些个性化定义
define('NOW', time());
define('PROCID', uniqid('lanke', true));
define('PROJECT_ROOT_PATH', dirname(__FILE__));

require_once($yii);
Yii::createWebApplication($config)->run();


