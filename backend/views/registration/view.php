<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Registration */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заявки на запись', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'email:ntext',
            'tel',
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
//            'viewed',
        ],
    ]) ?>

</div>
