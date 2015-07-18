<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav>
    <div class="user">
        <i class="material-icons">account_circle</i> <?= Yii::$app->user->identity->username?> (выйти)
    </div>
    <ul>
        <li><a href="#"><i class="material-icons">insert_drive_file</i> Страницы</a></li>
        <li><a href="#"><i class="material-icons">format_align_center</i> Статьи</a></li>
        <li><a href="#"><i class="material-icons">list</i> Категории</a></li>
        <li><a href="#"><i class="material-icons">local_grocery_store</i> Товары</a></li>
        <li><a href="#"><i class="material-icons">settings_ethernet</i> UML / XML</a></li>
        <li><a href="#"><i class="material-icons">textsms</i> Отзывы</a></li>
        <li><a href="#"><i class="material-icons">group</i> Пользователи</a></li>
    </ul>
</nav>

<div class="wrapper">

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= $content ?>

    <footer>
        <?= Yii::powered() ?>
    </footer>
</div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
