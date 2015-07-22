<?php
return [
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
	        'translations' => [
	            'app*' => [
	                'class' => 'yii\i18n\PhpMessageSource',
	                'basePath' => '@app/messages',
	                'sourceLanguage' => 'en-US',
	                'fileMap' => [
	                    'app' => 'app.php',
	                    'app/staticPage' => 'appStaticPage.php',
	                    'app/error' => 'error.php',
	                ],
	            ],
	        ],
	    ],
    ],
];
