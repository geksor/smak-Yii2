<?php

namespace backend\models;

use yii\base\Model;
use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property string $pageTitle
 * @property string $infoTitle
 * @property string $infoDescription
 * @property string $infoList
 * @property string $infoDocName
 * @property string $infoDocTitle
 * @property string $infoImage
 */

class PayServicePage extends Model
{
    public $pageTitle;
    public $infoTitle;
    public $infoDescription;
    public $infoList;
    public $infoDocName;
    public $infoDocTitle;
    public $infoImage;


    public function rules()
    {
        return [
            [
                [
                    'pageTitle',
                    'infoTitle',
                    'infoDescription',
                    'infoList',
                    'infoDocName',
                    'infoDocTitle',
                    'infoImage',
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
            'pageTitle' => 'Заголовок страницы',
            'infoTitle' => 'Заголовок раздела информации',
            'infoDescription' => 'Описание раздела информации',
            'infoList' => 'Список раздела информации',
            'infoDocName' => 'Название документа',
            'infoDocTitle' => 'Заголовок ссылки раздела информации',
            'infoImage' => 'Изображение раздела информации',
        ];
    }

    public function save($request){
        if ($request){
            $tempParams = json_encode($request);
        }else{
            $tempParams = '{}';
        }
        $setPath = dirname(dirname(__DIR__)).'/common/config/payService.json';
        file_put_contents($setPath , $tempParams);
    }
}