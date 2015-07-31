<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $user = $auth->createRole('user');
        $manager = $auth->createRole('manager');
        $moderator = $auth->createRole('moderator');
        $admin = $auth->createRole('admin');

        $auth->add($user);
        $auth->add($manager);
        $auth->add($moderator);
        $auth->add($admin);

        $auth->addChild($manager, $user);
        $auth->addChild($moderator, $manager);
        $auth->addChild($admin, $moderator);

        echo 'ok';
    }
}