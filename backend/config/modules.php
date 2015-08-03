<?php
return [
    'redactor' => [
        'class' => 'yii\redactor\RedactorModule',
        'uploadDir' => '@webroot/img',
        'uploadUrl' => '@web/img',
        'imageAllowExtensions' => ['jpg','png','gif']
    ],
    'core' => [
        'class' => 'tpmanc\cmscore\CoreModule',
    ],
    'sitemap' => [
        'class' => 'tpmanc\sitemap\SitemapModule',
        'items' => [
            [
                'class' => 'tpmanc\cmscore\models\Category',
                'urlField' => 'chpu',
                'changefreq' => 'daily',
                'priority' => '0.6',
                'baseUrl' => '@web/category/',
            ],
            [
                'class' => 'tpmanc\cmscore\models\StaticPage',
                'urlField' => 'chpu',
                'changefreq' => 'daily',
                'priority' => '0.4',
                'baseUrl' => '@web/page/',
                'enableExcluding' => true,
            ],
            [
                'class' => 'tpmanc\cmscore\models\Product',
                'urlField' => 'chpu',
                'changefreq' => 'daily',
                'priority' => '0.8',
                'baseUrl' => '@web/product/',
            ],
        ],
        'savePath' => Yii::getAlias('@frontend') . '/web/sitemap.xml',
    ],
];