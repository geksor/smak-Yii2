<?php
/* @var $this yii\web\View */
/* @var  $models \backend\models\Comment */
/* @var  $pages \frontend\controllers\CommentsController */
/* @var  $formModel \backend\models\Comment */

use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Html;

$this->title = 'Отзывы';
?>

<div class="container">
    <h1 class="pageTitle"><?= $this->title ?></h1>
    <div class="commentBlockWrap">
        <? if ($models) {?>
            <? foreach ($models as $model) {?>
                <article class="commentRow">
                    <h2 class="commentTitle"><?= $model->user_name ?></h2>
                    <p class="commentCreateDate"><?= date('d.m.Y', $model->date) ?> года</p>
                    <p class="commentText">
                        <?= $model->text ?>
                    </p>
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
            <p>Отзывов пока нет</p>
        <?}?>
        <div class="commentFormLine">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-7 col-xl-6">
                        <h2 class="commentForm__title">Оставить свой отзыв</h2>
                        <?php $form = ActiveForm::begin(['options' => ['class' => 'commentForm__form row']]); ?>
                        <div class="firstField">
                            <?= $form->field($formModel, 'name')->textInput() ?>
                        </div>

                        <div class="col-12 col-sm-6">
                            <?= $form->field($formModel, 'user_name')->textInput([
                                'maxlength' => true,
                                'class' => 'commentForm__input',
                                'placeholder' => 'Ваше имя'
                            ])->label(false) ?>
                        </div>

                        <div class="col-12 col-sm-6">
                            <?= $form->field($formModel, 'email')->textInput([
                                'type' => 'email',
                                'class' => 'commentForm__input',
                                'placeholder' => 'E-mail адрес'
                            ])->label(false) ?>
                        </div>

                        <div class="col-12">
                            <?= $form->field($formModel, 'text')->textarea([
                                'class' => 'commentForm__textarea',
                                'placeholder' => 'Текст отзыва'
                            ])->label(false) ?>
                        </div>

                        <div class="col-12">
                            <?= Html::submitButton('Отправить', ['class' => 'commentForm__submit']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

