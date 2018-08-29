<?php
/* @var $this yii\web\View */
/* @var $models \backend\models\Reminder */

$this->title = 'Памятка пациенту';
?>

<div class="container">
    <h1 class="pageTitle"><?= $this->title ?></h1>
    <div class="toggleBlockWrap_reminder">
        <? if ($models) {?>
            <? foreach ($models as $model) {?>
                <div class="toggleBlock">
                    <div class="toggleBock__header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <h2 class="toggleBlock__title"><?= $model->title ?></h2>
                            </div>
                            <div class="col-auto toggle__ico">+</div>
                        </div>
                    </div>
                    <div class="toggleBlock__toggle toggleBlock__toggle_text" style="display: none">
                        <?= $model->text ?>
                    </div>
                </div>
            <?}?>
        <?}?>
    </div>
    <div class="payServiceLine servicePayLine_rules">
        <div class="payService__contentBlock">
            <h2 class="payService__title rules__title">
                Правила предоставления платных медицинских услуг
                в ООО «Северокавказская медико-хирургическая академия»для застрахованных
                в страховых компаниях ОМС
            </h2>
            <h3 class="contentBlock__title">
                В Центре пациенты застрахованные в страховых компаниях ОМС имеют право получать бесплатную медицинскую помощь в объемах, предусмотренных в программе ОМС.
                Пациент оплачивает только за применения дополнительных сервисных услуг, не предусмотренными стандартами мед. помощи ОМС:
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
            <p class="contentBlock__title bottom">Главный врач ООО «Северокавказская медико-хирургическая академия»	           3.0. Алиев</p>
        </div>
        <a href="#" class="gvnpLink reminder">
            Государственный реестр предельных отпускных цен производителей на лекарственные препараты, <br>
            включенные в перечень жизненно необходимых и важнейших лекарственных препаратов (по состоянию на 25.03.2015)
        </a>
    </div>
</div>
