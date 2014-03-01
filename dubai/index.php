<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);


require_once($yii);
Yii::createWebApplication($config)->run();


function echoToMobile($result)
{
	header('Content-type: application/json');
	echo json_encode(editId($result),JSON_UNESCAPED_UNICODE);
}

function editId($data)
{
	if(isset($data['_id']))
	{
		$data['id'] = (string)$data['_id'];
	}
	unset($data['_id']);
	return $data;
}