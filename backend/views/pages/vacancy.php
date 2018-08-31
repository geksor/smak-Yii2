<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model \backend\models\VacancyPage */
/* @var $form ActiveForm */

$this->title = 'Страница Вакансии';
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
                        'actionName' => 'vacancy',
                        'width' => 1530,
                        'height' => 500,
                        'oldImage' => $model->pageImage,
                    ],
                    [
                        'class' => 'btn btn-default',
                        'style' => 'margin: 20px 0'
                    ]) ?>

            <? if ($model->pageImage) {?>
                <div class="imgBlock">
                    <img src="/uploads/images/thumb_<?= $model->pageImage ?>" alt="pageImage">
                </div>
            <?}?>

            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'pageImage')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'pageTitle') ?>

            <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div><!-- index -->
