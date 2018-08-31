<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Params */
/* @var $form ActiveForm */

$this->title = 'Параметры';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="params-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="box box-success">
        <div class="box-body">
            <?php $form = ActiveForm::begin(); ?>

                <h2>Реквизиты</h2>

                <?= $form->field($model, 'companyType') ?>
                <?= $form->field($model, 'company_name') ?>
                <?= $form->field($model, 'corpAddress') ?>
                <?= $form->field($model, 'inn') ?>
                <?= $form->field($model, 'kpp') ?>
                <?= $form->field($model, 'ogrn') ?>
                <?= $form->field($model, 'bank') ?>

                <h2>Контакты</h2>

                <?= $form->field($model, 'address') ?>
                <?= $form->field($model, 'phone') ?>
                <?= $form->field($model, 'phoneReception') ?>
                <?= $form->field($model, 'phoneInfo') ?>
                <?= $form->field($model, 'phoneAmbulance') ?>
                <?= $form->field($model, 'email') ?>

                <h2>Режим работы</h2>

                <?= $form->field($model, 'workDay') ?>
                <?= $form->field($model, 'shortDay') ?>
                <?= $form->field($model, 'hollyDay') ?>


            <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div><!-- index -->
