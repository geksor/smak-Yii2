<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yiister\adminlte\widgets\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\ServiceItem */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => $model->type->title, 'url' => ['view', 'id' => $model->type->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-view-item">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактироваать', ['update-item', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete-item', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => "Вы действительно хотите удалить запись?",
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <? try {?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'day_count',
            'price',
            [
                'attribute' => 'publish',
                'label' => 'Состояние',
                'value' => $model->getPublishState(),
            ],
            'order',
        ],
    ]) ?>
    <?}catch (Exception $exception){}?>

</div>
