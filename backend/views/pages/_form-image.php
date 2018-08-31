<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bupy7\cropbox\CropboxWidget;

/* @var $this yii\web\View */
/* @var $model */
/* @var $width */
/* @var $height */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imagePages-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'image')->widget(CropboxWidget::className(), [
        'croppedDataAttribute' => 'crop_info',
        'pluginOptions' => [
            'variants' => [
                [
                    'width' => $width,
                    'height' => $height
                ],
            ]
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
