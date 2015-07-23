<?php

use Yii\t;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DeliveryType */

$this->title = Yii::t('app/deliveryType', 'Update Delivery Type') . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/deliveryType', 'Delivery Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="delivery-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
