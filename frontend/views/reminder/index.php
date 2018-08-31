<?php
/* @var $this yii\web\View */
/* @var $models \backend\models\Reminder */

$this->title = Yii::$app->params['ReminderPage']['pageTitle'];
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
        <div class="payService__contentBlock contentBlock__list">
            <h2 class="payService__title rules__title">
                <?= Yii::$app->params['ReminderPage']['rulesTitle'] ?>
            </h2>
            <h3 class="contentBlock__title">
                <?= Yii::$app->params['ReminderPage']['rulesDescription'] ?>
            </h3>
            <?= Yii::$app->params['ReminderPage']['rulesList'] ?>
            <p class="contentBlock__title bottom"><?= Yii::$app->params['ReminderPage']['director'] ?></p>
        </div>
        <a href="/uploads/documents/<?= Yii::$app->params['ReminderPage']['rulesDocName'] ?>" target="_blank" class="gvnpLink reminder">
            <?= Yii::$app->params['ReminderPage']['rulesDocTitle'] ?>
        </a>
    </div>
</div>
