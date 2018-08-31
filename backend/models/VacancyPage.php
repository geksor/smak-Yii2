<?php

namespace backend\models;

use yii\base\Model;
use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property string $pageImage
 * @property string $pageTitle
 */

class VacancyPage extends Model
{
    public $pageImage;
    public $pageTitle;


    public function rules()
    {
        return [
            [
                [
                    'pageImage',
                    'pageTitle',
                ],
                'safe'
            ],
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
        ];
    }

    public function save($request){
        if ($request){
            $tempParams = json_encode($request);
        }else{
            $tempParams = '{}';
        }
        $setPath = dirname(dirname(__DIR__)).'/common/config/vacancy.json';
        file_put_contents($setPath , $tempParams);
    }
}