<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $product tpmanc\cmscore\models\Product */
/* @var $category tpmanc\cmscore\models\Category */
/* @var $images tpmanc\cmscore\models\productImages */

$this->title = $product->title;

$this->params['breadcrumbs'][] = ['label' => $category->title, 'url' => ['/category/view', 'chpu' => $category->chpu]];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $product->title ?></h1>

<div class="row">
    <?php foreach ($images as $image) { ?>
        <img src="<?= Yii::getAlias('@webupload' . $image['path'] . $image['name']) ?>" alt="">
    <?php } ?>
    <?= $product->description ?>
    <br>
    <?= Yii::$app->formatter->asInteger($product->price) ?> руб.
</div>
