<?php

use yii\helpers\Html;
use yiister\adminlte\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServiceTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Виды услуг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новый вид', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-primary">
        <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

            //            'id',
                        'title',
                        [
                            'attribute' => 'description',
                            'format' => 'html',
                            'value' => function ($data){
                                return Html::tag('div', $data->description, ['class' => 'textWrap', 'style' => 'max-height: 200px']);
                            }
                        ],
                        [
                            'attribute' => 'publish',
                            'label' => 'Публикация',
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
                        [
                            'label' => 'кол-во услуг',
                            'headerOptions' => ['width' => 50],
                            'contentOptions' => ['class' => 'text-center'],
                            'value' => function ($data){
                                return count($data->serviceItems);
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
                                        '/service-type/order',
                                        'id' => $data->id,
                                        'order' => $data->order - $intDown,
                                        'up' => true,
                                    ],
                                    ['class'=>'btn btn-default']);

                                $down = Html::a(
                                    '&#9660;',
                                    [
                                        '/service-type/order',
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
                            'headerOptions' => ['width' => 50],
                        ],
                    ],
                    "condensed" => true,
                    "hover" => true,

                    ]); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
