<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Gallery */

$this->title = 'Создание галереи';
$this->params['breadcrumbs'][] = ['label' => 'Галереи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
