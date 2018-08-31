<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Params */
/* @var $form ActiveForm */

$this->title = 'Страница О нас';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="params-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="box box-success">
        <div class="box-body">
            <?= Html::a(
                    'Выбрать изображение',
                    [
                        'set-image',
                        'actionName' => 'about',
                        'width' => 1530,
                        'height' => 500,
                        'oldImage' => $model->pageImage,
                    ],
                    [
                        'class' => 'btn btn-default',
                        'style' => 'margin: 20px 0',
                    ]) ?>

            <div class="imgBlock">
                <img src="/uploads/images/thumb_<?= $model->pageImage ?>" alt="pageImage">
            </div>

            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'pageImage')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'pageTitle') ?>
                <?= $form->field($model, 'shortAbout')->textarea(['rows' => 6, 'maxlength' => true]) ?>
                <?= $form->field($model, 'aboutText')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                        'height' => 400,
                        'resize_enabled' => true,
                    ],
                ]); ?>
                <?= $form->field($model, 'galleryId') ?>
                <?= $form->field($model, 'certificateId') ?>

            <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div><!-- index -->
