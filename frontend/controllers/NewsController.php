<?php

namespace frontend\controllers;

use backend\models\News;
use yii\data\Pagination;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = News::find()
            ->where(['publish' => 1])
            ->andWhere(['<', 'publish_start', time()])
            ->andWhere(['>', 'publish_end', time()])
            ->orWhere(['publish_end' => null])
            ->andWhere(['<', 'publish_start', time()])
            ->andWhere(['publish' => 1]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['publish_start' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }

}
