<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\OmsLink */

$this->title = 'Создание ссылки';
$this->params['breadcrumbs'][] = ['label' => 'Ссылки на документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oms-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
