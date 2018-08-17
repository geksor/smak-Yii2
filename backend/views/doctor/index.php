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
            //'publish',
            //'order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        "condensed" => true,
        "hover" => true,
        ]); ?>
    <?}catch (Exception $exception){}?>
    <?php Pjax::end(); ?>
</div>
