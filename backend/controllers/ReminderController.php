<?php

namespace backend\controllers;

use Yii;
use backend\models\Reminder;
use backend\models\ReminderSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReminderController implements the CRUD actions for Reminder model.
 */
class ReminderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'view', 'create', 'update', 'delete', 'publish', 'order'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Reminder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReminderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reminder model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Reminder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reminder();

        $maxOrder = Reminder::find()->max('`order`');

        if ($maxOrder){
            $model->order = ++$maxOrder;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reminder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reminder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reminder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reminder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reminder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPublish($id, $publish)
    {
        if (Yii::$app->request->isAjax){

            $model = $this->findModel($id);

            $model->publish = (integer) $publish;

            if ($model->save()){
                return $this->redirect(['index']);
            }
        }
        return false;
    }

    public function actionOrder($id, $order, $up)
    {
        if (Yii::$app->request->isAjax){
            $maxOrder = Reminder::find()->max('`order`');

            if ($order <= $maxOrder){

                $model = $this->findModel($id);

                $model->order = (integer) $order;

                while (!$modelReplace = Reminder::find()->where(['order' => $order])->one()){
                    $up ? $order-- : $order++;
                }

                $modelReplace->order = $up ? ++$modelReplace->order : --$modelReplace->order;
                if ($modelReplace->order === $model->order){
                    $modelReplace->order = $up ? ++$modelReplace->order : --$modelReplace->order;
                }

                if ($model->save() && $modelReplace->save()){
                    return $this->redirect(['index']);
                }
            }
            return $this->redirect(['index']);
        }
        return false;
    }
}
