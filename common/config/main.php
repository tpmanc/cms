<?php
$frontendMain = require(__DIR__ . '/../../frontend/config/main.php');
$frontendUrlManager = $frontendMain['components']['urlManager'];
$frontendUrlManager['class'] = 'yii\web\urlManager';

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
        'i18n' => [
            'translations' => [
                'core*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@vendor/tpmanc/cms-core/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'core' => 'core.php',
                        'core/staticPage' => 'coreStaticPage.php',
                        'core/category' => 'coreCategory.php',
                        'core/deliveryType' => 'coreDeliveryType.php',
                        'core/paymentType' => 'corePaymentType.php',
                        'core/product' => 'coreProduct.php',
                        'core/menu' => 'coreMenu.php',
                        'core/user' => 'coreUser.php',
                        'core/productRests' => 'coreProductRests.php',
                        'core/order' => 'coreOrder.php',
                        'core/orderProducts' => 'coreOrderProducts.php',
                        'core/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'frontendUrlManager' => $frontendUrlManager,
    ],
    'modules' => [
        'core' => [
            'class' => 'tpmanc\cmscore\CoreModule',
        ],
    ],
];
