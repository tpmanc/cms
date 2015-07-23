<?php

use \backend\modules\sitemap\SitemapModule;
use yii\helpers\Url;
// TODO: сделать сообщение что все ок или ошибка
?>
<div class="sitemap-default-index">
    <h1><?= SitemapModule::t('Site Map Generator') ?></h1>

    <p>
        <a href="<?= Url::to(['/sitemap/main/generate'])?>" class="btn btn-success"><?= SitemapModule::t('Generate') ?></a>
    </p>
</div>
