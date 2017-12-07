<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\ExpoLookup;
/* @var $this yii\web\View */
/* @var $model backend\models\ExpoLookup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expo-lookup-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'colum_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(
    ArrayHelper::map(ExpoLookup::findBySql('select * from expo_lookup where colum_name = "Active_Inactive" and status="1"')->all(),'value','description'),
    ['prompt'=>''])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
