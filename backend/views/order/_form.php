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

    <div class="products-holder">
        <div class="product-line">
            <div class="form-group field-order-name col-md-10 col-lg-10 required">
                <label class="control-label"><?= Yii::t('app/order', 'Products') ?></label>
                <?= Html::dropDownList(
                    'products[]',
                    null,
                    ArrayHelper::map(Product::find()->where(['isDisabled' => 0])->asArray()->all(), 'id', 'title'),
                    [
                        'class' => 'form-control',
                ]) ?>

                <div class="help-block"></div>
            </div>
            <div class="form-group field-order-name col-md-2 col-lg-2 required">
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
            <div id="addProduct"></div>
        </div>
    </div>

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
