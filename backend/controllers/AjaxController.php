<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use backend\models\UserDashboard;

class AjaxController extends \yii\web\Controller
{
    public function actionSaveDashboard()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            if (empty(Yii::$app->request->post())) {
                return [
                    'error' => true,
                    'msg' => 'bad request',
                ];
            }
            $post = Yii::$app->request->post();

            $info = serialize(json_decode($post['info'], true));
            $userId = Yii::$app->user->identity->id;
            $ud = UserDashboard::find()->where(['userId' => $userId])->one();
            if ($ud === null) {
                $ud = new UserDashboard();
                $ud->userId = $userId;
                $ud->items = $info;
            } else {
                $ud->items = $info;
            }
            
            if ($ud->save()) {
                return ['error' => false];
            } else {
                return ['error' => true];
            }
        } else {
            throw new NotFoundHttpException();
        }
    }
}
