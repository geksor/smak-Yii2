<?php

namespace frontend\controllers;

use frontend\models\Comment;
use Yii;
use yii\data\Pagination;
use yii\helpers\VarDumper;

class CommentsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Comment::find()->where(['publish' => 1]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);

        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['date' => SORT_DESC])
            ->all();

        $formModel = new Comment();

        if ($formModel->load(Yii::$app->request->post()) && $formModel->validate()) {
            $formModel->date = time();
            if ($formModel->save()) {
                Yii::$app->session->setFlash('success', 'Спасибо за ваш отзыв!');
                $formModel = new Comment();

            } else {
                Yii::$app->session->setFlash('error', 'Что то пошло не так.');
                VarDumper::dump($formModel, 10, true);die;

            }
        }

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
            'formModel' => $formModel,
        ]);
    }

}
