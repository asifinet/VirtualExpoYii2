<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'   // here is our v1 modules
        ]
    ],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
            ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
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
            'enablePrettyUrl' => true,
            //'enableStrictParsing' => true,
            'showScriptName' => false,
            
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'v1/company',   // our country api rule,
                    'extraPatterns' => ['GET search' => 'search'],
                    'pluralize'=>false,
                    'tokens' => [
                        '{stand_owner_id}' => '<stand_owner_id:\\w+>'
                    ]
                ],
                    [
                        'class' => 'yii\rest\UrlRule',
                        'controller' => 'v1/stand', 
                        'extraPatterns' => ['GET search' => 'search'],  // our country api rule,
                        'pluralize'=>false,
                      //  'extraPatterns' => [ 'GET' => 'index'],
                        'tokens' => [
                            '{id}' => '<id:\\w+>'
                        ],
                    ],
                    [
                        'class' => 'yii\rest\UrlRule',
                        'controller' => 'v1/mktdocs', 
                        'extraPatterns' => ['GET search' => 'search'],  // our country api rule,
                        'pluralize'=>false,
                      //  'extraPatterns' => [ 'GET' => 'index'],
                        'tokens' => [
                            '{comp_id}' => '<comp_id:\\w+>',
                            '{stand_id}' => '<stand_id:\\w+>'
                        ],
                        
                ]
            ],
        ],
    ],
    'params' => $params,
];