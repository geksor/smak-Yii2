<?php

namespace backend\models;

use Yii;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "gallery_image".
 *
 * @property int $id
 * @property string $type
 * @property int $ownerId
 * @property int $rank
 * @property string $name
 * @property string $description
 * @property int $imageWidth
 * @property int $imageHeight
 *
 * @property Gallery $owner
 */
class GalleryImage extends \yii\db\ActiveRecord
{
    public $imageWidth;
    public $imageHeight;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ownerId'], 'required'],
            [['ownerId', 'rank'], 'integer'],
            [['description'], 'string'],
            [['type', 'name'], 'string', 'max' => 255],
            [['ownerId'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::className(), 'targetAttribute' => ['ownerId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'ownerId' => 'Owner ID',
            'rank' => 'Порядок вывода',
            'name' => 'Имя',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Gallery::className(), ['id' => 'ownerId']);
    }
}
