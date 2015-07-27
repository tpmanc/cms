<?php

/* @var $this yii\web\View */
/* @var $menuRoots common\models\Menu */
/* @var $menu common\models\Menu */
/* @var $categories common\models\Category */

$this->title = Yii::t('app/menu', 'Menu Builder');
$this->params['breadcrumbs'][] = $this->title;

//$level = 0;
//$fixed = false;
//echo '<ul>';
//foreach($menu as $n=>$category) {
//    if ($fixed) {
//        if ($category->depth == $level) {
//            echo '</li>';
//        } elseif ($category->depth > $level) {
//            echo '<ul>';
//        } else {
//            echo '</li>';
//            for ($i = $level - $category->depth; $i; $i--) {
//                echo '</ul>';
//                echo '</li>';
//            }
//        }
//    } else {
//        $fixed = true;
//    }
//
//    echo '<li>';
//    echo $category->name;
//    $level=$category->depth;
//}
//
//for($i = $level; $i; $i--) {
//    echo '</li>';
//    echo '</ul>';
//}
//echo '</li>';
//echo '</ul>';die();
// TODO: изменение параметров элемента и изменение сортировки в пределах одного depth
?>
<h1><?= Yii::t('app/menu', 'Menu Builder') ?></h1>

<p>
    <button type="button" class="btn btn-success" id="addElement"><?= Yii::t('app/menu', 'Add Element') ?></button>
</p>

<p>
    <div class="list-group" id="menuBuilder">
        <?php
//        $level = 0;
//        $fixed = false;
//        echo '<ul>';
//        foreach($menu as $n=>$category)
//        {
//            if ($fixed) {
//                if ($category->depth == $level) {
//                    if ($category->depth == 0) {
//                        echo '</div>';
//                    } else {
//                        echo '</li>';
//                    }
//                } elseif ($category->depth > $level) {
//                    echo '<ul class="list-group hidden">';
//                } else {
//                    echo '</li>';
//
//                    for ($i = $level - $category->depth; $i; $i--) {
//                        echo '</ul>';
//                        if ($category->depth == 1) {
//                            echo '</div>';
//                        } else {
//                            echo '</li>';
//                        }
//                    }
//                }
//            } else {
//                $fixed = true;
//            }
//
//            if ($category->depth == 0) {
//                echo '<div class="panel panel-info">
//                <div class="panel-heading root-item">
//                    '.$category->name.'
//                    <span class="badge">0</span>
//                </div>';
//            } else {
//                echo '<li class="list-group-item node-item">';
////                echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $category->depth);
//                echo $category->name;
//            }
//            $level=$category->depth;
//        }
//
//        for($i=$level;$i;$i--)
//        {
//            echo '</li>';
//            echo '</ul>';
//        }
//        echo '</div>';
//        echo '</ul>';

//            $level = 0;
//            $fixed = false;
//            echo '<ul>';
//            foreach($menu as $n=>$category) {
//                if ($fixed) {
//                    if ($category->depth == $level) {
//                        echo '</li>';
//                    } elseif ($category->depth > $level) {
//                        echo '<ul>';
//                    } else {
//                        echo '</li>';
//                        for ($i = $level - $category->depth; $i; $i--) {
//                            echo '</ul>';
//                            echo '</li>';
//                        }
//                    }
//                } else {
//                    $fixed = true;
//                }
//
//                echo '<li>';
//                echo $category->name;
//                $level=$category->depth;
//            }
//
//            for($i = $level; $i; $i--) {
//                echo '</li>';
//                echo '</ul>';
//            }
//            echo '</li>';
//            echo '</ul>';

            echo $this->render('menu-list-view', [
                'menu' => $menu,
            ]);
        ?>
    </div>
</p>

<div style="display: none;">
    <div class="box-modal" id="elementModal">
        <i class="box-modal_close arcticmodal-close material-icons">clear</i>

        <div class="form-group">
            <select class="form-control" id="allMenuNodes">
                <option value="0"><?= Yii::t('app/menu','Root Element') ?></option>
            </select>

            <div class="radio">
                <label>
                    <input type="radio" name="isCategory" value="1" checked>
                    Категория
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="isCategory" value="0">
                    Ссылка
                </label>
            </div>

            <div class="input-group" style="display: none;">
                <span class="input-group-addon"><?= Yii::t('app/menu', 'Link') ?></span>
                <input type="text" class="form-control" id="elementLink">
            </div>

            <select class="form-control" id="allCategories">
                <option value="0" disabled selected><?= Yii::t('app/menu', 'Select category') ?></option>
                <?php foreach ($categories as $c) { ?>
                    <option data-title="<?= $c->title ?>" value="<?= $c->id ?>"><?= $c->title ?></option>
                <?php } ?>
            </select>

            <br />

            <div class="input-group">
                <span class="input-group-addon"><?= Yii::t('app/menu', 'Item Title') ?></span>
                <input type="text" class="form-control" id="elementTitle">
            </div>

            <br />

            <div id="nodeSorting" style="display: none;">
                <div class="element">Title</div>
                <div class="element">Title</div>
            </div>

            <br />

            <input type="hidden" id="elementId" value="0" />
            <button type="button" class="btn btn-success" id="saveElement"><?= Yii::t('app', 'Save') ?></button>
        </div>
    </div>
</div>
