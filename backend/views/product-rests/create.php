<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductRests */

$this->title = Yii::t('app/productRests', 'Create Product Rests');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/productRests', 'Product Rests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-rests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
