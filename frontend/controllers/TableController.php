<?php

namespace frontend\controllers;

/* @var $models Doctor */
/* @var $modelsSm Doctor */

use backend\models\Doctor;
use backend\models\Position;
use yii\db\ActiveQuery;

class TableController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $modelsSm = Doctor::find()->with('positions', 'table')->where(['publish' => 1])->all();
        if ($modelsSm){
            $this->nameReplace($modelsSm);
        }

        $models = Position::find()->with([
            'doctors' => function (ActiveQuery $query){
                $query->with('table')->andWhere(['publish' => 1]);
            }
        ])->all();

        return $this->render('index', [
            'modelsSm' => $modelsSm,
            'models' => $models,
        ]);
    }

    public function nameReplace($models)
    {
        foreach ($models as $model){
            /* @var $model Doctor */
            $str = $model->name;

            $arrName = explode(' ', $str);

            $resName = $arrName[0] . ' ';
            $resName .= substr($arrName[1],0,2) ? substr($arrName[1],0,2) . '.' : '';
            $resName .= substr($arrName[2],0,2) ? substr($arrName[2],0,2) . '.' : '';

            $model->name = $resName;
        }
    }

}
