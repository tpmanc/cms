<?php

namespace frontend\controllers;

use tpmanc\cmscore\models\Category;
use tpmanc\cmscore\models\Menu;

class CategoryController extends \yii\web\Controller
{
    public function actionView($chpu)
    {
        $currentCategory = $this->findModel($chpu);
        $menuItem = Menu::find()->where(['categoryId' => $currentCategory->id])->one();
        $parents = $menuItem->parents()->all();
        $children = $menuItem->children(1)->all();
        $tags = [];
        foreach ($children as $child) {
            if ($child->categoryId === 0) {
                $tags[] = [
                    'title' => $child->name,
                    'chpu' => $child->link,
                ];
            } else {
                $category = Category::find()->where(['id' => $child->categoryId])->one();
                $tags[] = [
                    'title' => $category->title,
                    'chpu' => $category->chpu,
                ];
            }
        }

        $products = $currentCategory->products;

        return $this->render('view', [
            'category' => $currentCategory,
            'parents' => $parents,
            'tags' => $tags,
            'products' => $products,
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
