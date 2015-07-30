<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\DeliveryType;
use common\models\PaymentType;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="products-holder" id="productsHolder">
        <?= $this->render('_product-line', [
            'productDropDown' => $productDropDown,
        ]) ?>
    </div>
    <div class="clearfix"></div>
    <button type="button" class="btn btn-success" id="addProduct"><?= Yii::t('app/order', 'Add Product') ?></button>

    <br />
    <br />

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'extraInformation')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'deliveryType')->dropDownList(ArrayHelper::map(DeliveryType::find()->where(['isDisabled' => 0])->asArray()->all(), 'id', 'title')) ?>
    
    <?= $form->field($model, 'paymentType')->dropDownList(ArrayHelper::map(PaymentType::find()->where(['isDisabled' => 0])->asArray()->all(), 'id', 'title')) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
