<?php

namespace app\controllers;
use app\models\Student;
use app\models\Teacher;
use \yii\web\Response;
use \Yii;

class StudentController extends \yii\web\Controller
{
    public $enableCsrfValidation=false;

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionCreate(){

//        echo 'create buuu'; die();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;



//        $arr = array('ststus'=>true);
        $student = new Student();
        $student->scenario = Teacher::SCENARIO_CREATE;
        $student->attributes = \Yii::$app->request->post();
        if ($student->validate()){
            $student->save();
            return array('status'=>true, 'data' => 'Xammasi saqlamndi!');
        } else{
            return array('status'=>false,'data'=>$student->getErrors());
        }
//        return $teacher;
    }

    public function actionList(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        $arr = array('ststus'=>true);
//        $student = Student::find()->with('teacher')->all();
        $student = Student::find()->
        select(' student.name, student.age ', 'teacher_id as teacher.name')->
        leftJoin(['teacher'])->
//        joinWith(['student'])->
        all();
        if (count($student)>0){
            return array('status'=>true, 'data'=>$student);
        }else{
            return array('status'=>false, 'data'=>'teacher yoq');
        }
//        return $teacher;
    }

    public function  actionSelect(){

        Yii::$app->response->format = Response::FORMAT_JSON;

        $teacher = Teacher::find()->all();
        $student = Student::find()->all();
        $list = [];
        foreach ($student as $t){

//            if ($t->teacher->name == 'Elbek'){

            array_push($list, (object)
            [
                'id'=> $t->id,
                'name' => $t->name,
                'age' => $t->age,
                'teacher'=>$t->teacher->name
            ]);
//            }

        }
        return $list;
    }
}
