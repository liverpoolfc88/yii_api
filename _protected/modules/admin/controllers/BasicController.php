<?php

namespace app\modules\admin\controllers;

class BasicController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
