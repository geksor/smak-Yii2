<?php

/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $consultFormModel \backend\models\Registration */


$this->title = 'Хирургический центр СМАК - Главная';
?>

<div class="sliderLine">
    <div class="slider__slide">
        <div class="container contBgnd">
            <div class="row slider__textRow">
                <div class="col-12 col-xl-2"></div>
                <div class="col-12 col-md-10 col-lg-7">
                    <h2 class="slider__text">
                        Медицинская помощь
                        В современном медицинском
                        центре «СМАК»
                    </h2>
                </div>
            </div>
            <div class="row slider__buttonRow">
                <div class="col-12 col-xl-2"></div>
                <div class="col-12 col-md-4 col-xl-2">
                    <button class="slider__moreButton">Подробнее</button>
                </div>
                <div class="col-12 col-md-4 col-xl-2">
                    <button class="slider__signUpButton">Записаться онлайн</button>
                </div>
            </div>
        </div>
    </div>
    <div class="slider__navBlock">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <button class="slideNavBtn slider__navBtn prev">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="16px" height="9px">
                            <path fill-rule="evenodd"
                                  d="M4.388,-0.000 L5.101,0.731 L1.929,3.983 L16.000,3.983 L16.000,5.017 L1.929,5.017 L5.101,8.269 L4.388,9.000 L-0.000,4.500 L4.388,-0.000 Z"/>
                        </svg>
                    </button>
                    <button class="slideNavBtn slider__navBtn next">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="16px" height="9px">
                            <path fill-rule="evenodd"
                                  d="M11.612,-0.000 L10.899,0.731 L14.070,3.983 L-0.000,3.983 L-0.000,5.017 L14.070,5.017 L10.899,8.269 L11.612,9.000 L16.000,4.500 L11.612,-0.000 Z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="aboutNewsLine">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-xl-6">
                <div class="aboutBlock">
                    <h2 class="aboutBlock__title">
                        Кратко о медицинском
                        центре <span>города Хасавюрт</span>
                    </h2>
                    <p class="aboutBlock__text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit
                        voluptatem
                        <a href="#" class="reedMore" title="Читать полностью">
                            <span class="dots dots_first"></span>
                            <span class="dots dots_second"></span>
                            <span class="dots dots_last"></span>
                        </a>
                    </p>
                    <div class="row">
                        <div class="col-4">
                            <div class="aboutBlockImgWrap">
                                <img src="public/images/12.jpg" alt="img">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="aboutBlockImgWrap">
                                <img src="public/images/13.jpg" alt="img">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="aboutBlockImgWrap">
                                <img src="public/images/14.jpg" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-5">
                <div class="newsBlock">
                    <a href="/news/index" class="newsBlock__allNewsLink top" title="Все новости">Все новости</a>
                    <h2 class="newsBlock__title">Последние новости</h2>

                    <?= \frontend\widgets\LastsNewsWidget::widget(); ?>

                    <div class="newsBlock__allNewWrapBottom">
                        <a href="/news/index" class="newsBlock__allNewsLink" title="Все новости">Все новости</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= \frontend\widgets\ServiceTypeWidget::widget(); ?>
