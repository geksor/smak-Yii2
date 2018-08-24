<?php

use yii\helpers\Html;
use yiister\adminlte\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'id',
                'title:ntext',
                [
                    'attribute' => 'short_text',
                    'format' => 'html',
                    'value' => function ($data){
                        return Html::tag('div', $data->short_text, ['class' => 'textWrap', 'style' => 'max-height: 400px']);
                    }
                ],
//                'full_text:ntext',
                [
                    'format' => 'html',
                    'label' => 'Фото',
                    'value' => function ($data)
                    {
                        return Html::img($data->thumbImage, ['width' => 100]);
                    },
                ],
                //'create_date',
                [
                    'attribute' => 'publish_start',
                    'headerOptions' => ['width' => '100'],
                    'format' => ['date', 'php:d.m.Y'],
                ],
                [
                    'attribute' => 'publish_end',
                    'headerOptions' => ['width' => '100'],
                    'format' => ['date', 'php:d.m.Y'],
                ],
                [
                    'attribute' => 'publish',
                    'label' => 'Состояние',
                    'filter'=>[0=>"Не опубликованные",1=>"Опубликованные"],
                    'headerOptions' => ['width' => '170'],
                    'format' => 'raw',
                    'value' => function ($data){
                        if ($data->publish){
                            return Html::a('Снять с публикации',
                                ['publish', 'id' => $data->id, 'publish' => false],
                                ['class' => 'btn btn-danger col-xs-12']);
                        }
                        return Html::a('Опубликовать',
                            ['publish', 'id' => $data->id, 'publish' => true],
                            ['class' => 'btn btn-success col-xs-12']);
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'headerOptions' => ['width' => 50]
                ],
            ],
            "condensed" => true,
            "hover" => true,
            ]); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
