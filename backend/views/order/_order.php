<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $order common\models\Order */
$products = $order->orderProducts;
?>

<div class="order">
    <?php foreach ($products as $product) { ?>
        <?= $product->info->title ?> - <?= $product->amount ?> шт.<br />
    <?php } ?>
</div>