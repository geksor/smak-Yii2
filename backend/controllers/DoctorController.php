<?php

namespace backend\controllers;

use backend\models\ImageUpload;
use backend\models\Position;
use backend\models\Table;
use Yii;
use backend\models\Doctor;
use backend\models\DoctorSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DoctorController implements the CRUD actions for Doctor model.
 */
class DoctorController extends Controller
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
                            'set-position',
                            'set-photo',
                            'set-table',
                            'publish',
                            'order',
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
     * Lists all Doctor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DoctorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Doctor model.
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
     * Creates a new Doctor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doctor();

        $maxOrder = Doctor::find()->max('`order`');

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
     * Updates an existing Doctor model.
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
     * Deletes an existing Doctor model.
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

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSetPosition($id)
    {
        $doctor = $this->findModel($id);
        $selectedPositions = $doctor->selectedpositions;
        $positions = $this->getPositions();

        if (Yii::$app->request->isPost) {
            $positions = Yii::$app->request->post('positions');
            $doctor->savePositions($positions);
            return $this->redirect(['view', 'id' => $doctor->id]);
        }

        return $this->render('set-position', [
            'doctor' => $doctor,
            'positions' => $positions,
            'selectedPositions' => $selectedPositions,
        ]);

    }

    public function getPositions()
    {
        return ArrayHelper::map(Position::find()->all(), 'id', 'title');
    }

    public function actionSetPhoto($id)
    {
        $model = new ImageUpload();
        $doctor = $this->findModel($id);

        if (Yii::$app->request->isPost)
        {
            $file = UploadedFile::getInstance($model, 'image');
            $cropInfo = Yii::$app->request->post('ImageUpload')['crop_info'];

            if ($doctor->savePhoto($model->uploadFile($file, $doctor->photo, $cropInfo)))
            {
                return $this->redirect(['doctor/view', 'id' => $doctor->id]);
            }
        }

        return $this->render('set-photo', [
            'model' => $model,
            'doctor' => $doctor,
        ]);
    }

    public function actionSetTable($id)
    {
        $doctor = $this->findModel($id);

        return $doctor->table
            ? $this->updateTable($doctor->table->id)
            : $this->createTable($id);
    }

    public function createTable($id)
    {
        $model = new Table();
        $doctor = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $doctor->id]);
        }

        return $this->render('set-table', [
            'model' => $model,
            'doctor' => $doctor,
        ]);
    }
    public function updateTable($id)
    {
        $model =  Table::findOne($id);
        $doctor = $this->findModel($model->doctor->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $doctor->id]);
        }

        return $this->render('set-table', [
            'model' => $model,
            'doctor' => $doctor,
        ]);
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
            $maxOrder = Doctor::find()->max('`order`');

            if ($order <= $maxOrder){

                $model = $this->findModel($id);

                $model->order = (integer) $order;

                while (!$modelReplace = Doctor::find()->where(['order' => $order])->one()){
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
