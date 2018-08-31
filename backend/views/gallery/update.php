<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Gallery */

$this->title = 'Редактирование галереи: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Галереи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="gallery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
