<?php

namespace backend\controllers;

use Yii;
use common\models\Menu;
use common\models\Category;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class MenuController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $menu = Menu::find()->orderBy(['tree' => SORT_ASC, 'lft' => SORT_ASC])->all();
        $categories = Category::find()->all();

        return $this->render('index', [
            'menu' => $menu,
            'categories' => $categories,
        ]);
    }

    public function actionAddElement()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            if (empty(Yii::$app->request->post())) {
                return [
                    'error' => true,
                    'msg' => 'bad request',
                ];
            }
            $post = Yii::$app->request->post();
            $parentId = $post['parentId'];
            $name = $post['name'];
            $link = $post['link'];
            $isCategory = $post['isCategory'];
            $categoryId = $post['categoryId'];
            if ($isCategory == 1) {
                $fields = [
                    'name' => $name,
                    'link' => '',
                    'isCategory' => 1,
                    'categoryId' => $categoryId,
                ];
            } else {
                $fields = [
                    'name' => $name,
                    'link' => $link,
                    'isCategory' => 0,
                    'categoryId' => 0,
                ];
            }
            if ($parentId == 0) {
                $elem = new Menu($fields);
                $elem->makeRoot();
                $html = $this->renderPartial('root-element', [
                    'root' => $elem,
                    'leaves' => [],
                ]);
            } else {
                $parent = Menu::findOne(['id' => $parentId]);
                $elem = new Menu($fields);
                $elem->appendTo($parent);
            }

            return [
                'name' => $name,
                'link' => $link,
                'isCategory' => $isCategory,
                'categoryId' => $categoryId,
            ];
        } else {
            throw new NotFoundHttpException('Not Found');
        }
    }

    public function actionGetAllElements()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->isAjax) {
            $menu = Menu::find()->orderBy(['tree' => SORT_ASC, 'lft' => SORT_ASC])->all();
            $menuItems = '<option value="0">' . Yii::t('app/menu','Root Element') . '</option>';
            foreach ($menu as $elem) {
                $menuItems .= "<option value='{$elem->id}'>" . str_repeat('/..', $elem->depth) . "{$elem->name}</option>";
            }
            return [
                'menuItems' => $menuItems,
            ];
        } else {
            throw new NotFoundHttpException('Not Found');
        }
    }
}
