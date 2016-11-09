<?php

namespace app\controllers;

use app\models\User;
use Yii;

class UsersController extends \yii\web\Controller
{
    public function actionRegister()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {

                $model->save();

                //Sends message
                Yii::$app->getSession()->setFlash('success', 'User Added');

                return $this->redirect('/index.php?r=site/index');
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

}
