<?php

namespace frontend\controllers;

use tpmanc\cmscore\models\StaticPage;
use yii\web\NotFoundHttpException;

class StaticPageController extends \yii\web\Controller
{
    public function actionView($chpu)
    {
        $page = $this->findModel($chpu);

        return $this->render('view', [
            'page' => $page,
        ]);
    }

    /**
     * Finds the StaticPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $chpu
     * @return StaticPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($chpu)
    {
        if (($model = StaticPage::find()->where(['chpu' => $chpu])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
