<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ServiceType */

$this->title = 'Создание вида услуги';
$this->params['breadcrumbs'][] = ['label' => 'Виды услуг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
