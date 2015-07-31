<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $order[] common\models\Order */

$this->title = Yii::t('app/order', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app/order', 'Create Order'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app/order', 'New Orders'), ['index'], ['class' => 'btn btn-info']) ?>
        <?= Html::a(Yii::t('app/order', 'Accepted Orders'), ['index', 'status' => 'accepted'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app/order', 'Canceled Orders'), ['index', 'status' => 'canceled'], ['class' => 'btn btn-danger']) ?>
    </p>

    <div class="ordersHolder">
        <?php foreach ($orders as $order) {
            echo $this->render('_order', [
                'order' => $order,
            ]);
        } ?>
    </div>

</div>
