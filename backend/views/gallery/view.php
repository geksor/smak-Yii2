<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use zxbodya\yii2\galleryManager\GalleryManager;

/* @var $this yii\web\View */
/* @var $model backend\models\Gallery */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Галереи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'При удалении галереи будут удалены все изображения относящиеся к ней. Продолжить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
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
            'imageWidth',
            'imageHeight',
        ],
    ]) ?>

    <div class="box box-primary">
        <div class="box-body">
            <? if ($model->isNewRecord) {
            echo 'Нельзя загружать изображения до создания галлереи';
        } else {
            echo GalleryManager::widget(
                [
                    'model' => $model,
                    'behaviorName' => 'galleryBehavior',
                    'apiRoute' => 'gallery/galleryApi'
                ]
            );
        }?>
        </div>
    </div>

</div>
