<?php

use yii\helpers\Html;
use yiister\adminlte\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index markTr">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать отзыв', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'rowOptions' => function($model, $key, $index, $grid){
                    if(!$model->viewed){
                        return ['class' => 'newRow'];
                    }
                    if ($model->viewed === 1){
                        return ['class' => 'noReadRow'];
                    }
                    return null;
                },
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //            'id',
                    'user_name',
                    'text:ntext',
                    [
                        'attribute' => 'date',
                        'headerOptions' => ['width' => '150'],
                        'format' => ['date', 'php:d.m.Y - H:i:s'],
                    ],
                    //            'email:ntext',
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
                                    ['class' => 'btn btn-default col-xs-12']);
                            }
                            return Html::a('Опубликовать',
                                ['publish', 'id' => $data->id, 'publish' => true],
                                ['class' => 'btn btn-success col-xs-12']);
                        }
                    ],
                    //'viewed',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
                "condensed" => true,
                "hover" => true,
            ]); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
