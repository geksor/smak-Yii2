<?php
/* @var $this yii\web\View */
/* @var $models \backend\models\ServiceType */

$this->title = 'Платные услуги';
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
                <div class="payService__contentBlock">
                    <h2 class="payService__title">Платные сервисные услуги</h2>
                    <h3 class="contentBlock__title">
                        Пациент оплачивает только за применения дополнительных сервисных услуг, не
                        предусмотренными стандартными мед.помощи ОМС:
                    </h3>
                    <ul class="contentBlock__list">
                        <li>
                            Привлечение в лечебный процесс по контракту высококвалифицированных специалистов
                            (профессоров, доцентов ,КМН и других специалистов), которые не входят в штаты ,
                            предусмотренные ОМС,
                        </li>
                        <li>
                            Установление усиленных постов мед.персонала (врачей, медсестер,санитарок), не
                            предусмотренных в штаты ОМС,
                        </li>
                        <li>
                            Дополнительное 6 разовое питание,превышающие нормативы предусмотренные ОМС,
                        </li>
                        <li>
                            Применение лекарственных препаратов, не входящих в перечень жизненно необходимых и
                            важных.
                        </li>
                        <li>
                            Обеспечение высокого комфорта пребывания в центре.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="payServiceInfoImg col-12 col-lg-5 col-xl-4">
                <div class="imgWrap">
                    <img src="/public/images/21.jpg" alt="payServiceImg">
                </div>
            </div>
        </div>
        <a href="#" class="gvnpLink">
            Государственный реестр предельных отпускных цен производителей на лекарственные препараты, <br>
            включенные в перечень жизненно необходимых и важнейших лекарственных препаратов (по состоянию на 25.03.2015)
        </a>
    </div>
</div>

