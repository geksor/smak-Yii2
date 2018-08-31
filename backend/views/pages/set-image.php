<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ImageUpload */
/* @var $width */
/* @var $height */
/* @var $parentModel */

$this->title = 'Выбор изображения: ';
?>
<div class="pages-set-image">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-image', [
        'model' => $model,
        'width' => $width,
        'height' => $height,
    ]) ?>


</div>
