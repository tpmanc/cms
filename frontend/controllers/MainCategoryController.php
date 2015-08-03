<?php

namespace frontend\controllers;

use tpmanc\cmscore\models\Menu;
use tpmanc\cmscore\models\Category;

class MainCategoryController extends \yii\web\Controller
{
    public function actionView($chpu)
    {
        $mainCategory = $this->findModel($chpu);
        $categories = [];
        $children = $mainCategory->children(1)->all();
        foreach ($children as $child) {
            if ($child->categoryId === 0) {
                $categories[] = [
                    'title' => $child->name,
                    'chpu' => $child->link,
                ];
            } else {
                $category = Category::find()->where(['id' => $child->categoryId])->one();
                $categories[] = [
                    'title' => $category->title,
                    'chpu' => $category->chpu,
                ];
            }
        }

        return $this->render('view', [
            'mainCategory' => $mainCategory,
            'categories' => $categories,
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
        if (($model = Menu::find()->where(['link' => $chpu])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
