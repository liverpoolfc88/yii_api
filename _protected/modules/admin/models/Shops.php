<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tbl_shops".
 *
 * @property int $id
 * @property string $name
 * @property int $tbl_district_id
 *
 * @property TblDistrict $tblDistrict
 */
class Shops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_shops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tbl_district_id'], 'required'],
            [['tbl_district_id'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['tbl_district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['tbl_district_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'tbl_district_id' => 'Tbl District ID',
        ];
    }

    /**
     * Gets query for [[TblDistrict]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'tbl_district_id']);
    }
}
