<?php

use yii\helpers\Html;
use yiister\adminlte\widgets\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Должности';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="position-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать должность', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?try {?>
    <?= \yiister\adminlte\widgets\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        "condensed" => true,
        "hover" => true,
    ]); ?>
    <?}catch (Exception $exception){
        echo 'Не найден виджет';
    }?>
    <?php Pjax::end(); ?>
</div>
