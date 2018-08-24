<?php

namespace frontend\controllers;

use backend\models\ServiceType;

class ServiceTypeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $models = ServiceType::find()->where(['publish' => 1])->orderBy(['order' => SORT_ASC])->all();

        return $this->render('index', [
            'models' => $models,
        ]);
    }

}
