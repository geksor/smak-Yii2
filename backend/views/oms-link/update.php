<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OmsLink */

$this->title = 'Редактирование: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ссылки на документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="oms-link-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
