<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            // 'uploadDir' => '@webroot/path/to/uploadfolder',
            // 'uploadUrl' => '@web/path/to/uploadfolder',
            'imageAllowExtensions'=>['jpg','png','gif']
        ],
    ],
];
