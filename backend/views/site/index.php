<?php
/* @var $this yii\web\View */

$this->title = 'CMS';
?>

<div class="flexbox" id="tile-sort">
    <?php if (!empty($dashboardInfo)) { ?>
        <?php foreach ($dashboardInfo as $elem) { ?>
            <?php if ($elem['type'] === 'separator') { ?>
                <div class="group-separator">
                    <div class="title"><?= $elem['title']?></div>
                </div>
            <?php } elseif($elem['type'] === 'tile') { ?>
                <a href="<?= $elem['url']?>" class="tile <?= $elem['size']?> <?= $elem['color']?>">
                    <div class="tile-content">
                        <?php if ($elem['img'] !== '') { ?>
                            <img src="<?= $elem['img']?>" alt="">
                        <?php } ?>
                    </div>
                    <div class="title"><?= $elem['title']?></div>
                </a>
            <?php } ?>
        <?php } ?>
    <?php } ?>

    <div class="tile-settings" id="tileSettings">
        <div class="title">Элементы</div>

        <div class="settings-holder">
            <div class="scroll-area">
                <div class="elements">
                    <div class="elem">
                        <a class="btn btn-info" href="#" id="addSeparator" role="button">Разделитель</a>
                    </div>
                    
                    <div class="elem">
                        <a class="btn btn-info" href="#" id="addLink" role="button">Ссылка</a>
                    </div>
                </div>

                <div class="tile-properties links">
                    <label>
                        <input type="radio" name="tileSize" value="small" checked>
                        Маленькая
                    </label>
                    <label>
                        <input type="radio" name="tileSize" value="medium">
                        Средняя
                    </label>
                    <label>
                        <input type="radio" name="tileSize" value="big">
                        Большая
                    </label>

                    <div class="sub-title">Название</div>
                    <input type="text" value="" id="tileTitle" />

                    <div class="sub-title">Ссылка</div>
                    <input type="text" value="" id="tileLink" />

                    <div class="sub-title">Изображение</div>
                    <input type="text" value="" id="tileImage" />

                    <div class="colors" id="colorsList">
                        <div class="color blue"></div>
                        <div class="color lightblue"></div>
                        <div class="color aqua"></div>
                        <div class="color green"></div>
                        <div class="color lightgreen"></div>
                        <div class="color yellow"></div>
                        <div class="color darkyellow"></div>
                        <div class="color orange"></div>
                        <div class="color brown"></div>
                        <div class="color darkorange"></div>
                        <div class="color red"></div>
                        <div class="color pink"></div>
                        <div class="color purple"></div>
                        <div class="color ligthpurple"></div>
                    </div>
                </div>

                <div class="tile-properties groups">
                    <div class="sub-title">Название</div>
                    <input type="text" value="" id="groupTitle" />
                </div>
            </div>
        </div>

        <?php /*<div class="tile-save">
            <a class="btn btn-danger disabled" href="#" id="tileCancel" role="button">Отмена</a>
            <a class="btn btn-success disabled" href="#" id="tileSave" role="button">Сохранить</a>
        </div>*/?>
    </div>
</div>