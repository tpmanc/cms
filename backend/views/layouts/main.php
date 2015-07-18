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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Панель администратора</span>
                <div class="mdl-layout-spacer"></div>
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href=""><i class="material-icons">description</i> Страницы</a>
                    <a class="mdl-navigation__link" href=""><i class="material-icons">format_size</i> Статьи</a>

                    <button id="profile-btn" class="mdl-button mdl-js-button mdl-button--icon">
                        <i class="material-icons">person</i>
                    </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="profile-btn">
                        <li disabled class="mdl-menu__item">admin</li>
                        <li class="mdl-menu__item">Профиль</li>
                        <li class="mdl-menu__item">Выйти</li>
                    </ul>

                </nav>
            </div>
        </header>
        <main class="mdl-layout__content">
            <div class="page-content">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>

                <?= $content ?>

                <footer class="mdl-mini-footer">
                    <div class="mdl-mini-footer--left-section">
                        <div class="mdl-logo">Панель администратора</div>
                        <ul class="mdl-mini-footer--link-list">
                            <li><?= Yii::powered() ?></li>
                        </ul>
                    </div>
                </footer>

            </div>
        </main>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
