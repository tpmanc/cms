<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $product tpmanc\cmscore\models\Product */

?>

<div class="col-lg-2 product-listing-view">
    <?= Html::img($product->getImages(1)) ?>

    <?= Html::a($product->title, ['/product/view', 'chpu' => $product->chpu]) ?>
    <br>
    <?= $product->shortDescription?>
    <br>
    <?= Yii::$app->formatter->asInteger($product->price) ?>
</div>