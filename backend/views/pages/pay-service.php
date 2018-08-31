<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model \backend\models\PayServicePage */
/* @var $form ActiveForm */

$this->title = 'Страница Платные услуги';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="params-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="box box-success">
        <div class="box-body">
            <?= Html::a('Загрузить документ', ['set-doc', 'actionName' => 'pay-service', 'oldDoc' => $model->infoDocName], ['class' => 'btn btn-default', 'style' => 'margin: 20px 0']) ?>
            <?= Html::a(
            'Выбрать изображение',
                ['set-image',
                    'actionName' => 'pay-service',
                    'width' => 490,
                    'height' => 459,
                    'oldImage' => $model->infoImage,
                ],
                [
                    'class' => 'btn btn-default',
                    'style' => 'margin: 20px 0'
                ]) ?>

            <? if ($model->infoImage) {?>
                <div class="imgBlock">
                    <img src="/uploads/images/thumb_<?= $model->infoImage ?>" alt="infoImage">
                </div>
            <?}?>

            <? if ($model->infoDocName) {?>
                <p class="docBlock" style="margin-top: 30px">
                    <a href="/uploads/documents/<?= $model->infoDocName ?>" target="_blank" title="Просмотр документа">
                        Ссылка на документ
                    </a>
                </p>
            <?}?>


            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'infoDocName')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'infoImage')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'pageTitle') ?>
                <?= $form->field($model, 'infoTitle') ?>
                <?= $form->field($model, 'infoDescription')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'infoDocTitle') ?>
                <?= $form->field($model, 'infoList')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'advanced', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                        'height' => 400,
                        'resize_enabled' => true,
                    ],
                ]); ?>

            <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div><!-- index -->
