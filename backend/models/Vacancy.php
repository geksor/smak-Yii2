<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $create_date
 * @property string $publish_date
 * @property int $publish
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'string'],
            [['create_date', 'publish_date'], 'safe'],
            [['publish'], 'integer'],
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
            'text' => 'Информация',
            'create_date' => 'Дата создания',
            'publish_date' => 'Дата публикации',
            'publish' => 'Публикация',
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->create_date){

            $this->create_date =
                is_string($this->create_date)
                    ? strtotime($this->create_date)
                    : $this->create_date;
        }else{
            $this->create_date = time();
        }

        if ($this->publish_date){

            $this->publish_date =
                is_string($this->publish_date)
                    ? strtotime($this->publish_date)
                    : $this->publish_date;
        }else{
            $this->publish_date = $this->create_date;
        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
