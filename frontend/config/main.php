<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        	'targets' => [
        		[
        			'class' => 'yii\log\FileTarget',
        			'levels' => ['error'],
        			'logVars' => ['_GET', '_POST', '_FILES', '_COOKIE', '_SESSION', '_SERVER'],
        			//'categories' => ['application'],
        			'logFile' => '@runtime/logs/'.date('Ymd').'error.log',
        		],
        		[
        			'class' => 'yii\log\FileTarget',
        			'levels' => ['warning'],
        			'logVars' => ['_GET', '_POST', '_FILES', '_COOKIE', '_SESSION', '_SERVER'],
        			//'categories' => ['application'],
        			'logFile' => '@runtime/logs/'.date('Ymd').'warning.log',
        		],
        		[
        			'class' => 'yii\log\FileTarget',
        			'levels' => ['info'],
        			'logVars' => ['_GET', '_POST', '_FILES', '_COOKIE', '_SESSION', '_SERVER'],
        			//'categories' => ['application'],
        			'logFile' => '@runtime/logs/'.date('Ymd').'info.log',
        		]
        	],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'weixin'=>[
        		'class'=>'sunlsoft\yiiweixin\weixin',
        		'appid'=>'wx3929189dbf11f00c',
        		'EncodingAESKey'=>'LC3ljU7Zbx7MmolgR1i5EQKrueio2WxaS7cYVsDcA9x',
        		'Token'=>'jdprice',
        		'EncodingType'=>2
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
];
