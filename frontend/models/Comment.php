<?php

namespace frontend\models;

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
            [['user_name', 'email', 'text',], 'required'],
            [['text', 'email'], 'string'],
            [['publish', 'viewed'], 'integer'],
            [['user_name'], 'string', 'max' => 64],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'date' => 'Date',
            'text' => 'Text',
            'email' => 'Email',
            'publish' => 'Publish',
            'viewed' => 'Viewed',
        ];
    }
}
