<?php

/**
 * @var $menu
 */

$level = 0;
$fixed = false;
echo '<ul class="list-group">';
foreach($menu as $n=>$category) {
    if ($fixed) {
        if ($category->depth == $level) {
            echo '</li>';
        } elseif ($category->depth > $level) {
        } else {
            echo '</li>';
            for ($i = $level - $category->depth; $i; $i--) {
                echo '</li>';
            }
        }
    } else {
        $fixed = true;
    }

    if ($category->depth == 0) {
        echo '<li class="list-group-item list-group-item-info root" data-id="'.$category->id.'" data-tree="'.$category->tree.'" data-depth="'.$category->depth.'" style="padding-left: '.(($category->depth+1) * 20).'px;">
        <i class="material-icons expand">arrow_drop_down</i>
        <i class="material-icons settings">settings</i>';
    } else {
        echo '<li class="list-group-item node hidden" data-id="'.$category->id.'" data-tree="'.$category->tree.'" data-depth="'.$category->depth.'" style="padding-left: '.(($category->depth+1) * 20).'px;"><i class="material-icons settings">settings</i>';
    }

    echo $category->name;
    $level=$category->depth;
}

for($i = $level; $i; $i--) {
    echo '</li>';
}
echo '</li>';
echo '</ul>';