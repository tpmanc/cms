<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@vendor', realpath(dirname(__FILE__) . '/vendor'));
Yii::setAlias('@frontend', realpath(dirname(__FILE__) . '/../../frontend'));
Yii::setAlias('@upload', realpath(dirname(__FILE__) . '/../../frontend/web/upload'));
Yii::setAlias('@webupload', '/frontend/web/upload');
Yii::setAlias('@images', '/frontend/web/images');
