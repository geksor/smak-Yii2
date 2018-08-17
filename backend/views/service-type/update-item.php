<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ServiceItem */

$this->title = 'Редактирование: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => $model->type->title, 'url' => ['view', 'id' => $model->type->id]];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view-item', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="service-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-item', [
        'model' => $model,
    ]) ?>

</div>
