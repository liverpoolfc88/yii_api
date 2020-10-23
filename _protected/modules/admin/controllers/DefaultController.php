<?php

namespace app\modules\admin\controllers;
use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\UserSearch;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('theCreator')){
            return $this->render('index');
        }
        return $this->goHome();

    }
    public function actionUser(){
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $this->_pageSize);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
