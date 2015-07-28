<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app/user', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app/user', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute' => 'username',
                'label' => Yii::t('app/user', 'Username'),
            ],
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            [
                'attribute' => 'role',
                'label' => Yii::t('app/user', 'Role'),
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'role',
                    ArrayHelper::merge(['' => '-'], ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')),
                    ['class' => 'form-control']
                ),
                'value' => function ($data) {
                    $arr = [];
                    $roles = Yii::$app->authManager->getRolesByUser($data->id);
                    foreach ($roles as $role) {
                        $arr[] = $role->name;
                    }
                    return implode(', ', $arr);
                },
            ],
            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'options' => [
                    'width' => 70,
                ],
            ],
        ],
    ]); ?>

</div>
