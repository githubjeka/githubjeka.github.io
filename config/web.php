<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mail' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
                ['pattern' => 'individual', 'route' => 'site/view', 'defaults' => ['id' => 1]],
                ['pattern' => 'costumes', 'route' => 'site/view', 'defaults' => ['id' => 2]],
                ['pattern' => 'evening-wedding-dresses', 'route' => 'site/view', 'defaults' => ['id' => 3]],
                ['pattern' => 'brands', 'route' => 'site/view', 'defaults' => ['id' => 4]],
                ['pattern' => 'furnishings', 'route' => 'site/view', 'defaults' => ['id' => 5]],
                '/' => 'site/index',
                ['pattern' => 'sesame', 'route' => 'post/create', 'defaults' => ['id' => 1]],
            ]
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
