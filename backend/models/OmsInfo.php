<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "oms_info".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $order
 * @property int $publish
 */
class OmsInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oms_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'string'],
            [['order', 'publish'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'order' => 'Сортировка',
            'publish' => 'Публикация',
        ];
    }
}
