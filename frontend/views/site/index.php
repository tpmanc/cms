<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $categories tpmanc\cmscore\models\Category[] */

$this->title = 'Yii 2 CMS';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Yii 2 CMS!</h1>
    </div>

    <div class="body-content">
        <div class="row">
            <?php foreach ($categories as $category) { ?>
                <div class="col-lg-2">
                    <h2><?= $category->name ?></h2>
                    <p><a class="btn btn-default" href="<?= Url::to(['/main-category/view', 'chpu' => $category->link]) ?>">Перейти</a></p>
                </div>
            <?php } ?>
        </div>

    </div>
</div>
