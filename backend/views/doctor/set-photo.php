<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ImageUpload */
/* @var $doctor backend\models\Doctor */

$this->title = 'Выбор фото: ' . $doctor->name;
$this->params['breadcrumbs'][] = ['label' => 'Специалисты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $doctor->name, 'url' => ['view', 'id' => $doctor->id]];
$this->params['breadcrumbs'][] = 'Выбор фото';
?>
<div class="doctor-set-photo">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-photo', [
        'model' => $model,
    ]) ?>


</div>
