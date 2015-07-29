<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app/user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

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
            'id',
            [
                'attribute' => 'username',
                'label' => Yii::t('app/user', 'Username'),
            ],
            [
                'label' => Yii::t('app/user', 'Role'),
                'format' => 'raw',
                'value' => implode(', ', $model->getRolesArray()),
            ],
            [
                'attribute' => 'email',
                'format' => 'email',
                'label' => Yii::t('app/user', 'Email'),
            ],
            [
                'attribute' => 'created_at',
                'format' => 'date',
                'label' => Yii::t('app/user', 'Created At'),
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'date',
                'label' => Yii::t('app/user', 'Updated At'),
            ],
            'auth_key',
            'password_hash',
            // 'password_reset_token',
            // 'status',
        ],
    ]) ?>

</div>
