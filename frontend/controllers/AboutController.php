<?php

namespace frontend\controllers;

use Yii;
use backend\models\Gallery;

class AboutController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $galleryId = Yii::$app->params['About']['galleryId'];
        $certificateId = Yii::$app->params['About']['certificateId'];

        if ($galleryId){
            $gallery = Gallery::findOne(['id' => $galleryId]);
        }
        if ($certificateId){
            $certificate = Gallery::findOne(['id' => $certificateId]);
        }
        return $this->render('index', [
            'gallery' => $gallery,
            'certificate' => $certificate,
        ]);
    }
}
