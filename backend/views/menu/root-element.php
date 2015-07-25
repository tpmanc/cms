<?php
/**
 * @var $root
 * @var $leaves
 */
?>

<div class="panel panel-info">
    <div class="panel-heading root-item">
        <?= $root->name ?>
        <span class="badge"><?= count($leaves) ?></span>
    </div>

    <ul class="list-group hidden">
        <?php
            echo $this->render('node-element', [
                'leaves' => $leaves,
            ]);
        ?>
    </ul>

    <div class="panel-footer">add</div>
</div>