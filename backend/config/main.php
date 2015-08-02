<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$modules = require(__DIR__ . '/modules.php');

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => '/core/dashboard/index',
    'bootstrap' => ['log'],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                'core*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '../../vendor/tpmanc/cms-core/messages',
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
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'backend/leftMenu' => 'backendLeftMenu.php',
                    ],
                ],
            ],
        ],
    ],
    'modules' => $modules,
    'params' => $params,
];
