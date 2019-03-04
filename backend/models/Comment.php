<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $user_name
 * @property string $date
 * @property string $text
 * @property string $email
 * @property int $publish
 * @property int $viewed
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_name', 'text', 'email'], 'required'],
            [['date'], 'safe'],
            [['text', 'email'], 'string'],
            [['publish', 'viewed'], 'integer'],
            [['user_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'Имя',
            'date' => 'Дата',
            'text' => 'Текст',
            'email' => 'Email',
            'publish' => 'Публикация',
            'viewed' => 'Viewed',
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->date){

            $this->date =
                is_string($this->date)
                    ? strtotime($this->date)
                    : $this->date;
        }else{
            $this->date = time();
        }
        return parent::beforeSave($insert);
    }
}
