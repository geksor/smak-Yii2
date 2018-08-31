<?php

namespace frontend\widgets;


use Yii;
use backend\models\Gallery;
use yii\base\Widget;

class ShortAboutWidget extends Widget
{

    public function run()
    {
        $gallery = Gallery::findOne(['id' => Yii::$app->params['About']['galleryId']]);

        if (Yii::$app->params['About']['shortAbout']){
            $text = substr(Yii::$app->params['About']['shortAbout'], 0, 510);
        }

        return $this->render('shortAboutWidget', [
            'gallery' => $gallery,
            'text' => $text
        ]);
    }

}