<?php

namespace frontend\controllers;

use backend\models\OmsInfo;
use backend\models\OmsLink;
use yii\helpers\VarDumper;

class OmsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = OmsLink::find()->where(['publish' => 1])->andWhere(['not', ['link' => null]]);
        $countQuery = $query->count();
        $col_12 = !($countQuery % 2 == 0);

        $links = $query->all();
        $info = OmsInfo::find()->where(['publish' => 1])->all();

//        VarDumper::dump($col_12, 10, true);die;

        return $this->render('index', [
            'links' => $links,
            'info' => $info,
            'col_12' => $col_12,
            'linksCount' => $countQuery,
        ]);
    }

}
