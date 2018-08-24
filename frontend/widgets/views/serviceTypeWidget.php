<?php
/* @var $models \backend\models\News */
/* @var $countQuery \frontend\widgets\ServiceTypeWidget */

?>

<? if ($models) {?>
    <div class="serviceTypeLine">
        <div class="container">
            <div class="row justify-content-between headerRow">
                <div class="col-auto">
                    <h2 class="serviceType__title">Виды услуг</h2>
                </div>
                <div class="col-auto">
                    <div class="serviceType__navBlock">
                    </div>
                </div>
            </div>
            <div class="service_Slider">
                <? foreach ($models as $key => $model) {?>
                    <? $number = $key+1 ?>
                    <? if ($number%2 !== 0) {?>
                        <div class="service_slideBlock">
                    <?}?>
                        <div class="service_slide">
                            <div class="slideNumber"><?= $number < 10 ? '0'.$number : $number ?></div>
                            <div class="slideTitle"><?= $model->title ?></div>
                            <div class="slideText">
                                <?= $model->short_description ?>
                            </div>
                            <div class="slideMoreLink">
                                <a href="/service-type/index/#serv_<?= $model->id ?>" class="reedMore" title="Читать полностью">
                                    <span class="dots dots_first"></span>
                                    <span class="dots dots_second"></span>
                                    <span class="dots dots_last"></span>
                                </a>
                            </div>
                        </div>
                    <? if ($number%2 === 0 || $countQuery - 1 === $key) {?>
                        </div>
                    <?}?>
                <?}?>
            </div>
        </div>
    </div>
<?}?>


