<?php

namespace backend\models;

use Yii;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $publish
 * @property int $rank
 * @property int $imageWidth
 * @property int $imageHeight
 *
 * @property GalleryImage[] $galleryImages
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imageWidth', 'imageHeight'], 'required'],
            [['description'], 'string'],
            [['publish', 'rank', 'imageWidth', 'imageHeight'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'gallery',
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@uploads') . '/images/gallery',
                'url' => '/uploads/images/gallery',
                'versions' => [
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box($this->imageWidth, $this->imageHeight));
                    },
                    'medium' => function ($img) {
                        /** @var Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ]
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
            'rank' => 'Порядок вывода',
            'imageWidth' => 'Ширина превью (px)',
            'imageHeight' => 'Высота превью (px)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryImages()
    {
        return $this->hasMany(GalleryImage::className(), ['ownerId' => 'id']);
    }
}
