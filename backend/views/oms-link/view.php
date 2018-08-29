<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\OmsLink */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ссылки на документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oms-link-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Загрузить документ', ['upload-document', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
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
                'attribute' => 'link',
                'format' => 'raw',
                'value' => function ($data){
                    if ($data->link){
                        return Html::a('Открыть документ', $data->documentLink, ['target' => '_blank', 'data-pjax' => 0]);
                    }
                    return 'Не загружен';
                },
            ],
            'publish',
        ],
    ]) ?>

</div>
