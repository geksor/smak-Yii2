<?php

namespace frontend\widgets;


use backend\models\ServiceType;
use yii\base\Widget;

class ServiceTypeWidget extends Widget
{

    public function run()
    {
        $query = ServiceType::find()->where(['publish' => 1]);
        $countQuery = $query->count();

        $models = $query->orderBy(['order' => SORT_ASC])->all();

        if ($models){
            foreach ($models as $model){
                $model->short_description =
                    $model->short_description
                        ? substr($model->short_description, 0, 130)
                        : '';
            }
        }

        return $this->render('serviceTypeWidget', [
            'models' => $models,
            'countQuery' => $countQuery,
        ]);
    }

}