<?php

namespace frontend\controllers;

use tpmanc\cmscore\models\Category;
use tpmanc\cmscore\models\Menu;

class CategoryController extends \yii\web\Controller
{
    public function actionView($chpu)
    {
        $category = $this->findModel($chpu);
        $menuItem = Menu::find()->where(['categoryId' => $category->id])->one();
        $parents = $menuItem->parents()->all();

        return $this->render('view', [
            'category' => $category,
            'parents' => $parents,
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
