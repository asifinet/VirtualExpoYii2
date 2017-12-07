<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\expoevent;
use backend\models\ExpoLookup;
use backend\models\ExpoCompany;

use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\ExpoStand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expo-stand-form">

    <?php $form = ActiveForm::begin(); ?>

 

    <?= $form->field($model, 'event_id')->dropDownList(ArrayHelper::map(ExpoEvent::find()->all(),'id','name','start_date'),
    ['prompt'=>'Select event',
     'onchange'=> 
     '$.post("index.php?r=expo-stand/lists&id='.'"+$(this).val(), function(data) {
         $("select#expostand-code").html( data );
       });'
    ]) ?>


    <?= $form->field($model, 'code')->dropDownList(
    ArrayHelper::map(ExpoLookup::findBySql('select * from expo_lookup where colum_name = "event_code" and status="1"')->all(),'value','description'),
    ['prompt'=>'Select Code']
    ) ?>

    <?= $form->field($model, 'stand_status')->dropDownList(
    ArrayHelper::map(ExpoLookup::findBySql('select * from expo_lookup where colum_name = "Active_Inactive" and status="1"')->all(),'value','description'),
    ['prompt'=>'Select Status']
    ) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sq_meter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo_pos')->dropDownList(
    ArrayHelper::map(ExpoLookup::findBySql('select * from expo_lookup where colum_name = "logo_pos" and status="1"')->all(),'value','description'),
    ['prompt'=>'Select Logo Position']) ?>
    <?= $form->field($model, 'email_sent')->dropDownList(
    ArrayHelper::map(ExpoLookup::findBySql('select * from expo_lookup where colum_name = "email_sent" and status="1"')->all(),'value','description'),
    ['prompt'=>'']) ?>
   <?= $form->field($model, 'image_ext')->dropDownList(
    ArrayHelper::map(ExpoLookup::findBySql('select * from expo_lookup where colum_name = "image_format" and status="1"')->all(),'value','description','value'),
    ['prompt'=>'']) 
   ?>
   <?= $form->field($model, 'stand_owner_id')->dropDownList(
    ArrayHelper::map(ExpoCompany::find()->all(),'id','company_name','company_sname'),
    ['prompt'=>'']) ?>
   

<?= $form->field($model, 'free_stand')->dropDownList(
    ArrayHelper::map(ExpoLookup::findBySql('select * from expo_lookup where colum_name = "email_sent" and status="1"')->all(),'value','description'),
    ['prompt'=>'Select Stand']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
