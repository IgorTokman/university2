<?php

namespace app\controllers;

use app\models\Courses;
use yii\data\Pagination;

class CoursesController extends \yii\web\Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
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

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
