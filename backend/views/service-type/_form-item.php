<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ServiceItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-item-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'type_id')->hiddenInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'day_count')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'publish')->checkbox() ?>

<!--    --><?//= $form->field($model, 'order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
