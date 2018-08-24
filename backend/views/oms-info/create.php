<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\OmsInfo */

$this->title = 'Создание раздела информации';
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oms-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
