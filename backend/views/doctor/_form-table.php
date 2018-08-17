<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Table */
/* @var $doctor backend\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="table-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'doctor_id')->hiddenInput(['value' => $doctor->id]) ?>

    <?= $form->field($model, 'table_pay')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'table_oms')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Установить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
