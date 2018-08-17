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

    <? try {?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'publish',
                'label' => 'Состояние'
            ],
//            'order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        "condensed" => true,
        "hover" => true,

        ]); ?>
    <?}catch (Exception $exception){}?>
    <?php Pjax::end(); ?>
</div>
