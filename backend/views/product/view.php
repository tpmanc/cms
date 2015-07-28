<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/product', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'mainCategory',
                'format' => 'raw',
                'value' => Html::a($model->mainCategoryModel->info->title, [
                        'category/view', 'id' => $model->mainCategoryModel->info->id
                    ], ['target' => '_blank']),
            ],
            [
                'attribute'=>'additionalCategories',
                'format' => 'raw',
                'value' => $model->additionalCategoriesString,
            ],
            'title',
            'description:raw',
            'shortDescription:raw',
            'netCost',
            'price',
            'discount',
            'nomenclature',
            'length',
            'width',
            'height',
            'weight',
            'seoTitle',
            'seoDescription',
            'seoKeywords',
            'chpu',
            'fakeInStock:boolean',
            'isDisabled:boolean',
        ],
    ]) ?>

</div>
