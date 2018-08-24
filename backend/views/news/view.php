<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Выбрать изображение', ['set-image', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить новость?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title:ntext',
            [
                'attribute' => 'short_text',
                'format' => 'html',
                'value' => function ($data){
                    return Html::tag('div', $data->short_text, ['class' => 'textWrap', 'style' => 'max-height: 400px']);
                }
            ],
            [
                'attribute' => 'full_text',
                'format' => 'html',
                'value' => function ($data){
                    return Html::tag('div', $data->full_text, ['class' => 'textWrap', 'style' => 'max-height: 400px']);
                }
            ],
            [
                'format' => 'html',
                'label' => 'Фото',
                'value' => function ($data)
                {
                    return Html::img($data->thumbimage, ['width' => 200]);
                },
            ],
            [
                'attribute' => 'create_date',
                'headerOptions' => ['width' => '150'],
                'format' => ['date', 'php:d.m.Y'],
            ],
            [
                'attribute' => 'publish_start',
                'headerOptions' => ['width' => '150'],
                'format' => ['date', 'php:d.m.Y'],
            ],
            [
                'attribute' => 'publish_end',
                'headerOptions' => ['width' => '150'],
                'format' => ['date', 'php:d.m.Y'],
            ],
            [
                'attribute' => 'publish',
                'label' => 'Состояние',
                'value' => function ($data){
                    if ($data->publish){
                        return 'Опубликован';
                    }
                    return 'Не опубликован';
                }
            ],
        ],
    ]) ?>

</div>
