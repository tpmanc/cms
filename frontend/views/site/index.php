<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $categories tpmanc\cmscore\models\Category[] */

$this->title = 'Abrikos CMS';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Abrikos CMS!</h1>
    </div>

    <div class="body-content">
        <h2>Sections</h2>
        <div class="row">
            <?php foreach ($categories as $category) { ?>
                <div class="col-lg-2">
                    <p><?= Html::a($category->name, ['/main-category/view', 'chpu' => $category->link]) ?></p>
                </div>
            <?php } ?>
        </div>

    </div>
</div>
