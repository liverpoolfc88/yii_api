<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\modules\admin\models\Province;

class ProvinceController extends ActiveController
{
    public $modelClass = 'app\modules\admin\models\Province';

    public function actionProvince(){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//        Developers::find()->select('developers.*, user.username')->joinWith(['users'])->asArray()->all();
        $province = Province::find()->select('district.name')->joinWith(['district'])->all();

        return $province;

    }
}
