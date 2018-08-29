<?php

namespace backend\controllers;

use Yii;
use backend\models\OmsInfo;
use backend\models\OmsInfoSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OmsInfoController implements the CRUD actions for OmsInfo model.
 */
class OmsInfoController extends Controller
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
     * Lists all OmsInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OmsInfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OmsInfo model.
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
     * Creates a new OmsInfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OmsInfo();

        $maxOrder = OmsInfo::find()->max('`order`');

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
     * Updates an existing OmsInfo model.
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
     * Deletes an existing OmsInfo model.
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
     * Finds the OmsInfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OmsInfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OmsInfo::findOne($id)) !== null) {
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
            $maxOrder = OmsInfo::find()->max('`order`');

            if ($order <= $maxOrder){

                $model = $this->findModel($id);

                $model->order = (integer) $order;

                while (!$modelReplace = OmsInfo::find()->where(['order' => $order])->one()){
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
