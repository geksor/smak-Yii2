<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Doctor */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Добавить должность', ['set-position', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Выбрать фото', ['set-photo', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('График', ['set-table', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить сотрудника?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'positionsTitle',
                'value' => $model->getPositionsTitle(),
            ],
            [
                'format' => 'html',
                'label' => 'Фото',
                'value' => function ($data)
                {
                    return Html::img($data->getThumbPhoto(), ['width' => 200]);
                },
            ],
            'info:ntext',
            'diplom:ntext',
            [
                'label' => 'График приема',
                'value' => $model->table->table_pay,
            ],
            [
                'label' => 'По ОМС',
                'value' => $model->table->table_oms,
            ],
            [
                'label' => 'Состояние',
                'attribute' => 'publish',
                'value' => $model->getPublishState(),
            ],
        ],
    ]) ?>
</div>
