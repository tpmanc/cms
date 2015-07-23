<?php
return [
    'redactor' => [
        'class' => 'yii\redactor\RedactorModule',
        'uploadDir' => '@webroot/img',
        'uploadUrl' => '@web/img',
        'imageAllowExtensions'=>['jpg','png','gif']
    ],
    'sitemap' => [
        'class' => 'backend\modules\sitemap\SitemapModule',
        'items' => [
            [
                'class' => 'backend\models\Category',
                'urlField' => 'chpu',
                'changefreq' => 'daily',
                'priority' => '0.6',
                'baseUrl' => 'http://cms/frontend/web/category/',
            ],
            [
                'class' => 'common\models\StaticPage',
                'urlField' => 'chpu',
                'changefreq' => 'daily',
                'priority' => '0.4',
                'baseUrl' => 'http://cms/frontend/web/page/',
            ],
            [
                'class' => 'common\models\Product',
                'urlField' => 'chpu',
                'changefreq' => 'daily',
                'priority' => '0.8',
                'baseUrl' => 'http://cms/frontend/web/product/',
            ],
        ],
        'savePath' => Yii::getAlias('@frontend') . '/web/sitemap.xml',
    ],
];