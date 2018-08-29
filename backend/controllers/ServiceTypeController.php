<?php

namespace backend\controllers;

use backend\models\ServiceItem;
use backend\models\ServiceItemSearch;
use Yii;
use backend\models\ServiceType;
use backend\models\ServiceTypeSearch;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServiceTypeController implements the CRUD actions for ServiceType model.
 */
class ServiceTypeController extends Controller
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
                        'actions' => [
                            'logout',
                            'index',
                            'view',
                            'create',
                            'update',
                            'delete',
                            'view-item',
                            'create-item',
                            'update-item',
                            'delete-item',
                            'publish',
                            'order',
                            'order-item',
                            'publish-item',
                        ],
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
     * Lists all ServiceType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServiceTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiceType model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new ServiceItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Creates a new ServiceType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceType();

        $maxOrder = ServiceType::find()->max('`order`');

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
     * Updates an existing ServiceType model.
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
     * Deletes an existing ServiceType model.
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
     * Finds the ServiceType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ServiceType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServiceType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreateItem($id)
    {
        $model = new ServiceItem();
        $model->type_id = $id;

        $maxOrder = ServiceItem::find()->max('`order`');

        if ($maxOrder){
            $model->order = ++$maxOrder;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-item', 'id' => $model->id]);
        }

        return $this->render('create-item', [
            'model' => $model,
        ]);
    }

    public function actionViewItem($id)
    {
        return $this->render('view-item', [
            'model' => ServiceItem::findOne($id),
        ]);
    }

    public function actionUpdateItem($id)
    {
        $model = ServiceItem::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-item', 'id' => $id]);
        }

        return $this->render('update-item', [
            'model' => $model,
        ]);
    }

    public function actionDeleteItem($id)
    {
        $delModel = ServiceItem::findOne($id);
        $typeId = $delModel->type->id;
        $delModel->delete();

        return $this->redirect(['view', 'id' => $typeId]);
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
    }

    public function actionOrder($id, $order, $up)
    {
        if (Yii::$app->request->isAjax){

            $maxOrder = ServiceType::find()->max('`order`');

            if ($order <= $maxOrder){

                $model = $this->findModel($id);

                $model->order = (integer) $order;

                while (!$modelReplace = ServiceType::find()->where(['order' => $order])->one()){
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

    public function actionPublishItem($id, $publish)
    {
        if (Yii::$app->request->isAjax){

            $model = ServiceItem::findOne($id);

            $model->publish = (integer) $publish;

            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->type_id]);
            }
        }
    }

    public function actionOrderItem($id, $order, $up)
    {
        if (Yii::$app->request->isAjax){

            $maxOrder = ServiceItem::find()->max('`order`');

            $model = ServiceItem::findOne($id);

            if ($order <= $maxOrder){

                $model->order = (integer) $order;

                while (!$modelReplace = ServiceItem::find()->where(['order' => $order])->one()){
                    $up ? $order-- : $order++;
                }

                $modelReplace->order = $up ? ++$modelReplace->order : --$modelReplace->order;
                if ($modelReplace->order === $model->order){
                    $modelReplace->order = $up ? ++$modelReplace->order : --$modelReplace->order;
                }

                if ($model->save() && $modelReplace->save()){
                    return $this->redirect(['view', 'id' => $model->type_id]);
                }
            }
            return $this->redirect(['view', 'id' => $model->type_id]);
        }
        return false;
    }

}
