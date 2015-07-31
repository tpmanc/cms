<?php

namespace backend\controllers;

use Yii;
use common\models\Order;
use common\models\OrderSearch;
use common\models\OrderProducts;
use common\models\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex($status = 'new')
    {
        if ($status === 'accepted') {
            $orders = Order::find()->where(['status' => Order::STATUS_ACCEPTED])->all();
        } elseif ($status === 'canceled') {
            $orders = Order::find()->where(['status' => Order::STATUS_CANCELED])->all();
        } else {
            $orders = Order::find()->where(['status' => Order::STATUS_NEW])->all();
        }

        return $this->render('index', [
            'orders' => $orders,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();
        $productDropDown = $this->getProductsDropDown();

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $error = false;
            $model->load($post);
            $products = [];
            $transaction = Order::getDb()->beginTransaction();
            if ($model->save()) {
                $productCount = count($post['products']);
                for ($i = 0; $i < $productCount; $i++) {
                    $id = $post['products'][$i];
                    if (isset($products[$id])) {
                        $products[$id] += $post['amounts'][$i];
                    } else {
                        $products[$id] = $post['amounts'][$i];
                    }
                }
                foreach ($products as $id => $amount) {
                    $orderProducts = new OrderProducts();
                    $orderProducts->orderId = $model->id;
                    $orderProducts->productId = $id;
                    $orderProducts->amount = $amount;
                    if (!$orderProducts->save()) {
                        $error = true;
                    }
                }
            } else {
                $error = true;
            }
            if (!$error) {
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $transaction->rollBack();
            }
        }
        return $this->render('create', [
            'model' => $model,
            'productDropDown' => $productDropDown,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $productDropDown = $this->getProductsDropDown();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'productDropDown' => $productDropDown,
            ]);
        }
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGetProductLine()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $productDropDown = $this->getProductsDropDown();
            return $this->renderAjax('_product-line', [
                'productDropDown' => $productDropDown,
            ]);
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function getProductsDropDown()
    {
        return ArrayHelper::map(Product::find()->where(['isDisabled' => 0])->asArray()->all(), 'id', 'title');
    }
}
