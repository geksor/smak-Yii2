<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'short_text')->textarea(['rows' => 6, 'maxlength' => true]); ?>

    <?= $form->field($model, 'full_text')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
            'height' => 400,
            'resize_enabled' => true,
        ],
    ]); ?>

    <?= $form->field($model, 'publish_start')->widget(DateTimePicker::className(),[
        'name' => 'dp_1',
        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
        'options' => ['placeholder' => 'Ввод даты...'],
        'convertFormat' => true,
        'value'=> $model->publish_start,
        'pluginOptions' => [
            'format' => 'dd.MM.yyyy',
            'autoclose'=>true,
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => '01.05.2015 00:00', //самая ранняя возможная дата
            'todayBtn'=>true, //снизу кнопка "сегодня"
            'minView'=>2,
        ]
    ]) ?>

    <?= $form->field($model, 'publish_end')->widget(DateTimePicker::className(),[
        'name' => 'dp_1',
        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
        'options' => ['placeholder' => 'Ввод даты...'],
        'convertFormat' => true,
        'value'=> $model->publish_end,
        'pluginOptions' => [
            'format' => 'dd.MM.yyyy',
            'autoclose'=>true,
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => '01.05.2015 00:00', //самая ранняя возможная дата
            'todayBtn'=>true, //снизу кнопка "сегодня"
            'minView'=>2,
        ]
    ]) ?>

    <?= $form->field($model, 'publish')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
