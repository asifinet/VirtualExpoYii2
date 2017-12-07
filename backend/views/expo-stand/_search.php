<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpoSearchStand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expo-stand-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date_time') ?>

    <?= $form->field($model, 'event_id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'stand_status') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'sq_meter') ?>

    <?php // echo $form->field($model, 'image_ext') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'logo_pos') ?>

    <?php // echo $form->field($model, 'email_sent') ?>

    <?php // echo $form->field($model, 'stand_owner_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
