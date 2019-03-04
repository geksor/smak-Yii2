<?php
/* @var $this yii\web\View */
/* @var $models \backend\models\Doctor[] */

$this->title = 'Специалисты нашего центра';
?>
<div class="container">
    <h1 class="pageTitle"><?= $this->title ?></h1>
    <div class="personalWrap">
        <? if ($models != null) {?>
                <div class="row">
                    <?foreach ($models as $model) {?>
                        <div class="col-12 col-lg-6 col-xl-4">
                            <div class="personalBlock">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <div class="personalImg">
                                            <?= \yii\helpers\Html::img($model->getThumbPhoto(), ['alt' => $model->name])?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="personalText">
                                            <p class="name"><?= $model->name ?></p>
                                            <p class="job">
                                                <?= $model->getPositionsTitle() ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?= \yii\helpers\Html::a('', ['view', 'id' => $model->id], ['class' => 'personalLink']) ?>
                            </div>
                        </div>
                    <?}?>
                </div>
        <?}else{?>
            <p>Нет ни одного специалиста</p>
        <?}?>
    </div>
</div>