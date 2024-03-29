<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServiceItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Service Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type_id',
            'title',
            'day_count',
            'price',
            //'publish',
            [
                'attribute' => 'order',
                'format' => 'raw',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
