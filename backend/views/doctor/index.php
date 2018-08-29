<?php

use yii\helpers\Html;
use yiister\adminlte\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DoctorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="doctor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить сотрудника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-primary">
        <div class="box-body">
            <?try {?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

        //            'id',
                    'name',
                    [
                        'format' => 'html',
                        'label' => 'Фото',
                        'value' => function ($data)
                        {
                            return Html::img($data->getThumbPhoto(), ['width' => 100]);
                        },
                    ],
                    [
                        'attribute' => 'positionTitle',
                        'label' => 'Должность',
                        'value' => function ($data)
                        {
                            return $data->getPositionsTitle();
                        }
                    ],
        //            'info:ntext',
                    'diplom:ntext',
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
                        'attribute' => 'order',
                        'format' => 'raw',
                        'headerOptions' => ['width' => 50],
                        'value' => function ($data){
                            $intDown = $data->order > 1 ? 1 : 0;
                            $up = Html::a(
                                '&#9650;',
                                [
                                    'order',
                                    'id' => $data->id,
                                    'order' => $data->order - $intDown,
                                    'up' => true,
                                ],
                                ['class'=>'btn btn-default']);

                            $down = Html::a(
                                '&#9660;',
                                [
                                    'order',
                                    'id' => $data->id,
                                    'order' => $data->order + 1,
                                    'up' => false,
                                ],
                                ['class'=>'btn btn-default']);

                            return $up.$down;
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
                "condensed" => true,
                "hover" => true,
                ]); ?>
        <?}catch (Exception $exception){}?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
