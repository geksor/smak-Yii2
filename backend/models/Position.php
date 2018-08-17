<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $id
 * @property string $title
 *
 * @property PositionDoctor[] $positionDoctors
 * @property Doctor[] $doctors
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositionDoctors()
    {
        return $this->hasMany(PositionDoctor::className(), ['position_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['id' => 'doctor_id'])->viaTable('position_doctor', ['position_id' => 'id']);
    }
}
