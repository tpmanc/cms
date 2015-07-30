<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app/order', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app/order', 'Create Order'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'options' => [
                    'width' => 70,
                ],
            ],
            // 'orderProductsId',
            'name',
            'adress',
            'phone',
            // 'email:email',
            // 'extraInformation',
            // 'deliveryType',
            // 'paymentType',
            // 'date',
            // 'discount',
            'totalPrice',

            [
                'class' => 'yii\grid\ActionColumn',
                'options' => [
                    'width' => 70,
                ],
            ],
        ],
    ]); ?>

</div>
