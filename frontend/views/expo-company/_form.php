<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ExpoCompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expo-company-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <label class="fileContainer">
   <?= $form->field($model, 'file')->fileInput(['multiple' => false,'accept' => 'image/*','id'=>'compLgo','class' => 'btn btn-primary']); ?>
   </label>
    <?= $form->field($model, 'company_name')->textInput(); ?>
    <?= $form->field($model, 'company_rep_name')->textInput(); ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'primary_email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'secondary_email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'office_phone')->textInput(['maxlength' => true]) ?>
    
    <label class="fileContainerblue">
    <?= $form->field($ExpoMktDocModel, 'doc_name[]')->fileInput(['multiple' => true,'id'=>'mktDoc','class' => 'btn btn-primary']) ?>
    </label>
   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Reserve' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'file btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
