<?php
/* @var $this yii\web\View */
/* @var $modelsSm \backend\models\Doctor */
/* @var $models \backend\models\Position */

$this->title = 'Расписание приема специалистов';
?>
<div class="container">
    <h1 class="pageTitle"><?= $this->title ?></h1>
    <div class="tableDoctorWrap-sm">
        <? if ($modelsSm) {?>
            <div class="tableHeaderRow row">
                <div class="expertCol col-3">Специалисты</div>
                <div class="nameCol col-3">ФИО</div>
                <div class="timetableCol col-3">График работы врачей</div>
                <div class="omsCol col-3">По ОМС</div>
            </div>
            <? foreach ($modelsSm as $model) {?>
                <? if ($model->table) {?>
                    <div class="otherRow row">
                        <div class="expertCol col-3">
                            <? foreach ($model->positions as $key => $position) {?>
                                <?= $position->title ?><?= count($model->positions)-1 == $key ? '' : ', '; ?>
                            <?}?>
                        </div>
                        <div class="nameCol col-3"><?= $model->name ?></div>
                        <div class="timetableCol col-3"><?= $model->table->table_pay ?></div>
                        <div class="omsCol col-3"><?= $model->table->table_oms ?></div>
                    </div>
                <?}?>
            <?}?>
        <?}?>
    </div>
    <div class="tableDoctorWrap">
        <div class="row">
            <div class="col-12">
                <? if ($models) {?>
                    <label for="doctor_select">
                        Выбор специалиста
                    </label>
                    <div class="doctor__selectWrap">
                        <select class="select" name="doctor" id="doctor_select">
                            <? foreach ($models as $key => $position) {?>
                                <option value="#doctor_<?= $key?>"><?= $position->title ?></option>
                            <?}?>
                        </select>
                    </div>
            </div>
            <div class="col-12">
                <? foreach ($models as $key => $position) {?>
                    <div class="doctorTiming <?= $key == 0 ? ' active' : '';?>" id="doctor_<?= $key?>">
                        <ul>
                            <? foreach ($position->doctors as $doctor) {?>
                                <? if ($doctor->table) {?>
                                    <li class="doctorItem">
                                        <span class="nameTitle"><?= $doctor->name ?></span>
                                        <ul>
                                            <li>
                                                <span class="tableMobile__time"> График работы </span>
                                                <? if ($doctor->table->table_pay) {?>
                                                    <br> <?= $doctor->table->table_pay ?>
                                                <?}else{?>
                                                    -
                                                <?}?>
                                            </li>
                                            <li>
                                                <span class="tableMobile__time"> По ОМС </span>
                                                <? if ($doctor->table->table_oms) {?>
                                                    <br> <?= $doctor->table->table_oms ?>
                                                <?}else{?>
                                                    -
                                                <?}?>
                                            </li>
                                        </ul>
                                    </li>
                                <?}?>
                            <?}?>
                        </ul>
                    </div>
                <?}?>
            </div>
            <?}?>
        </div>
    </div>
</div>

