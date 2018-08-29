<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yiister\adminlte\widgets\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\ServiceType */
/* @var $searchModel backend\models\ServiceItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Виды услуг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактироваать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => "При удалении данной записи будут удалены все связанные записи! \nПродолжить?",
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
            [
                'attribute' => 'description',
                'format' => 'html',
                'value' => function ($data){
                    return Html::tag('div', $data->description, ['class' => 'textWrap', 'style' => 'max-height: 400px']);
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
//            'order',
        ],
    ]) ?>
    <?}catch (Exception $exception){}?>

    <div class="service-item-index">

        <h2>Услуги</h2>
        <?php Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Создать услугу', ['create-item', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        </p>

        <? try {?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//            'id',
                    'title',
                    'day_count',
                    'price',
                    [
                        'attribute' => 'publish',
                        'label' => 'Публикация',
                        'filter'=>[0=>"Не опубликованные",1=>"Опубликованные"],
                        'headerOptions' => ['width' => '170'],
                        'format' => 'raw',
                        'value' => function ($data){
                            if ($data->publish){
                                return Html::a('Снять с публикации',
                                    ['publish-item', 'id' => $data->id, 'publish' => false],
                                    ['class' => 'btn btn-default col-xs-12']);
                            }
                            return Html::a('Опубликовать',
                                ['publish-item', 'id' => $data->id, 'publish' => true],
                                ['class' => 'btn btn-success col-xs-12']);
                        }
                    ],
                    [
                        'attribute' => 'order',
                        'format' => 'raw',
                        'headerOptions' => ['width' => 50],
                        'value' => function ($data){
                            $intDown = $data->order > 1 ? 1 : 0;
                            $up = Html::a(
                                '&#9650;',
                                [
                                    '/service-type/order-item',
                                    'id' => $data->id,
                                    'order' => $data->order - $intDown,
                                    'up' => true,
                                ],
                                ['class'=>'btn btn-default']);

                            $down = Html::a(
                                '&#9660;',
                                [
                                    '/service-type/order-item',
                                    'id' => $data->id,
                                    'order' => $data->order + 1,
                                    'up' => false,
                                ],
                                ['class'=>'btn btn-default']);

                            return $up.$down;
                        }
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'buttons' => [
                          'view' => function($url, $model, $key){
                                $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-eye-open"]);
                                return Html::a($icon, 'view-item?id='.$key);
                          },
                          'update' => function($url, $model, $key){
                                $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-pencil"]);
                                return Html::a($icon, 'update-item?id='.$key);
                          },
                          'delete' => function($url, $model, $key){
                                $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-trash"]);
                                return Html::a($icon, 'delete-item?id='.$key);
                          },
                        ],
                    ],
                ],
                "condensed" => true,
                "hover" => true,
            ]); ?>
        <?}catch (Exception $exception){echo $exception->getMessage();}?>
        <?php Pjax::end(); ?>
    </div>


</div>
