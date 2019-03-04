<?php

namespace frontend\controllers;

use backend\models\Doctor;
use yii\web\NotFoundHttpException;

class DoctorsController extends \yii\web\Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $models = Doctor::find()->with('positions')->where(['publish' => 1])->orderBy(['order' => SORT_ASC])->all();

        return $this->render('index', [
            'models' => $models,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Doctor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Doctor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Doctor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрашиваемая страница не найдена.');
    }

}
