<?php

namespace frontend\controllers;

use common\models\StaticPage;
use yii\web\NotFoundHttpException;

class StaticPageController extends \yii\web\Controller
{
    public function actionView($chpu)
    {
        $page = StaticPage::find()->where(['chpu' => $chpu])->one();
        if ($page === null) {
            throw new NotFoundHttpException();
        }
        return $this->render('view', [
            'page' => $page,
        ]);
    }

}
