<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-form">

    <?= Html::beginForm() ?>

    <div class="form-group field-user-username <?= isset($errors['username'][0]) ? 'has-error' : '' ?>">
        <label class="control-label" for="user-username"><?= Yii::t('app/user', 'Username') ?></label>
        <input type="text" id="user-username" class="form-control" name="User[username]" value="<?= $model->username ?>">

        <div class="help-block"><?= $errors['username'][0] ?></div>
    </div>

    <div class="form-group field-user-email <?= isset($errors['email'][0]) ? 'has-error' : '' ?>">
        <label class="control-label" for="user-email"><?= Yii::t('app/user', 'Email') ?></label>
        <input type="email" id="user-email" class="form-control" name="User[email]" value="<?= $model->email ?>">

        <div class="help-block"><?= $errors['email'][0] ?></div>
    </div>

    <div class="form-group field-user-password <?= isset($errors['password'][0]) ? 'has-error' : '' ?>">
        <label class="control-label" for="user-password"><?= Yii::t('app/user', 'New Password') ?></label>
        <input type="password" id="user-password" class="form-control" name="User[password]" value="<?= $model->password ?>">

        <div class="help-block"><?= $errors['password'][0] ?></div>
    </div>

    <div class="form-group field-user-role <?= isset($errors['role'][0]) ? 'has-error' : '' ?>">
        <label class="control-label" for="user-role"><?= Yii::t('app/user', 'Role') ?></label>
        <?= Html::dropDownList('User[role]', $userRole, $roles, ['class' => 'form-control', 'id' => 'user-role']) ?>

        <div class="help-block"><?= $errors['role'][0] ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?= Html::endForm() ?>

</div>
