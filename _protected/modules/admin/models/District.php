<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tbl_district".
 *
 * @property int $id
 * @property string $name
 * @property int $tbl_province_id
 *
 * @property Province $tblProvince
 * @property Shops[] $tblShops
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_district';
    }

    public function fields()
    {
        return ['id', 'name'];
    }

    public function extraFields()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tbl_province_id',], 'required'],
            [['tbl_province_id'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['tbl_province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['tbl_province_id' => 'id']],
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
            'tbl_province_id' => 'Tbl Province ID',
        ];
    }

    /**
     * Gets query for [[TblProvince]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Province::className(), ['id' => 'tbl_province_id']);
    }

    /**
     * Gets query for [[TblShops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shops::className(), ['tbl_district_id' => 'id']);
    }
}
