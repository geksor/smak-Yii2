<?php

use yii\helpers\Html;
use yiister\adminlte\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\OmsLinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ссылки на документы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oms-link-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать ссылку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

//                    'id',
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
//                    'order',
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
                                    ['class' => 'btn btn-danger col-xs-12']);
                            }
                            return Html::a('Опубликовать',
                                ['publish', 'id' => $data->id, 'publish' => true],
                                ['class' => 'btn btn-success col-xs-12']);
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
                "condensed" => true,
                "hover" => true,

            ]); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
