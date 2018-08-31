<?php

namespace backend\models;

use yii\base\Model;

class Params extends Model
{
    public $email;
    public $phone;
    public $phoneReception;
    public $phoneInfo;
    public $phoneAmbulance;
    public $address;

    public $companyType;
    public $company_name;
    public $corpAddress;
    public $inn;
    public $kpp;
    public $ogrn;
    public $bank;

    public $workDay;
    public $shortDay;
    public $hollyDay;



    public function rules()
    {
        return [
            [
                [
                    'email',
                    'phone',
                    'phoneReception',
                    'phoneInfo',
                    'phoneAmbulance',
                    'address',
                    'companyType',
                    'company_name',
                    'corpAddress',
                    'inn',
                    'kpp',
                    'ogrn',
                    'workDay',
                    'shortDay',
                    'hollyDay',
                    'bank',
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
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'phoneReception' => 'Телефон приемной',
            'phoneInfo' => 'Телефон справочная',
            'phoneAmbulance' => 'Телефон скорая помощь',
            'address' => 'Адрес',
            'companyType' => 'Тип фирмы',
            'company_name' => 'Название фирмы',
            'corpAddress' => 'Юридический адрес',
            'inn' => 'ИНН',
            'kpp' => 'КПП',
            'ogrn' => 'ОГРН',
            'bank' => 'Банк',
            'workDay' => 'Рабочие дни',
            'shortDay' => 'Сокращенные дени',
            'hollyDay' => 'Выходные дни',
        ];
    }
}