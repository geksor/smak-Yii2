<?php

use yii\helpers\Html;
use yiister\adminlte\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegistrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки на запись';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-index markTr">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
                'rowOptions' => function($model, $key, $index, $grid){
                    if(!$model->viewed){
                        return ['class' => 'newRow'];
                    }
                    return null;
                },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//                'id',
                'name:ntext',
                'tel',
                'email:ntext',
                [
                    'attribute' => 'insurance',
                    'value' => function ($data){
                        return  preg_replace("#(\d{4})(\d{4})(\d{4})(\d{4})#","$1 $2 $3 $4",$data->insurance);
                    }
                ],
                [
                    'attribute' => 'date',
                    'headerOptions' => ['width' => '150'],
                    'format' => ['date', 'php:d.m.Y - H:i:s'],
                ],
                [
                    'attribute' => 'viewed',
                    'label' => 'Состояние',
                    'filter'=>[0=>"Не обработанные",1=>"Обработанные"],
                    'headerOptions' => ['width' => '170'],
                    'format' => 'raw',
                    'value' => function ($data){
                        if (!$data->viewed){
                            return Html::a('Обработать',
                                ['success', 'id' => $data->id, 'success' => true],
                                ['class' => 'btn btn-success col-xs-12']);
                        }
                        return 'Обработано';
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}'
                ],
            ],
            "condensed" => true,
            "hover" => true,
            ]); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
