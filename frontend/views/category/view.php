<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $category tpmanc\cmscore\models\Category */

$this->title = $category->title;
$products = $category->products;

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
