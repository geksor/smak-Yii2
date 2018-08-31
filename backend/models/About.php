<?php

namespace backend\models;

use yii\base\Model;
use Yii;

class About extends Model
{
    public $pageImage;
    public $pageTitle;
    public $shortAbout;
    public $aboutText;
    public $galleryId;
    public $certificateId;


    public function rules()
    {
        return [
            [
                [
                    'pageImage',
                    'pageTitle',
                    'aboutText',
                    'galleryId',
                    'certificateId',
                    'shortAbout'
                ],
                'safe'
            ],
            [['shortAbout'], 'string', 'max' => 500]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pageImage' => 'Главное изображение',
            'pageTitle' => 'Заголовок страницы',
            'aboutText' => 'Текст о нас',
            'galleryId' => 'ID галереи',
            'certificateId' => 'ID галереи документов',
            'shortAbout' => 'Кратко о нас',
        ];
    }

    public function save($request){
        if ($request){
            $tempParams = json_encode($request);
        }else{
            $tempParams = '{}';
        }
        $setPath = dirname(dirname(__DIR__)).'/common/config/about.json';
        file_put_contents($setPath , $tempParams);
    }
}