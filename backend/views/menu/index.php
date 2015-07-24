<?php
/* @var $this yii\web\View */

use common\models\Menu;
?>
<h1>Menu Builder</h1>

<p>
    <div class="list-group" id="menuBuilder">
        <?php foreach ($menuRoots as $e) { ?>
            <?php $leaves = $e->leaves()->all(); ?>
            <div class="panel panel-info">
                <div class="panel-heading root-item"><?= $e->name ?> <?= count($leaves) ?></div>
                <ul class="list-group hidden">
                    <?php foreach ($leaves as $sub) { ?>
                        <li class="list-group-item"><?= $sub->name ?></li>
                    <?php } ?>
                </ul>
                <div class="panel-footer">add</div>
            </div>
        <?php } ?>
    </div>
</p>
