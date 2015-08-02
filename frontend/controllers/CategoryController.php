<?php

namespace frontend\controllers;

use tpmanc\cmscore\models\Category;

class CategoryController extends \yii\web\Controller
{
    public function actionView($chpu)
    {
        $category = $this->findModel($chpu);

        return $this->render('view', [
            'category' => $category,
        ]);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $chpu
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($chpu)
    {
        if (($model = Category::find()->where(['chpu' => $chpu, 'isDisabled' => Category::IS_ENABLED])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
