<?php
/* @var $this yii\web\View */
/* @var $models \backend\models\ServiceType */

$this->title = Yii::$app->params['PayServicePage']['pageTitle'];
?>
<div class="container">
    <h1 class="pageTitle"><?= $this->title ?></h1>
        <? if ($models != null) {?>
            <div class="toggleBlockWrap_payService">
                <?foreach ($models as $model) {?>
                <? if ($model->serviceItems) {?>
                    <div class="toggleBlock">
                        <div class="toggleBock__header">
                            <div class="row justify-content-between align-items-center">
                                <div class="col">
                                    <h2 class="toggleBlock__title"><?= $model->title ?></h2>
                                </div>
                                <div class="col-auto toggle__ico">+</div>
                            </div>
                        </div>
                        <div class="toggleBlock__toggle" style="display: none">
                            <div class="row tableHead">
                                <div class="servTipe col-5 col-sm-6">Вид услуги</div>
                                <div class="dayCount col-3 col-sm-3">Кол-во к/д</div>
                                <div class="servPrice col-4 col-sm-3">Стоимость, руб</div>
                            </div>
                            <? foreach ($model->serviceItems as $item) {?>
                                <div class="row tableRow">
                                    <div class="servTipe col-5 col-sm-6"><?= $item->title ?></div>
                                    <div class="dayCount col-3 col-sm-3"><?= $item->day_count ?></div>
                                    <div class="servPrice col-4 col-sm-3">
                                        <?= number_format($item->price, null, null, ' ') ?>
                                    </div>
                                </div>
                            <?}?>
                        </div>
                    </div>
                <?}?>
                <?}?>
            </div>
        <?}?>
    <div class="payServiceLine servicePayLine_page">
        <div class="row justify-content-center justify-content-lg-between">
            <div class="col-12 col-lg-7 col-xl-8">
                <div class="payService__contentBlock contentBlock__list">
                    <h2 class="payService__title"><?= Yii::$app->params['PayServicePage']['infoTitle'] ?></h2>
                    <h3 class="contentBlock__title">
                        <?= Yii::$app->params['PayServicePage']['infoDescription'] ?>
                    </h3>
                    <?= Yii::$app->params['PayServicePage']['infoList'] ?>
                </div>
            </div>
            <div class="payServiceInfoImg col-12 col-lg-5 col-xl-4">
                <div class="imgWrap">
                    <img src="/uploads/images/thumb_<?= Yii::$app->params['PayServicePage']['infoImage'] ?>" alt="payServiceImg">
                </div>
            </div>
        </div>
        <a href="/uploads/documents/<?= Yii::$app->params['PayServicePage']['infoDocName'] ?>" target="_blank" class="gvnpLink">
            <?= Yii::$app->params['PayServicePage']['infoDocTitle'] ?>
        </a>
    </div>
</div>

