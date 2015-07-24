<?php

namespace backend\controllers;

use common\models\Menu;
use common\models\Category;

class MenuController extends \yii\web\Controller
{
    public function actionIndex()
    {
        // $countries = new Menu(['name' => 'Countries']);
        // $countries->makeRoot();
        // $russia = new Menu(['name' => 'Russia']);
        // $russia->prependTo($countries);

        $menuRoots = Menu::find()->roots()->all();

        $categories = Category::find()->all();

        return $this->render('index', [
            'menuRoots' => $menuRoots,
        ]);
    }

}
