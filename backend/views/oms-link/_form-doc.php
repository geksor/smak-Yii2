<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DocumentUpload */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oms-link-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'document')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
