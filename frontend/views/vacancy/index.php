<?php
/* @var $this yii\web\View */
/* @var $models \backend\models\Vacancy */
/* @var $pages \yii\data\Pagination */

use yii\widgets\LinkPager;

$this->title = Yii::$app->params['VacancyPage']['pageTitle'];
?>

<div class="container">
    <h1 class="pageTitle"><?= $this->title ?></h1>
    <div class="pageMainImage">
        <img src="/uploads/images/<?= Yii::$app->params['VacancyPage']['pageImage'] ?>" alt="<?= Yii::$app->params['VacancyPage']['pageTitle'] ?>">
    </div>
    <div class="vacansyBlockWrap">
        <? if ($models != null) {?>
            <div class="toggleBlockWrap_payService">
                <?foreach ($models as $model) {?>
                    <article class="vacansyRow">
                        <h2 class="vacansyTitle"><?= $model->title ?></h2>
                        <p class="vacansyCreateDate"><?= date('d.m.Y', $model->publish_date) ?> года</p>
                        <p class="vacansyText">
                            <?= $model->text ?>
                        </p>
                    </article>
                <?}?>
            </div>
        <?}else{?>
            <p>Нет вакансий</p>
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
    </div>
</div>

