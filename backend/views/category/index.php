<?php

use Yii\t;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
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
    
    <ul>
        <?php
            foreach ($categories as $c) {
                echo $c['title'];

                $item = $c;
                $prevItem = null;
                while ($item->sub !== null) {
                    echo $item->sub->title;
                    $item = $item->sub;
                }
            }
        ?>
    </ul>

</div>
