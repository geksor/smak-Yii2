<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DocumentUpload */
/* @var $link backend\models\OmsLink */

$this->title = 'Загрузка документа';
?>
<div class="pages-doc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-doc', [
        'model' => $model,
    ]) ?>

</div>
