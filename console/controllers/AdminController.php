<?php
namespace console\controllers;

use Yii;
use common\models\User;
use yii\console\Controller;

class AdminController extends Controller
{
    public function actionInit($userId = false, $role = false)
    {
        if ($userId === false || $role === false) {
            echo 'need more arguments';
            return 1;
        }

        $user = User::findIdentity($userId);
        if ($user === null) {
            echo 'user not found';
            return 1;
        }

        $auth = Yii::$app->authManager;
        $r = $auth->getRole($role);
        if ($r === null) {
            echo 'role not found';
            return 1;
        }

        $auth->revokeAll($user->id);
        $auth->assign($r, $user->id);
        echo 'ok';
        return 0;
    }
}