<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

?>

<div class="product-line">
    <div class="form-group field-order-name col-md-8 col-lg-8 required">
        <label class="control-label"><?= Yii::t('app/order', 'Products') ?></label>
        <?= Html::dropDownList(
            'products[]',
            null,
            $productDropDown,
            [
                'class' => 'form-control',
        ]) ?>

        <div class="help-block"></div>
    </div>
    <div class="form-group field-order-name col-md-1 col-lg-1 required">
        <label class="control-label"><?= Yii::t('app/order', 'Amount') ?></label>
        <?= Html::input(
            'text',
            'amounts[]',
            1,
            [
                'class' => 'form-control',
        ]) ?>

        <div class="help-block"></div>
    </div>
    <div class="form-group field-order-name col-md-1 col-lg-1 required">
        <button type="button" class="btn btn-danger remove-product-line"><?= Yii::t('app/order', 'Remove Product') ?></button>
    </div>
</div>