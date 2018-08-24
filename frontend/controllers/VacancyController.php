<?php

namespace frontend\controllers;

use backend\models\Vacancy;
use yii\data\Pagination;

class VacancyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Vacancy::find()
            ->where(['publish' => 1])
            ->andWhere(['<', 'publish_date', time()]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['publish_date' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }

}
