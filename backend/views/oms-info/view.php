<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\OmsInfo */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oms-info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить запись?',
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
                'attribute' => 'text',
                'format' => 'html',
                'value' => function ($data){
                    return Html::tag('div', $data->text, ['class' => 'textWrap', 'style' => 'max-height: 400px']);
                }
            ],
            [
                'attribute' => 'publish',
                'label' => 'Состояние',
                'value' => function ($data){
                    if ($data->publish){
                        return 'Опубликовано';
                    }
                    return 'Не опубликовано';
                }
            ],
        ],
    ]) ?>

</div>
