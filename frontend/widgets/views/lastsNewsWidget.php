<?php
/* @var $models \backend\models\News */
?>

<? if ($models) {?>
    <? foreach ($models as $model) {?>
        <article class="row newsRow">
            <div class="col-12 col-md-5">
                <div class="newsImgWrap">
                    <img src="<?= $model->thumbImage ?>" alt="<?= $model->title ?>">
                </div>
            </div>
            <div class="col-12 col-md-7">
                <h3 class="newsTitle"><?= $model->title ?></h3>
                <p class="newsText">
                    <?= $model->short_text ?>
                    <a href="/news/index/#news_<?= $model->id ?>" class="reedMore" title="Читать полностью">
                        <span class="dots dots_first"></span>
                        <span class="dots dots_second"></span>
                        <span class="dots dots_last"></span>
                    </a>
                </p>
            </div>
        </article>
    <?}?>
<?}else{?>
    <p>Пока новостей нет :-( Но они обязательно появятся :-) </p>
<?}?>

