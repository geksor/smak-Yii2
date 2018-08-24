<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ImageUpload */
/* @var $parentModel backend\models\News */

$this->title = 'Выбор изображения: ' . $parentModel->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $parentModel->title, 'url' => ['view', 'id' => $parentModel->id]];
$this->params['breadcrumbs'][] = 'Выбор изображения';
?>
<div class="news-set-image">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-image', [
        'model' => $model,
    ]) ?>


</div>
