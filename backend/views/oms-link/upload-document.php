<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DocumentUpload */
/* @var $link backend\models\OmsLink */

$this->title = 'Загрузка документа';
$this->params['breadcrumbs'][] = ['label' => 'Ссылки на документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $link->title, 'url' => ['view', 'id' => $link->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oms-link-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-doc', [
        'model' => $model,
    ]) ?>

</div>
