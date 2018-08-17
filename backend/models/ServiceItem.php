<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "service_item".
 *
 * @property int $id
 * @property int $type_id
 * @property string $title
 * @property int $day_count
 * @property int $price
 * @property int $publish
 * @property int $order
 *
 * @property ServiceType $type
 */
class ServiceItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'day_count', 'price', 'publish', 'order'], 'integer'],
            [['title'], 'string', 'max' => 256],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceType::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'title' => 'Название',
            'day_count' => 'Кол-во к/д',
            'price' => 'Цена',
            'publish' => 'Публикация',
            'order' => 'Порядок вывода',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ServiceType::className(), ['id' => 'type_id']);
    }

    public function getPublishState()
    {
        if ($this->publish){
            return 'Опубликован';
        }
        return 'Не опубликован';
    }
}
