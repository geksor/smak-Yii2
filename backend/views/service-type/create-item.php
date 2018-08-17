<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ServiceItem */

$this->title = 'Создание услуги';
$this->params['breadcrumbs'][] = ['label' => $model->type->title, 'url' => ['view', 'id' => $model->type->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-item', [
        'model' => $model,
    ]) ?>

</div>
