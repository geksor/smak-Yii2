<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Vacancy */

$this->title = 'Создание вакансии';
$this->params['breadcrumbs'][] = ['label' => 'Вакансии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
