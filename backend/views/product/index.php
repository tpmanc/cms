<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app/product', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app/product', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'options' => [
                    'width' => 10,
                ],
            ],
            'title',
            // 'description:ntext',
            // 'shortDescription:ntext',
            // 'netCost',
             'price',
            // 'discount',
             'nomenclature',
            // 'length',
            // 'width',
            // 'height',
            // 'weight',
            // 'seoTitle',
            // 'seoDescription',
            // 'seoKeywords',
             'chpu',
            [
                'attribute' => 'fakeInStock',
                'format' => 'boolean',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'fakeInStock',
                    ['' => '', 0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')],
                    ['class' => 'form-control']
                ),
            ],
            [
                'attribute' => 'isDisabled',
                'format' => 'boolean',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'isDisabled',
                    ['' => '', 0 => Yii::t('app', 'No'), 1 => Yii::t('app', 'Yes')],
                    ['class' => 'form-control']
                ),
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'options' => [
                    'width' => 70,
                ],
            ],
        ],
    ]); ?>

</div>
