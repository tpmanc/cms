<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use frontend\widgets\Alert;

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

<?php if (!Yii::$app->user->isGuest) { ?>
    <nav>
        <div class="user">
            <i class="material-icons">account_circle</i> <?= Yii::$app->user->identity->username?> (logout)
        </div>
        <ul>
            <li>
                <a href="<?= Url::to(['/core/static-page/index'])?>">
                    <i class="material-icons">insert_drive_file</i> <?= Yii::t('backend/leftMenu', 'Static Pages') ?>
                </a>
            </li>
            <!-- <li><a href="#"><i class="material-icons">format_align_center</i> Статьи</a></li> -->
            <li><a href="<?= Url::to(['/core/category/index'])?>"><i class="material-icons">list</i> <?= Yii::t('backend/leftMenu', 'Categories') ?></a></li>
            <li><a href="<?= Url::to(['/core/product/index'])?>"><i class="material-icons">vibration</i> <?= Yii::t('backend/leftMenu', 'Products') ?></a></li>
            <li><a href="<?= Url::to(['/core/product-rests/index'])?>"><i class="material-icons">store</i> <?= Yii::t('backend/leftMenu', 'Products Rests') ?></a></li>
            <!-- <li><a href="#"><i class="material-icons">settings_ethernet</i> UML / XML</a></li> -->
            <!-- <li><a href="#"><i class="material-icons">textsms</i> Отзывы</a></li> -->
            <li><a href="<?= Url::to(['/core/order/index'])?>"><i class="material-icons">local_grocery_store</i> <?= Yii::t('backend/leftMenu', 'Orders') ?></a></li>
            <li><a href="<?= Url::to(['/core/menu/index'])?>"><i class="material-icons">apps</i> <?= Yii::t('backend/leftMenu', 'Menu Builder') ?></a></li>
            <li><a href="<?= Url::to(['/core/delivery-type/index'])?>"><i class="material-icons">local_shipping</i> <?= Yii::t('backend/leftMenu', 'Delivery Types') ?></a></li>
            <li><a href="<?= Url::to(['/core/payment-type/index'])?>"><i class="material-icons">account_balance_wallet</i> <?= Yii::t('backend/leftMenu', 'Payment Types') ?></a></li>
            <li><a href="<?= Url::to(['/core/supplier/index'])?>"><i class="material-icons">inbox</i> <?= Yii::t('backend/leftMenu', 'Suppliers') ?></a></li>
            <li><a href="<?= Url::to(['/core/user/index'])?>"><i class="material-icons">group</i> <?= Yii::t('backend/leftMenu', 'Users') ?></a></li>
        </ul>
    </nav>
<?php } ?>

<div class="wrapper">

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <?= Alert::widget() ?>

    <?= $content ?>

    <footer>
        <?= Yii::powered() ?>
    </footer>
</div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
