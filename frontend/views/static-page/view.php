<?php
/* @var $this yii\web\View */

$this->title = $page->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $page->title?></h1>

<?= $page->text?>