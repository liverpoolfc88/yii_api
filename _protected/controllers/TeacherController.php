<?php

namespace app\controllers;
use app\models\Teacher;
use \yii\web\Response;
use \Yii;

$format = \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

class TeacherController extends \yii\web\Controller
{
    public $enableCsrfValidation=false;
    public function actionIndex()
    {
        echo 'salom'; die();

        return $this->render('index');

    }

    public function actionCreate(){

//        echo 'create buuu'; die();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        $arr = array('ststus'=>true);
        $teacher = new Teacher();
        $teacher->scenario = Teacher::SCENARIO_CREATE;
        $teacher->attributes = \Yii::$app->request->post();
        if ($teacher->validate()){
            $teacher->save();
            return array('status'=>true, 'data' => 'Xammasi saqlamndi!');
        } else{
            return array('status'=>false,'data'=>$teacher->getErrors());
        }
//        return $teacher;
    }

    public function actionList(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        $arr = array('ststus'=>true);
        $teacher = Teacher::find()->with('students')->all();
        if (count($teacher)>0){
            return array('status'=>true, 'data'=>$teacher);
        }else{
            return array('status'=>false, 'data'=>'teacher yoq');
        }
//        return $teacher;
    }

    public function  actionSelect(){
        Yii::$app->response->format = Response::FORMAT_JSON;

//        $teacher = Teacher::find()
//            ->joinWith('students')
//            ->where(['student.teacher_id' => 2])
//            ->all();



//        $query = (new Query)->select([
//            'uname' => 'user.name',
//            'aname' => 'app.name',
//            'user.create_time',
//            'app_id'
//        ])->from('user')
//            ->innerJoin('app', 'user.app_id = app.id')
//            ->where(['permission_level' => 0, 'parent_id' => $id])
//            ->andWhere(['LIKE', 'user.name', $uname])
//            ->andWhere(['LIKE', 'app.name', $aname])
//            ->all();




        $teacher = Teacher::find()
            ->select([
                    'tchr_name'=>'teacher.name',
                    'std_name'=>'student.name',
                    'teacher.id',
                    'teacher.name',
                    'student.age'


                ])
            ->leftJoin('student', 'student.teacher_id = teacher.id')
            ->with(['students'])
            ->all();
//            ->where(['students.teacher_id'=>3])
//            find()
//            ->select('students.name')
//             ->leftJoin(['students'])
//                ->where(['student.teacher_id'=>2])




//        $teacher = Teacher::find()
//            ->joinWith('students')
//            ->where([ 'student.teacher_id' => 3])
//            ->all();



        return $teacher;

    }



}
