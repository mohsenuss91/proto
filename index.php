<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/protected/vendor/yiisoft/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
$composer = dirname(__FILE__) . '/protected/vendor/autoload.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
if(YII_DEBUG) {
  ini_set("display_errors", 1);
  ini_set("track_errors", 1);
  ini_set("html_errors", 1);
  error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
}


require_once($yii);

$composerAutoloader=require_once($composer);

Yii::registerAutoloader(array($composerAutoloader,'loadClass'),true);

Yii::createWebApplication($config)->run();
