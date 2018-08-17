<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property int $id
 * @property int $position_id
 * @property string $name
 * @property string $photo
 * @property string $info
 * @property string $diplom
 * @property int $publish
 * @property int $order
 *
 * @property Position $position
 * @property Table[] $tables
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position_id', 'publish', 'order'], 'integer'],
            [['photo', 'info', 'diplom'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position_id' => 'Position ID',
            'name' => 'Name',
            'photo' => 'Photo',
            'info' => 'Info',
            'diplom' => 'Diplom',
            'publish' => 'Publish',
            'order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTables()
    {
        return $this->hasMany(Table::className(), ['doctor_id' => 'id']);
    }
}
