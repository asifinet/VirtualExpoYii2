

<script src="jquery.js" language="javascript"></script>


<script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=ABQIAAAAJje9NugLfbKT7-PgysiUmBRiAQwMC6NDUVMyLDfXW3L8HRJ2AhTvmBEgEEhrPpEFpgdOj_VBKoO9PQ" type="text/javascript"></script>
<script type="text/javascript">
	 
    var map = null;
    var geocoder = null;

    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(37.4419, -122.1419), 13);
        geocoder = new GClientGeocoder();
      }
    }

    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert("Address not found Please Write Manually");
              //document.getElementById("map_show").style.display='none';
			  //document.getElementById("add").style.display='block';
            } else {
				document.getElementById("branchLattitude").value = point;
				var where_is_mytool=document.getElementById("branchLattitude").value;
				var mytool_array=where_is_mytool.split(",");
				var longitide = mytool_array[0].split("(");
				var lattitude = mytool_array[1].split(")");

				document.getElementById("branchLongitude").value = longitide[1];
				document.getElementById("branchLattitude").value = lattitude[0];
              map.setCenter(point, 13);
              var marker = new GMarker(point);
              map.addOverlay(marker);
              marker.openInfoWindowHtml(address);
//              document.getElementById("map_show").style.display='none';
//			  document.getElementById("add").style.display='block';

            }
          }
        );
      }
    }
    function show()
    {
		document.getElementById("add").style.display='none';
     	document.getElementById("map_show").style.display='block';
    }
	
		function ajax( did, cmbid)
	{					
	var id = document.getElementById(cmbid).value;
//	alert(id);
	did = "#" + did;
		$.ajax(
		{       	
			type		: "GET",
			url			: "http://localhost/admin/SqlQueries.php",//"http://localhost/onwire/admin/SqlQueries.php", 
			data		: "id="+id,
			success		: function(response)
			{	
				$(did).html(response);
			}
		});
	}

	<!--END COMBO FILL-->
	
		function move() {
	window.location = '../admin/index.php'
	}


</script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use backend\models\ExpoLookup;
use kartik\time\TimePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\ExpoEvent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expo-event-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'code')->dropDownList(
    ArrayHelper::map(ExpoLookup::findBySql('select * from expo_lookup where colum_name = "event_code" and status="1"')->all(),'value','description'),
    ['prompt'=>'Select Event Code'])  ?>

  

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
     <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'start_date')->widget(
    DatePicker::className(), [
        // inline too, not bad
        // 'inline' => true, 
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
]); ?>

    <?= $form->field($model, 'start_time')-> widget( TimePicker::className(),[
	'name' => 'start_time', 
	'value' => '11:24 AM',
	'pluginOptions' => [
		'showSeconds' => true
	]
]); ?>

    <?= $form->field($model, 'end_date')->widget(
    DatePicker::className(), [
        // inline too, not bad
        // 'inline' => true, 
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
]); ?>

    <?= $form->field($model, 'end_time')-> widget( TimePicker::className(),[
	'name' => 'start_time', 
	'value' => '11:24 AM',
	'pluginOptions' => [
		'showSeconds' => true
	]
]); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'image_type')->dropDownList(
    ArrayHelper::map(ExpoLookup::findBySql('select * from expo_lookup where colum_name = "image_format" and status="1"')->all(),'value','description','value'),
    ['prompt'=>''])  ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
