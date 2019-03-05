<?php
/* @var $this yii\web\View */
/* @var $model \backend\models\Doctor */

$this->title = $model->name;
?>

<div class="container personalContainer">
    <div class="personalImgWrap">
        <div class="paddingBlock">
            <a href="<?= $model->getPhoto() ?>" data-fancybox="personal" data-caption="<?= $model->name ?>">
                <?= \yii\helpers\Html::img($model->getThumbPhoto(), ['alt' => $model->name])?>
            </a>
        </div>
    </div>
    <h1 class="pageTitle personalTitle"><?= $this->title ?></h1>
    <h2 class="personalPosition"><?= $model->getPositionsTitle() ?></h2>
    <p class="personalDescription" style="margin-top: 10px"><?= $model->info ?></p>
    <p class="personalDescription" style="margin-top: 10px"><?= $model->diplom ?></p>
    <div style="clear: both"></div>
</div>