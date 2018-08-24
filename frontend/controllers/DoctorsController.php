<?php

namespace frontend\controllers;

use backend\models\Doctor;

class DoctorsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $models = Doctor::find()->with('positions')->where(['publish' => 1])->orderBy(['order' => SORT_ASC])->all();
        return $this->render('index', [
            'models' => $models,
        ]);
    }

}
