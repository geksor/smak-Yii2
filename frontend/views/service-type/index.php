<?php
/* @var $this yii\web\View */
/* @var $models \backend\models\ServiceType */

$this->title = 'Виды услуг';
?>
<div class="container">
    <h1 class="pageTitle"><?= $this->title ?></h1>
    <div class="toggleBlockWrap_servTipe">
        <? if ($models) {?>
            <?foreach ($models as $model) {?>
                <div class="toggleBlock" id="serv_<?= $model->id?>">
                    <div class="toggleBock__header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <h2 class="toggleBlock__title"><?= $model->title ?></h2>
                            </div>
                            <div class="col-auto toggle__ico">+</div>
                        </div>
                    </div>
                    <div class="toggleBlock__toggle toggleBlock__toggle_text" style="display: none">
                        <?= $model->description ?>
                    </div>
                </div>
            <?}?>
        <?}?>
    </div>
</div>

