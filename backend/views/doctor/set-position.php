<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $doctor backend\models\Doctor */
/* @var $positionDoctor backend\models\PositionDoctor */
/* @var $selectedPositions[] backend\models\Doctor */
/* @var $positions[] backend\models\Position */

$this->title = 'Выбор должности: ' . $doctor->name;
$this->params['breadcrumbs'][] = ['label' => 'Специалисты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $doctor->name, 'url' => ['view', 'id' => $doctor->id]];
$this->params['breadcrumbs'][] = 'Выбор должности';
?>
<div class="doctor-set-position">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?// $params = ['multiple' => true, 'selected' => $selectedPositions] ?>

<!--    --><?//= $form->field($doctor, 'positions')->dropDownList($positions, $params) ?>

    <?= Html::dropDownList('positions', $selectedPositions, $positions, [
        'class' => 'form-control',
        'multiple' => true,
        'style' => 'margin-bottom: 30px;'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
