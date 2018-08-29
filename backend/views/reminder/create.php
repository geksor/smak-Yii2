<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reminder */

$this->title = 'Создание памятки';
$this->params['breadcrumbs'][] = ['label' => 'Памятки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reminder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
