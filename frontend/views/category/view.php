<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $category tpmanc\cmscore\models\Category */
/* @var $parents tpmanc\cmscore\models\Category */

$this->title = $category->title;
$products = $category->products;

foreach ($parents as $parent) {
    $this->params['breadcrumbs'][] = ['label' => $parent->info['title'], 'url' => ['/main-category/view', 'chpu' => $parent->info['chpu']]];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $category->title ?></h1>

<div class="row">
    <?php foreach ($products as $product) { ?>
        <div class="col-lg-2">
            <?= Html::a($product->title, ['/product/view', 'chpu' => $product->chpu]) ?>
            <br>
            <?= $product->shortDescription?>
            <br>
            <?= Yii::$app->formatter->asInteger($product->price) ?> руб.
        </div>
    <?php } ?>
</div>
