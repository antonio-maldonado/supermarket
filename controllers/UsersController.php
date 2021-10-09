<?php

namespace app\controllers;
use app\models\Users;


class UsersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $users_total = Users::find()->all();
        return $this->render('index',['users'=>$users_total]);
    }

}
