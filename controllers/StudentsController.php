<?php

namespace app\controllers;

use app\models\Students;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;

class StudentsController extends \yii\web\Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'delete', 'index'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $model = new Students();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {

                $model->save();

                //Sends message
                Yii::$app->getSession()->setFlash('success', 'Student Added');

                return $this->redirect('/index.php?r=students/index');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelete($idstudent)
    {
        if(!is_null($idstudent)) {
            $student = Students::findOne($idstudent);
            $student->delete();

            Yii::$app->getSession()->setFlash('success', 'Student Deleted');

            return $this->redirect('/index.php?r=students/index');
        }
    }

    public function actionIndex()
    {
        // Gets all records from table courses
        $query = Students::find();

        // Creates the pagination for course records
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count()
        ]);

        // Fetches the real records from db
        $students = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'pagination' => $pagination,
            'students' => $students
        ]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
