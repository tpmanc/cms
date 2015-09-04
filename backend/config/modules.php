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
        'baseUrl' => '@frontendWeb',
        'items' => [
            [
                'class' => 'tpmanc\cmscore\models\Menu',
                'urlField' => 'link',
                'where' => ['depth' => 1],
                'changefreq' => 'daily',
                'priority' => '0.8',
                'urlRule' => ['/main-category/view', 'chpu' => '{{urlField}}'],
            ],
            [
                'class' => 'tpmanc\cmscore\models\Menu',
                'urlMethod' => 'getLink',
                'where' => ['>', 'depth', 1],
                'changefreq' => 'daily',
                'priority' => '0.8',
                'urlRule' => ['/category/view', 'chpu' => '{{urlField}}'],
            ],
            [
                'class' => 'tpmanc\cmscore\models\StaticPage',
                'urlField' => 'chpu',
                'changefreq' => 'daily',
                'priority' => '0.4',
                'urlRule' => ['/static-page/view', 'chpu' => '{{urlField}}'],
                'enableExcluding' => true,
            ],
            [
                'class' => 'tpmanc\cmscore\models\Product',
                'urlField' => 'chpu',
                'changefreq' => 'daily',
                'priority' => '0.8',
                'urlRule' => ['/product/view', 'chpu' => '{{urlField}}'],
            ],
        ],
        'savePath' => Yii::getAlias('@frontend') . '/web/sitemap.xml',
    ],
];