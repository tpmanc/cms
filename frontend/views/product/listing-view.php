<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $product tpmanc\cmscore\models\Product */

?>

<div class="col-lg-2 product-listing-view">
    <?php
        $images = $product->getImages();
        foreach ($images as $image) {
            echo Html::img($image);
        }
    ?>

    <?= Html::a($product->title, ['/product/view', 'chpu' => $product->chpu]) ?>
    <br>
    <?= $product->shortDescription?>
    <br>
    <?= Yii::$app->formatter->asInteger($product->price) ?>
</div>