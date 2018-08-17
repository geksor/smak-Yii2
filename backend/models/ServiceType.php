<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "service_type".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $publish
 * @property int $order
 *
 * @property ServiceItem[] $serviceItems
 */
class ServiceType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['publish', 'order'], 'integer'],
            [['title'], 'string', 'max' => 64],
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
            'description' => 'Описание',
            'publish' => 'Публикация',
            'order' => 'Порядок вывода',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceItems()
    {
        return $this->hasMany(ServiceItem::className(), ['type_id' => 'id']);
    }

    public function getPublishState()
    {
        if ($this->publish){
            return 'Опубликован';
        }
        return 'Не опубликован';
    }
}
