<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpoProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expo-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'company_sname') ?>

    <?= $form->field($model, 'primary_email') ?>

    <?php // echo $form->field($model, 'secondary_email') ?>

    <?php // echo $form->field($model, 'dir_name') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'created_date_time') ?>

    <?php // echo $form->field($model, 'remember_token') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
