<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DeliveryType */

$this->title = Yii::t('app/deliveryType', 'Create Delivery Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/deliveryType', 'Delivery Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
