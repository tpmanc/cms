<?php

/**
 * @var $menu
 */

//$level = 0;
//$fixed = false;
//echo '<ul class="list-group">';
//foreach($menu as $n=>$category) {
//    if ($fixed) {
//        if ($category->depth == $level) {
//            echo '</li>';
//        } elseif ($category->depth > $level) {
//        } else {
//            echo '</li>';
//            for ($i = $level - $category->depth; $i; $i--) {
//                echo '</li>';
//            }
//        }
//    } else {
//        $fixed = true;
//    }
//
//    if ($category->depth == 0) {
//        echo '<li class="list-group-item list-group-item-info root" data-id="'.$category->id.'" data-tree="'.$category->tree.'" data-depth="'.$category->depth.'" style="padding-left: '.(($category->depth+1) * 20).'px;">
//        <i class="material-icons expand">arrow_drop_down</i>
//        <i class="material-icons sorting">cached</i>
//        <i class="material-icons settings">settings</i>';
//    } else {
//        echo '<li class="list-group-item node hidden" data-id="'.$category->id.'" data-tree="'.$category->tree.'" data-depth="'.$category->depth.'" style="padding-left: '.(($category->depth+1) * 20).'px;">
//        <i class="material-icons sorting">cached</i>
//        <i class="material-icons settings">settings</i>';
//    }
//
//    echo $category->name;
//    $level=$category->depth;
//}
//
//for($i = $level; $i; $i--) {
//    echo '</li>';
//}
//echo '</li>';
//echo '</ul>';



$level = 0;
$fixed = false;
echo '<ul>';
foreach($menu as $n=>$category) {
    if ($fixed) {
        if ($category->depth == $level) {
            echo '</li>';
        } elseif ($category->depth > $level) {
            echo '<ul class="node hidden">';
        } else {
            echo '</li>';
            for ($i = $level - $category->depth; $i; $i--) {
                echo '</ul>';
                echo '</li>';
            }
        }
    } else {
        $fixed = true;
    }

    if ($category->depth == 0) {
        echo '<li class="info root" data-id="' . $category->id . '">
                <i class="material-icons expand">arrow_drop_down</i>
                <i class="material-icons root-sorting">import_export</i>
                <i class="material-icons settings" data-id="'.$category->id.'">settings</i>';
    } else {
        echo '<li class="" data-id="'.$category->id.'" data-tree="'.$category->tree.'">' . str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', ($category->depth + 1)) . '
                <i class="material-icons settings" data-id="'.$category->id.'">settings</i>';
    }

    echo $category->name;
    $level=$category->depth;
}

for($i = $level; $i; $i--) {
    echo '</li>';
    echo '</ul>';
}
echo '</li>';
echo '</ul>';