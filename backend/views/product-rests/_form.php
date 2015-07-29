<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Product;

/* @var $this yii\web\View */
/* @var $model common\models\ProductRests */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-rests-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productId')->dropDownList(ArrayHelper::map(Product::find()->asArray()->all(), 'id', 'title')) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app/productRests', 'Create') : Yii::t('app/productRests', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
