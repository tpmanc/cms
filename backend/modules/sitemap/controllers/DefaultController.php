<?php

namespace backend\modules\sitemap\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $arr = [];
        foreach ($this->module->models as $m) {
            $models = $m::find()->all();
            foreach ($models as $item) {
                // $arr[] = 
            }
        }
        return $this->render('index');
    }
}
