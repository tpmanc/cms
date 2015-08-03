<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $mainCategory tpmanc\cmscore\models\Category */
/* @var $categories tpmanc\cmscore\models\Category */

$this->title = $mainCategory->name;

$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $mainCategory->name ?></h1>

<div class="row">
    <?php foreach ($categories as $category) { ?>
        <div class="col-lg-2">
            <?= Html::a($category['title'], ['/category/view', 'chpu' => $category['chpu']]) ?>
        </div>
    <?php } ?>
</div>