<div class="payServiceLine">
    <div class="container">
        <h2 class="payService__title">Платные сервисные услуги</h2>
        <div class="row justify-content-center justify-content-lg-between">
            <div class="col-12 col-lg-7">
                <div class="payService__contentBlock">
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
            <div class="col-12 col-lg-5 col-xl-4">
                <div class="payService__linksBlock">
                    <a href="#" class="priceLink" title="Прайс-лист">Прайс-лист</a>
                    <a href="#" class="rulesLink" title="Правила предоставления">Правила предоставления</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="consultFormLine">
    <div class="container">
        <div class="row">
            <div class="bgndImageBlock col-lg-5 col-xl-4">
            </div>
            <div class="col-12 col-lg-7 col-xl-6">
                <h2 class="consultForm__title">Запись на консультацию к врачу</h2>

                <?php $form = ActiveForm::begin(['options' => ['class' => 'consultForm__form row']]); ?>

                    <div class="col-12 col-sm-6">
                        <?= $form->field($consultFormModel, 'name')->textInput([
                            'class' => 'consultForm__input',
                            'placeholder' => 'Ваше имя'
                        ])->label(false) ?>
                    </div>
                    <div class="col-12 col-sm-6">
                        <?= $form->field($consultFormModel, 'email')->textInput([
                            'type' => 'email',
                            'class' => 'consultForm__input',
                            'placeholder' => 'E-mail адрес'
                        ])->label(false) ?>
                    </div>
                    <div class="col-12 col-sm-6">
                        <?= $form->field($consultFormModel, 'tel')->textInput([
                            'type' => 'tel',
                            'maxlength' => true,
                            'class' => 'consultForm__input phoneMask',
                            'placeholder' => 'Номер телефона'
                        ])->label(false) ?>
                    </div>
                    <div class="col-12 col-sm-6">
                        <?= $form->field($consultFormModel, 'insurance')->textInput([
                            'type' => 'text',
                            'maxlength' => true,
                            'class' => 'consultForm__input insurance',
                            'placeholder' => 'Номер полиса'
                        ])->label(false) ?>
                    </div>
                    <div class="col-12">
                        <?= Html::submitButton('Записаться', ['class' => 'consultForm__submit']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<div class="contactLine relative">
    <div class="map">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A586ce6652cbc94577d10c953bcd9b1bc47a7053da45c0aa5333bdc8abf31770b&amp;lang=ru_RU&amp;scroll=false"></script>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6">
                <h2 class="contact__title">Контакты</h2>
                <div class="contactRow row">
                    <div class="col-2">
                        <div class="ico">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="45px" height="41px" viewBox="0 0 45 41">
                                <path fill-rule="evenodd"  fill="rgb(81, 211, 121)"
                                      d="M44.202,39.927 C43.923,40.307 43.487,40.530 43.024,40.530 L27.459,40.530 L41.594,28.348 L44.443,38.598 C44.570,39.056 44.481,39.547 44.202,39.927 ZM3.789,26.969 L5.118,22.188 C5.299,21.537 5.878,21.088 6.537,21.088 L14.496,21.088 C14.784,21.527 15.087,21.968 15.408,22.411 C17.639,25.488 19.907,27.569 20.158,27.797 C20.806,28.383 21.638,28.705 22.500,28.705 C23.363,28.705 24.195,28.382 24.842,27.797 C25.093,27.569 27.361,25.488 29.592,22.411 C29.913,21.968 30.216,21.527 30.504,21.088 L38.462,21.088 C39.122,21.088 39.701,21.537 39.882,22.188 L40.997,26.200 L33.497,32.556 L3.789,26.969 ZM22.500,26.582 C22.152,26.582 21.803,26.456 21.524,26.204 C21.171,25.885 12.873,18.292 12.874,10.418 C12.874,4.967 17.192,0.532 22.500,0.532 C27.808,0.532 32.126,4.967 32.126,10.418 C32.126,18.292 23.829,25.885 23.476,26.204 C23.197,26.456 22.849,26.582 22.500,26.582 ZM24.996,10.418 C24.996,8.991 23.878,7.835 22.500,7.835 C21.122,7.835 20.004,8.991 20.004,10.418 C20.004,11.845 21.122,13.001 22.500,13.001 C23.878,13.001 24.996,11.845 24.996,10.418 ZM7.728,40.530 L1.976,40.530 C1.513,40.530 1.077,40.307 0.798,39.927 C0.519,39.547 0.430,39.056 0.557,38.598 L3.219,29.020 L7.728,29.868 L7.728,40.530 ZM24.244,40.530 L9.796,40.530 L9.796,30.257 L31.442,34.327 L24.244,40.530 Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col-10 col-md-8">
                        <p class="contactRow__title">Адрес:</p>
                        <p class="contactRow__text">г.Хасавюрт, ул.Бамовская 57а</p>
                    </div>
                </div>
                <div class="contactRow row">
                    <div class="col-2">
                        <div class="ico">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="45px" height="45px" viewBox="0 0 45 45">
                                <path fill-rule="evenodd"  fill="rgb(81, 211, 121)"
                                      d="M44.908,34.870 C44.781,34.486 43.971,33.921 42.479,33.175 C42.075,32.941 41.499,32.621 40.753,32.217 C40.007,31.811 39.330,31.438 38.723,31.097 C38.116,30.757 37.545,30.426 37.013,30.107 C36.928,30.042 36.661,29.856 36.214,29.547 C35.766,29.238 35.388,29.009 35.079,28.860 C34.770,28.711 34.466,28.636 34.167,28.636 C33.741,28.636 33.209,28.940 32.570,29.547 C31.931,30.154 31.344,30.815 30.812,31.529 C30.279,32.244 29.715,32.904 29.118,33.511 C28.522,34.119 28.031,34.422 27.648,34.422 C27.456,34.422 27.216,34.369 26.928,34.263 C26.641,34.157 26.422,34.065 26.272,33.992 C26.124,33.916 25.868,33.768 25.506,33.543 C25.143,33.320 24.940,33.197 24.898,33.175 C21.978,31.556 19.475,29.702 17.386,27.613 C15.298,25.524 13.443,23.020 11.824,20.101 C11.802,20.058 11.680,19.856 11.456,19.493 C11.232,19.131 11.083,18.875 11.008,18.726 C10.934,18.577 10.843,18.358 10.737,18.071 C10.630,17.783 10.577,17.543 10.577,17.351 C10.577,16.968 10.881,16.477 11.488,15.881 C12.095,15.284 12.756,14.719 13.470,14.187 C14.184,13.655 14.844,13.068 15.452,12.429 C16.059,11.790 16.363,11.257 16.363,10.831 C16.363,10.533 16.288,10.229 16.139,9.920 C15.990,9.610 15.761,9.233 15.452,8.785 C15.143,8.337 14.956,8.071 14.892,7.986 C14.573,7.453 14.243,6.883 13.902,6.275 C13.560,5.668 13.188,4.991 12.783,4.246 C12.378,3.500 12.058,2.924 11.824,2.519 C11.078,1.028 10.513,0.218 10.129,0.090 C9.980,0.026 9.756,-0.006 9.458,-0.006 C8.882,-0.006 8.131,0.101 7.204,0.314 C6.277,0.527 5.547,0.751 5.014,0.985 C3.949,1.433 2.819,2.733 1.626,4.885 C0.539,6.888 -0.004,8.870 -0.004,10.830 C-0.004,11.406 0.033,11.965 0.108,12.509 C0.182,13.052 0.315,13.665 0.507,14.347 C0.699,15.029 0.854,15.536 0.971,15.865 C1.088,16.196 1.306,16.787 1.626,17.639 C1.945,18.492 2.137,19.014 2.201,19.206 C2.947,21.294 3.831,23.159 4.854,24.800 C6.537,27.528 8.834,30.347 11.743,33.256 C14.652,36.165 17.470,38.462 20.198,40.145 C21.839,41.168 23.704,42.052 25.793,42.798 C25.985,42.862 26.507,43.054 27.359,43.374 C28.211,43.693 28.803,43.912 29.133,44.030 C29.463,44.147 29.970,44.301 30.651,44.494 C31.334,44.685 31.946,44.818 32.490,44.893 C33.033,44.967 33.593,45.006 34.168,45.006 C36.128,45.006 38.111,44.461 40.114,43.375 C42.266,42.181 43.566,41.052 44.013,39.986 C44.249,39.454 44.472,38.724 44.685,37.796 C44.898,36.869 45.004,36.118 45.004,35.543 C45.005,35.244 44.973,35.020 44.908,34.870 Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col-10 col-md-8">
                        <p class="contactRow__title">Звонок круглосуточный:</p>
                        <div class="row">
                            <div class="col-12 col-sm-5"><p class="contactRow__text">Справочная</p></div>
                            <div class="col-12 col-sm-6"><p class="contactRow__text">+7(928)672-03-03</p></div>
                            <div class="col-12 col-sm-5"><p class="contactRow__text">Приемная</p></div>
                            <div class="col-12 col-sm-6"><p class="contactRow__text">+7(928)672-03-03</p></div>
                            <div class="col-12 col-sm-5"><p class="contactRow__text">Скорая помощь</p></div>
                            <div class="col-12 col-sm-6"><p class="contactRow__text">+7(928)672-03-03</p></div>
                        </div>
                    </div>
                </div>
                <div class="contactRow row">
                    <div class="col-2">
                        <div class="ico">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="45px" height="45px" viewBox="0 0 45 45">
                                <path fill-rule="evenodd"  fill="rgb(81, 211, 121)"
                                      d="M22.500,45.000 C10.093,45.000 -0.000,34.906 -0.000,22.500 C-0.000,10.093 10.093,-0.000 22.500,-0.000 C34.907,-0.000 45.000,10.093 45.000,22.500 C45.000,34.907 34.907,45.000 22.500,45.000 ZM38.439,14.665 L36.401,15.842 C36.214,15.950 36.011,16.001 35.810,16.001 C35.400,16.001 35.003,15.788 34.783,15.409 C34.456,14.842 34.650,14.118 35.216,13.791 L37.252,12.616 C35.847,10.526 34.010,8.750 31.870,7.416 L30.910,9.090 C30.799,9.284 30.590,9.405 30.365,9.405 C30.255,9.405 30.151,9.377 30.054,9.322 C29.755,9.150 29.651,8.766 29.822,8.466 L30.783,6.791 C28.638,5.655 26.234,4.946 23.684,4.778 L23.684,7.133 C23.684,7.787 23.154,8.317 22.500,8.317 C21.846,8.317 21.316,7.787 21.316,7.133 L21.316,4.778 C18.728,4.949 16.290,5.676 14.120,6.842 L15.091,8.512 C15.175,8.656 15.198,8.825 15.155,8.987 C15.112,9.149 15.009,9.284 14.864,9.368 C14.671,9.481 14.428,9.480 14.237,9.370 C14.141,9.315 14.064,9.238 14.008,9.142 L13.038,7.474 C10.937,8.801 9.133,10.556 7.748,12.616 L9.783,13.791 C10.350,14.118 10.544,14.842 10.217,15.409 C9.997,15.788 9.599,16.001 9.190,16.001 C8.989,16.001 8.786,15.950 8.599,15.842 L6.561,14.665 C5.473,16.869 4.830,19.328 4.747,21.928 L6.683,21.922 C7.027,21.922 7.308,22.202 7.309,22.547 C7.310,22.714 7.245,22.872 7.127,22.990 C7.009,23.109 6.852,23.175 6.685,23.175 L4.751,23.181 C4.848,25.740 5.489,28.162 6.561,30.335 L8.599,29.158 C9.165,28.831 9.890,29.025 10.217,29.592 C10.544,30.158 10.350,30.882 9.783,31.209 L7.748,32.384 C9.153,34.474 10.990,36.250 13.130,37.584 L14.089,35.910 C14.201,35.716 14.410,35.595 14.634,35.595 C14.744,35.595 14.849,35.623 14.945,35.678 C15.090,35.761 15.194,35.896 15.238,36.058 C15.282,36.220 15.260,36.389 15.177,36.534 L14.217,38.209 C16.362,39.345 18.766,40.054 21.316,40.223 L21.316,37.867 C21.316,37.213 21.846,36.683 22.500,36.683 C23.154,36.683 23.684,37.213 23.684,37.867 L23.684,40.223 C26.272,40.051 28.710,39.324 30.879,38.159 L29.908,36.489 C29.824,36.344 29.802,36.175 29.844,36.013 C29.887,35.852 29.990,35.716 30.135,35.632 C30.232,35.575 30.338,35.547 30.449,35.547 C30.672,35.547 30.880,35.666 30.992,35.859 L31.962,37.527 C34.062,36.199 35.867,34.444 37.252,32.384 L35.216,31.209 C34.650,30.882 34.456,30.158 34.783,29.592 C35.110,29.025 35.834,28.831 36.401,29.158 L38.439,30.335 C39.526,28.131 40.170,25.672 40.253,23.072 L38.319,23.079 L38.317,23.079 C38.208,23.079 38.100,23.050 38.006,22.996 C37.812,22.885 37.691,22.677 37.690,22.453 C37.690,22.286 37.755,22.129 37.872,22.010 C37.990,21.891 38.147,21.825 38.315,21.825 L40.249,21.819 C40.152,19.260 39.511,16.838 38.439,14.665 ZM32.695,18.680 L24.945,22.980 C24.721,24.127 23.712,24.992 22.500,24.992 C21.287,24.992 20.278,24.127 20.054,22.980 L12.304,18.680 C11.586,18.281 11.327,17.376 11.725,16.657 C12.124,15.939 13.030,15.680 13.748,16.079 L21.343,20.293 C21.689,20.111 22.082,20.007 22.500,20.007 C22.918,20.007 23.311,20.111 23.656,20.293 L31.252,16.079 C31.970,15.680 32.876,15.939 33.274,16.657 C33.672,17.376 33.413,18.281 32.695,18.680 Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col-10 col-md-8">
                        <p class="contactRow__title">Режим работы:</p>
                        <p class="contactRow__text">
                            Понедельник- пятница: с 9:30 до 16:00
                        </p>
                        <p class="contactRow__text">
                            Суббота: с 9: 30 до 13:00
                        </p>
                        <p class="contactRow__text">
                            Выходной день: воскресенье
                        </p>
                    </div>
                </div>
                <h3 class="insCompany__title">Страховые компании</h3>
                <div class="row">
                    <div class="col-6 col-sm-auto">
                        <img src="public/images/17.png" alt="Макс">
                    </div>
                    <div class="col-6 col-sm-auto">
                        <img src="public/images/18.png" alt="ВТБ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

