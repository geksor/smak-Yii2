<?php
/* @var $gallery \backend\models\Gallery */
/* @var $text */

use yii\helpers\Html;
?>

<div class="aboutBlock">
    <h2 class="aboutBlock__title">
        Кратко о медицинском
        центре <span>города Хасавюрт</span>
    </h2>
    <p class="aboutBlock__text">
        <?= $text ?>
        <a href="about/index" class="reedMore" title="Читать полностью">
            <span class="dots dots_first"></span>
            <span class="dots dots_second"></span>
            <span class="dots dots_last"></span>
        </a>
    </p>
    <div class="row">
        <? if ($gallery) {?>
            <?foreach($gallery->getBehavior('galleryBehavior')->getImages() as $key => $image) {?>
                <? if ($key <= 2) {?>
                    <div class="col-4">
                        <div class="aboutBlockImgWrap">
                            <?= Html::img($image->getUrl('small'), ['alt' => $image->name]); ?>
                        </div>
                    </div>
                <?}else{break;}?>
            <?}?>
        <?}?>
    </div>
</div>


