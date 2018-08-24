<?php
/* @var $this yii\web\View */
/* @var $models \backend\models\News */
/* @var $pages \yii\data\Pagination */

use yii\widgets\LinkPager;

$this->title = 'Новости';
?>
<div class="container">
    <h1 class="pageTitle"><?= $this->title ?></h1>
    <div class="newsBlockWrap">
        <? if ($models) {?>
            <? foreach ($models as $key => $model) {?>
                <article class="newsRow row" id="news_<?= $model->id ?>">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="newsPageImgWrap">
                            <img src="<?= $model->thumbImage ?>" alt="<?= $model->title ?>">
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="newsTextWrap flex flex-column justify-content-between">
                            <h2 class="newsTitle"><?= $model->title ?></h2>
                            <p class="newsPublishDate"><?= date('d.m.Y', $model->publish_start) ?> года</p>
                            <div class="newsShortText">
                                <?= $model->short_text ?>
                            </div>
                            <button class="newsReadMore newsMore fullTextButton_<?= $key ?> more" data-id="fullText_<?= $key ?>">
                                <span class="buttonText">Продожить чтение</span>
                                <span class="buttonIco">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="12px" height="7px">
                                            <path fill-rule="evenodd"  fill="rgb(81, 211, 121)"
                                                  d="M6.416,6.790 L11.800,1.093 C12.036,0.843 12.036,0.438 11.800,0.187 C11.564,-0.063 11.181,-0.063 10.946,0.187 L5.989,5.432 L1.031,0.188 C0.796,-0.062 0.413,-0.062 0.177,0.188 C-0.059,0.438 -0.059,0.844 0.177,1.094 L5.561,6.790 C5.794,7.036 6.183,7.036 6.416,6.790 Z"/>
                                        </svg>
                                        </span>
                            </button>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="newsFullText fullText_<?= $key ?>">
                            <?= $model->full_text ?>
                            <button class="newsReadMore newsLess" data-id="fullTextButton_<?= $key ?>">
                                <span>Свернуть</span>
                                <span>
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="12px" height="7px"
                                                    style="transform: rotate(180deg);">
                                            <path fill-rule="evenodd"  fill="rgb(81, 211, 121)"
                                                  d="M6.416,6.790 L11.800,1.093 C12.036,0.843 12.036,0.438 11.800,0.187 C11.564,-0.063 11.181,-0.063 10.946,0.187 L5.989,5.432 L1.031,0.188 C0.796,-0.062 0.413,-0.062 0.177,0.188 C-0.059,0.438 -0.059,0.844 0.177,1.094 L5.561,6.790 C5.794,7.036 6.183,7.036 6.416,6.790 Z"/>
                                        </svg>
                                        </span>
                            </button>
                        </div>
                    </div>
                </article>
            <?}?>
        <div class="pagination row justify-content-end">
            <div class="col-auto">
                <?= LinkPager::widget([
                    'pagination' => $pages,
                    'disableCurrentPageButton' => true,
                    'prevPageLabel' => false,
                    'nextPageLabel' => false,
                ]);?>
            </div>
        </div>
        <?}else{?>
            Нет новостей
        <?}?>
    </div>
</div>
