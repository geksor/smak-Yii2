<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "table".
 *
 * @property int $id
 * @property int $doctor_id
 * @property string $table_pay
 * @property string $table_oms
 *
 * @property Doctor $doctor
 */
class Table extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'table';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id'], 'integer'],
            [['table_pay', 'table_oms'], 'string'],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctor_id' => '',
            'table_pay' => 'График приема',
            'table_oms' => 'Прием по ОМС',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'doctor_id']);
    }
}
