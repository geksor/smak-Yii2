<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model \backend\models\ReminderPage */
/* @var $form ActiveForm */

$this->title = 'Страница Памятка пациенту';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="params-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="box box-success">
        <div class="box-body">
            <?= Html::a('Загрузить документ', ['set-doc', 'actionName' => 'reminder', 'oldDoc' => $model->rulesDocName], ['class' => 'btn btn-default', 'style' => 'margin: 20px 0']) ?>

            <? if ($model->rulesDocName) {?>
                <p class="docBlock">
                    <a href="/uploads/documents/<?= $model->rulesDocName ?>" target="_blank" title="Просмотр документа">
                        Ссылка на документ
                    </a>
                </p>
            <?}?>

            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'rulesDocName')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'pageTitle') ?>
                <?= $form->field($model, 'rulesTitle') ?>
                <?= $form->field($model, 'rulesDescription')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'rulesDocTitle') ?>
                <?= $form->field($model, 'director') ?>
                <?= $form->field($model, 'rulesList')->widget(CKEditor::className(),[
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
