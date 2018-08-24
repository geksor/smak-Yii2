<?php

namespace frontend\widgets;


use backend\models\News;
use yii\base\Widget;

class LastsNewsWidget extends Widget
{

    public function run()
    {
        $models = News::find()
            ->where(['publish' => 1])
            ->andWhere(['<', 'publish_start', time()])
            ->andWhere(['>', 'publish_end', time()])
            ->orWhere(['publish_end' => null])
            ->andWhere(['<', 'publish_start', time()])
            ->andWhere(['publish' => 1])
            ->orderBy(['publish_start' => SORT_DESC])
            ->limit(2)
            ->all();

        if ($models){
            foreach ($models as $model){
                $model->short_text =
                    $model->short_text
                        ? substr($model->short_text, 0, 170)
                        : '';
            }
        }

        return $this->render('lastsNewsWidget', [
            'models' => $models,
        ]);
    }

}