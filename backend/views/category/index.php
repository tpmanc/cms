<?php

use Yii\t;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app/category', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app/category', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'text:raw',
            'seoTitle',
            // 'seoDescription',
            'chpu',
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
