<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'orderProductsId') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'adress') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'extraInformation') ?>

    <?php // echo $form->field($model, 'deliveryType') ?>

    <?php // echo $form->field($model, 'paymentType') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'totalPrice') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app/order', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app/order', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
