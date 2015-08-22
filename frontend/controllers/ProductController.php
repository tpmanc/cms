<?php

namespace frontend\controllers;

use tpmanc\cmscore\models\Product;

class ProductController extends \yii\web\Controller
{
    public function actionView($chpu)
    {
        $product = $this->findModel($chpu);
        $images = $product->getImages(false, 'small');
        $category = $product->mainCategoryModel->info;

        return $this->render('view', [
            'product' => $product,
            'images' => $images,
            'category' => $category,
        ]);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $chpu
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($chpu)
    {
        if (($model = Product::find()->where(['chpu' => $chpu, 'isDisabled' => Product::IS_ENABLED])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
