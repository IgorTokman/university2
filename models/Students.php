<?php

namespace app\models;

use app\behaviors\ManyToManyBehavior;
use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $idstudents
 * @property string $name
 * @property string $address
 * @property string $phone
 *
 * @property StudentsHasCourses[] $studentsHasCourses
 * @property Courses[] $coursesIdcourses
 */
class Students extends \yii\db\ActiveRecord
{

    public $courses = [];

    public function behaviors() {
        return [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'courses', // Editable attribute name
                        'table' => 'students_has_courses', // Name of the junction table
                        'ownAttribute' => 'students_idstudents', // Name of the column in junction table that represents current model
                        'relatedModel' => Courses::className(), // Related model class
                        'relatedAttribute' => 'courses_idcourses', // Name of the column in junction table that represents related model
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'phone', 'courses'], 'required'],
            [['name', 'address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idstudents' => 'Idstudents',
            'courses' => 'Courses',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentsHasCourses()
    {
        return $this->hasMany(StudentsHasCourses::className(), ['students_idstudents' => 'idstudents']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoursesIdcourses()
    {
        return $this->hasMany(Courses::className(), ['idcourses' => 'courses_idcourses'])->viaTable('students_has_courses', ['students_idstudents' => 'idstudents']);
    }
}
