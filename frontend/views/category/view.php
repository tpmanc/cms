<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $category tpmanc\cmscore\models\Category */
/* @var $parents tpmanc\cmscore\models\Category */

$this->title = $category->title;

foreach ($parents as $parent) {
    if ($parent->depth !== 0) {
        $this->params['breadcrumbs'][] = ['label' => $parent->info['title'], 'url' => ['/main-category/view', 'chpu' => $parent->info['chpu']]];
    }
}
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $category->title ?></h1>

<?php if (!empty($tags)) { ?>
    <div class="row">
        <h2>Sub-categories</h2>

        <?php foreach ($tags as $tag) { ?>
            <div class="col-lg-2">
                <?= Html::a($tag['title'], ['/category/view', 'chpu' => $tag['chpu']]) ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<hr>

<div class="row">
    <h2>Products</h2>

    <?php foreach ($products as $product) { ?>
        <?= $this->render('/product/listing-view', [
            'product' => $product,
        ]) ?>
    <?php } ?>
</div>
