<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductRestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app/productRests', 'Product Rests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-rests-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app/productRests', 'Create Product Rests'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'options' => [
                    'width' => 70,
                ],
            ],
            [
                'attribute' => 'productId',
                'value' => function ($data) {
                    return $data->product->title;
                },
            ],
            'amount',

            [
                'class' => 'yii\grid\ActionColumn',
                'options' => [
                    'width' => 70,
                ],
            ],
        ],
    ]); ?>

</div>
