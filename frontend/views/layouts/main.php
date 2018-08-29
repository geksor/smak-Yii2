<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\PublicAsset;

PublicAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="menu" class="menu slideout-menu slideout-menu-left">
    <div class="left_menu">
    </div>
</div>
<div id="panel" class="wrapper panel slideout-panel slideout-panel-left page
    <?= Yii::$app->session->hasFlash('mess')? 'panel-open' : '' ?>">

    <header class="header<?= Yii::$app->request->url == Yii::$app->homeUrl ? '' : ' otherPage' ?>">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="btn_mobile col-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         width="32px"
                         height="28px" viewBox="0 0 32 28">
                        <rect x="0" y="0" width="32" height="4"></rect>
                        <rect x="0" y="12" width="32" height="4"></rect>
                        <rect x="0" y="24" width="32" height="4"></rect>
                    </svg>
                </div>
                <div class="header__logoWrap col-3 col-sm-2 col-lg-1 col-xl-auto">
                    <a href="/" class="logoLink"  title="На главную">
                        <img src="/public/images/logo.png" srcset="/public/images/logo@2x.png 2x, /public/images/logo@3x.png 3x" alt="Логотип">
                    </a>
                </div>
                <div class="col-auto header__mainMenuWrap menuWrap">
                    <?= \frontend\widgets\HeaderMenu::widget(
                            [
                                'items' => [
                                    ['label' => 'Платные услуги', 'url' => ['/pay-service/index'], 'options' => ['class' => 'col-auto']],
                                    ['label' => 'Памятка пациенту', 'url' => ['/reminder/index'], 'options' => ['class' => 'col-auto']],
                                    [
                                        'label' => 'ОМС',
                                        'url' => ['/oms/index'],
                                        'options' => ['class' => 'col-auto'],
                                        'items' => [
                                            ['label' => 'Виды услуг', 'url' => ['/service-type/index']],
                                            ['label' => 'Расписание приема', 'url' => ['/table/index']],
                                        ],
                                    ],
                                    ['label' => 'Врачи', 'url' => ['/doctors/index'], 'options' => ['class' => 'col-auto']],
                                    ['label' => 'Новости', 'url' => ['/news/index'], 'options' => ['class' => 'col-auto']],
                                    ['label' => 'Отзывы', 'url' => ['/comments/index'], 'options' => ['class' => 'col-auto']],
                                    [
                                        'label' => 'О клинике',
                                        'url' => ['/about/index'],
                                        'options' => ['class' => 'col-auto'],
                                        'items' => [
                                            ['label' => 'Вакансии', 'url' => ['/vacancy/index']],
                                        ],
                                    ],
                                ]
                            ]
                    ) ?>
                </div>
                <div class="col-auto col-lg-12 col-xl-auto">
                    <div class="row align-items-center justify-content-end justify-content-xl-start">
                        <div class="header__searchButtonWrap col-auto">
                            <button class="header__searchButton">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px">
                                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                          d="M23.843,21.667 L18.803,16.595 C20.029,14.879 20.701,12.831 20.701,10.675 C20.701,7.958 19.650,5.404 17.740,3.482 C15.831,1.561 13.292,0.501 10.590,0.501 C7.890,0.501 5.350,1.559 3.441,3.482 C1.532,5.402 0.480,7.957 0.480,10.675 C0.480,13.392 1.531,15.947 3.441,17.870 C5.350,19.790 7.889,20.849 10.590,20.849 C12.733,20.849 14.767,20.175 16.471,18.941 L21.512,24.012 C21.836,24.337 22.256,24.498 22.678,24.498 C23.100,24.498 23.521,24.337 23.843,24.012 C24.487,23.365 24.487,22.314 23.843,21.667 ZM5.773,15.524 C4.486,14.228 3.778,12.505 3.778,10.675 C3.778,8.845 4.486,7.122 5.773,5.827 C7.060,4.531 8.770,3.818 10.590,3.818 C12.410,3.818 14.122,4.531 15.409,5.827 C16.695,7.122 17.404,8.845 17.404,10.675 C17.404,12.505 16.696,14.227 15.409,15.524 C14.121,16.819 12.411,17.531 10.590,17.531 C8.769,17.530 7.058,16.818 5.773,15.524 Z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="header__phoneWrap col-auto col-xl">
                            <a href="tel:+79286720303" class="header__phone textPhone">8 (928) 672 03 03</a>
                            <a href="tel:+79286720303" class="header__phone svg">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24pt" height="24pt"
                                        viewBox="0 0 24 24" version="1.1">
                                    <path style=" stroke:none;fill-rule:evenodd;fill:rgb(100%,100%,100%);fill-opacity:1;" d="M 23.949219 18.597656 C 23.882812 18.390625 23.453125 18.089844 22.65625 17.691406 C 22.441406 17.570312 22.132812 17.398438 21.734375 17.183594 C 21.335938 16.964844 20.976562 16.765625 20.652344 16.585938 C 20.328125 16.402344 20.023438 16.226562 19.742188 16.058594 C 19.695312 16.023438 19.550781 15.921875 19.3125 15.757812 C 19.074219 15.59375 18.875 15.472656 18.707031 15.390625 C 18.542969 15.3125 18.382812 15.273438 18.222656 15.273438 C 17.996094 15.273438 17.710938 15.433594 17.371094 15.757812 C 17.03125 16.082031 16.71875 16.433594 16.433594 16.816406 C 16.148438 17.195312 15.847656 17.546875 15.53125 17.871094 C 15.210938 18.195312 14.949219 18.359375 14.746094 18.359375 C 14.644531 18.359375 14.515625 18.332031 14.363281 18.273438 C 14.207031 18.21875 14.089844 18.167969 14.011719 18.128906 C 13.933594 18.089844 13.796875 18.007812 13.601562 17.890625 C 13.410156 17.769531 13.300781 17.703125 13.277344 17.691406 C 11.722656 16.828125 10.386719 15.839844 9.273438 14.726562 C 8.160156 13.613281 7.167969 12.277344 6.304688 10.71875 C 6.292969 10.699219 6.230469 10.589844 6.109375 10.394531 C 5.992188 10.203125 5.910156 10.066406 5.871094 9.988281 C 5.832031 9.90625 5.78125 9.789062 5.726562 9.636719 C 5.667969 9.484375 5.640625 9.355469 5.640625 9.253906 C 5.640625 9.050781 5.804688 8.789062 6.125 8.46875 C 6.449219 8.152344 6.804688 7.851562 7.183594 7.566406 C 7.566406 7.28125 7.917969 6.96875 8.242188 6.628906 C 8.566406 6.289062 8.726562 6.003906 8.726562 5.777344 C 8.726562 5.617188 8.6875 5.457031 8.609375 5.289062 C 8.527344 5.125 8.40625 4.925781 8.242188 4.683594 C 8.078125 4.445312 7.976562 4.304688 7.941406 4.257812 C 7.773438 3.976562 7.597656 3.671875 7.414062 3.347656 C 7.230469 3.023438 7.035156 2.660156 6.816406 2.265625 C 6.601562 1.867188 6.429688 1.558594 6.304688 1.34375 C 5.910156 0.546875 5.605469 0.117188 5.402344 0.046875 C 5.324219 0.015625 5.203125 -0.00390625 5.042969 -0.00390625 C 4.738281 -0.00390625 4.335938 0.0546875 3.84375 0.167969 C 3.347656 0.28125 2.957031 0.402344 2.675781 0.523438 C 2.105469 0.765625 1.503906 1.457031 0.867188 2.605469 C 0.289062 3.671875 -0.00390625 4.730469 -0.00390625 5.777344 C -0.00390625 6.082031 0.0195312 6.382812 0.0585938 6.671875 C 0.0976562 6.960938 0.167969 7.289062 0.269531 7.652344 C 0.371094 8.015625 0.457031 8.285156 0.519531 8.460938 C 0.582031 8.636719 0.695312 8.953125 0.867188 9.40625 C 1.039062 9.863281 1.140625 10.140625 1.175781 10.242188 C 1.570312 11.355469 2.042969 12.351562 2.589844 13.226562 C 3.488281 14.679688 4.710938 16.183594 6.261719 17.738281 C 7.8125 19.289062 9.316406 20.511719 10.773438 21.410156 C 11.648438 21.957031 12.640625 22.425781 13.757812 22.824219 C 13.859375 22.859375 14.136719 22.960938 14.589844 23.132812 C 15.046875 23.304688 15.363281 23.417969 15.539062 23.484375 C 15.714844 23.546875 15.984375 23.628906 16.347656 23.730469 C 16.710938 23.832031 17.039062 23.902344 17.328125 23.941406 C 17.617188 23.980469 17.917969 24.003906 18.222656 24.003906 C 19.269531 24.003906 20.324219 23.710938 21.394531 23.132812 C 22.542969 22.496094 23.234375 21.894531 23.472656 21.324219 C 23.597656 21.042969 23.71875 20.652344 23.832031 20.15625 C 23.945312 19.664062 24.003906 19.261719 24.003906 18.957031 C 24.003906 18.796875 23.984375 18.675781 23.949219 18.597656 Z M 23.949219 18.597656 "/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <?= $content ?>
    </main>
    <footer class="footer relative">
        <div class="footer__leftBlock"></div>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="copyrightLine row align-items-center">
                        <div class="footer__logoWrap col-12 col-sm-auto">
                            <a href="/" class="logoLink" title="На главную">
                                <img src="/public/images/logo.png" srcset="/public/images/logo@2x.png 2x, /public/images/logo@3x.png 3x" alt="Логотип">
                            </a>
                        </div>
                        <div class="col-12 col-sm-9 col-lg">
                            <p class="copyright">
                                ОБЩЕСТВО С ОГРАНИЧЕННОЕЙ ОТВЕТСТВЕННОСТЬЮ
                                «Медицинский центр СМАК»
                                ВСЕ ПРАВА ЗАЩИЩЕНЫ (С)&nbsp;2018
                            </p>
                        </div>
                    </div>
                    <div class="weLinkWrap">
                        <a href="http://web-elitit.ru/">Design by ELIT-IT</a>
                    </div>
                </div>
                <div class="footer__menuWrap menuWrap col-5">
                    <div class="row">
                        <div class="col-6">
                            <?= \frontend\widgets\FooterMenu::widget(
                                [
                                    'items' => [
                                        ['label' => 'Платные услуги', 'url' => ['/pay-service/index']],
                                        ['label' => 'Памятка пациенту', 'url' => ['/reminder/index']],
                                        ['label' => 'ОМС', 'url' => ['/oms/index']],
                                        ['label' => 'Врачи', 'url' => ['/doctors/index']],
                                    ]
                                ]
                            ) ?>
                        </div>
                        <div class="col-6">
                            <?= \frontend\widgets\FooterMenu::widget(
                                [
                                    'items' => [
                                        ['label' => 'Новости', 'url' => ['/news/index']],
                                        ['label' => 'Отзывы', 'url' => ['/comments/index']],
                                        ['label' => 'О клинике', 'url' => ['/about/index']],
                                        ['label' => 'Лицензии', 'url' => ['/about/index/#license']],
                                    ]
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<div id="mess_block" style="<?= Yii::$app->session->hasFlash('mess')? 'display: block' : 'display: none' ?>">
    <div class="messContent row align-items-center justify-content-center">
        <div class="col-12">
            <h2 id="mess" class="mess"><?= Yii::$app->session->getFlash('mess') ?></h2>
        </div>
        <div class="col-6">
            <button id="ok" class="messBlock__button">OK</button>
        </div>
    </div>
</div>

<button id="buttonUp" class="buttonUp active">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
        <path d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path>
    </svg>
</button>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
