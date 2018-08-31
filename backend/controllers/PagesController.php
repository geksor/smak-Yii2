<?php

namespace backend\controllers;

use backend\models\About;
use backend\models\DocumentUpload;
use backend\models\ImageUpload;
use backend\models\PayServicePage;
use backend\models\ReminderPage;
use backend\models\VacancyPage;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CallbackController implements the CRUD actions for Callback model.
 */
class PagesController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'actions' => [
                            'login',
                            'error',
                            'set-image',
                            'about',
                        ],
                        'allow' => true,
                    ],
                    [
                        'roles' => ['@'],
                        'allow' => true,
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
     * Lists all Callback models.
     * @return mixed
     */
    public function actionAbout($image = null)
    {
        $model = new About();

        if ($model->load(Yii::$app->params)) {
            if ($image){
                $model->pageImage = $image;
                $model->save($model);
            }
            if (Yii::$app->request->post()) {
                $model->save(Yii::$app->request->post('About'));
                return $this->redirect(['about']);
            }
        }

        return $this->render('about', [
            'model' => $model,
        ]);
    }

    public function actionVacancy($image = null)
    {
        $model = new VacancyPage();

        if ($model->load(Yii::$app->params)) {
            if ($image){
                $model->pageImage = $image;
                $model->save($model);
            }
            if (Yii::$app->request->post()) {
//                VarDumper::dump(Yii::$app->request->post(), 10, true);die;
                $model->save(Yii::$app->request->post('VacancyPage'));
                return $this->redirect(['vacancy']);
            }
        }

        return $this->render('vacancy', [
            'model' => $model,
        ]);
    }

    public function actionReminder($doc = null)
    {
        $model = new ReminderPage();

        if ($model->load(Yii::$app->params)) {
            if ($doc){
                $model->rulesDocName = $doc;
                $model->save($model);
            }
            if (Yii::$app->request->post()) {
//                VarDumper::dump(Yii::$app->request->post(), 10, true);die;
                $model->save(Yii::$app->request->post('ReminderPage'));
                return $this->redirect(['reminder']);
            }
        }

        return $this->render('reminder', [
            'model' => $model,
        ]);
    }

    public function actionPayService($doc = null, $image = null)
    {
        $model = new PayServicePage();

        if ($model->load(Yii::$app->params)) {
            if ($doc){
                $model->infoDocName = $doc;
                $model->save($model);
            }
            if ($image){
                $model->infoImage = $image;
                $model->save($model);
            }
            if (Yii::$app->request->post()) {
//                VarDumper::dump(Yii::$app->request->post(), 10, true);die;
                $model->save(Yii::$app->request->post('PayServicePage'));
                return $this->redirect(['pay-service']);
            }
        }

        return $this->render('pay-service', [
            'model' => $model,
        ]);
    }

    public function actionSetImage($actionName, $width, $height, $oldImage = null)
    {
        $model = new ImageUpload();

        if (Yii::$app->request->isPost)
        {
            $file = UploadedFile::getInstance($model, 'image');
            $cropInfo = Yii::$app->request->post('ImageUpload')['crop_info'];

            return $this->redirect(['pages/'. $actionName, 'image' => $model->uploadFile($file, $oldImage, $cropInfo)]);
        }

        return $this->render('set-image', [
            'model' => $model,
            'width' => $width,
            'height' => $height,
        ]);
    }

    public function actionSetDoc($actionName, $oldDoc = null)
    {
        $model = new DocumentUpload();

        if (Yii::$app->request->isPost)
        {
            $file = UploadedFile::getInstance($model, 'document');

            return $this->redirect(['pages/'. $actionName, 'doc' => $model->uploadFile($file, $oldDoc)]);
        }

        return $this->render('upload-document', [
            'model' => $model,
        ]);
    }


}
