<?php

namespace backend\modules\sitemap;

use Yii;
// TODO: вывести lat update в шаблоне
class SitemapModule extends \yii\base\Module
{
    public $controllerNamespace = 'backend\modules\sitemap\controllers';

    public $items = [];

    public $savePath = '';

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/sitemap/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@app/modules/sitemap/messages',
            'fileMap' => [
                'modules/sitemap/module' => 'module.php',
            ],
        ];
    }

    public static function t($message, $params = [], $language = null)
    {
        return Yii::t('modules/sitemap/module', $message, $params, $language);
    }
}
