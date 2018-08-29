<?php

namespace frontend\controllers;

use backend\models\Reminder;

class ReminderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $models = Reminder::find()->where(['publish' => 1])->orderBy(['order' => SORT_ASC])->all();

        return $this->render('index', [
            'models' => $models,
        ]);
    }

}
