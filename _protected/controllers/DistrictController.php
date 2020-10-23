<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\rest\Controller;
use app\modules\admin\models\District;
use app\models\Distric;

class DistrictController extends ActiveController
{
    public $modelClass = 'app\models\Distric';

//    public function extraFields()
//    {
//        $d = Distric::find()->all();
//
//        return $d;
//    }
}
