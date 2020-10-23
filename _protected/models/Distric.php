<?php


namespace app\models;

use app\modules\admin\models\District;
use app\modules\admin\models\Province;


class Distric extends District
{
    public function fields()
    {
        return [
            'id',
            'name',
//            'province' => '5'
            'is_R' => function($q){
            return $q->id==1 ? 'Rayxona':'Nozima';
            },
//            'province' =>

            ];
    }

    public function extraFields()
    {
        return ['province'];
    }

}
