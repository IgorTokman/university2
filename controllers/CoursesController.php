<?php

namespace app\controllers;

use app\models\Courses;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;

class CoursesController extends \yii\web\Controller
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
        $model = new Courses();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {

                $model->save();

                //Sends message
                Yii::$app->getSession()->setFlash('success', 'Course Added');

                return $this->redirect('/index.php?r=courses/index');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelete($idcourse)
    {
        if(!is_null($idcourse)) {
            $course = Courses::findOne($idcourse);
            $course->delete();

            Yii::$app->getSession()->setFlash('success', 'Course Deleted');

            return $this->redirect('/index.php?r=courses/index');
        }
    }

    public function actionIndex()
    {
        // Gets all records from table courses
        $query = Courses::find();

        // Creates the pagination for course records
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count()
        ]);

        // Fetches the real records from db
        $courses = $query
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'pagination' => $pagination,
            'courses' => $courses
        ]);
    }

    public function actionUpdate($idcourse)
    {
        $course = Courses::findOne($idcourse);

        if ($course->load(Yii::$app->request->post())) {
            if ($course->validate()) {

                // form inputs are valid, do something here
                $course->save();

                Yii::$app->getSession()->setFlash('success', 'Course Updated');
                return $this->redirect('/index.php?r=courses/index');
            }
        }
        
        return $this->render('update', [
            'model' => $course,
        ]);
    }

}
