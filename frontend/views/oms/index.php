<?php
/* @var $this yii\web\View */
/* @var $links \backend\models\OmsLink */
/* @var $info \backend\models\OmsInfo */
/* @var $col_12 \frontend\controllers\OmsController */
/* @var $linksCount \frontend\controllers\OmsController */

$this->title = 'ОМС'
?>
<div class="container">
    <h1 class="pageTitle"><?= $this->title ?></h1>
    <div class="omsDocLinkWrap">
        <div class="row">

            <? if ($links) {?>
                <? foreach ($links as $key => $link) {?>
                    <div class="omsDocLinkBlock col-12 <?= ($col_12 && $linksCount - 1 == $key) ? ' col-lg-12' : 'col-lg-6';?>">
                        <a href="/uploads/documents/<?= $link->link ?>" target="_blank" class="omsDocLink">
                            <?= $link->title ?>
                        </a>
                    </div>
                <?}?>
            <?}?>

        </div>
    </div>
    <div class="toggleBlockWrap_oms">

        <? if ($info) {?>
            <? foreach ($info as $value) {?>
                <div class="toggleBlock">
                    <div class="toggleBock__header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <h2 class="toggleBlock__title"><?= $value->title ?></h2>
                            </div>
                            <div class="col-auto toggle__ico">+</div>
                        </div>
                    </div>
                    <div class="toggleBlock__toggle toggleBlock__toggle_text" style="display: none">
                        <?= $value->text ?>
                    </div>
                </div>
            <?}?>
        <?}?>

    </div>
</div>

