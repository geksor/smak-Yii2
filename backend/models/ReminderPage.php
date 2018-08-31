<?php

namespace backend\models;

use yii\base\Model;
use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property string $pageTitle
 * @property string $rulesTitle
 * @property string $rulesDescription
 * @property string $rulesList
 * @property string $rulesDocName
 * @property string $rulesDocTitle
 * @property string $director
 */

class ReminderPage extends Model
{
    public $pageTitle;
    public $rulesTitle;
    public $rulesDescription;
    public $rulesList;
    public $rulesDocName;
    public $rulesDocTitle;
    public $director;


    public function rules()
    {
        return [
            [
                [
                    'pageTitle',
                    'rulesTitle',
                    'rulesDescription',
                    'rulesList',
                    'rulesDocName',
                    'rulesDocTitle',
                    'director'
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
            'rulesTitle' => 'Заголовок раздела правил',
            'rulesDescription' => 'Описание раздела правил',
            'rulesList' => 'Список раздела правил',
            'rulesDocName' => 'Название документа',
            'rulesDocTitle' => 'Заголовок ссылки раздела правил',
            'director' => 'Подпись для раздела правил',
        ];
    }

    public function save($request){
        if ($request){
            $tempParams = json_encode($request);
        }else{
            $tempParams = '{}';
        }
        $setPath = dirname(dirname(__DIR__)).'/common/config/reminder.json';
        file_put_contents($setPath , $tempParams);
    }
}