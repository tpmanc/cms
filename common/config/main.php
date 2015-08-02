<?php
return [
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'formatter' => [
            'dateFormat' => 'd.m.Y',
            'timeFormat' => 'H:i:s',
            'datetimeFormat' => 'd.m.Y H:i:s',
            'decimalSeparator' => '.',
            'thousandSeparator' => ' ',
        ],
    ],
    'modules' => [
        'core' => [
            'class' => 'tpmanc\cmscore\CoreModule',
        ],
    ],
];
