<?php 
$l_event_id = $_GET['eventID'];


use backend\models\expoevent; 
$this->title = 'My Virtual Exposition Stands';
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" data-ng-app="CompanyApp">
<head>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<link href="css/animate.css" rel="stylesheet" type="text/css"/>
<style>
.docdtl{
    height:50px;
    overflow-y
    :scroll;
}

</style>

</head>
<body>
<div id="StandBooths" data-ng-controller="StandController">
<input type="hidden" id="eventID"></input> 

<div> <h3 id="evntName"></h3></div>
<div class="standcount" ng-cloak> This event has <span id="standCount">
</span> {{CompanyStand.length}} stands </div>

 <div class="expo-stand-panel row well">
 <div class="col-md-12">
 <div class="row">
 <div class="col-sm-3" data-ng-repeat="stand in CompanyStand | orderBy:id track by $index">
    <div class="stand_block {{stand.stand_owner_id? 'stand_booked':'stand_free'}}" >
     <div class="{{stand.stand_owner_id===null?'logo':'logo1'}}">
      <input id="standIDholder"  type = "hidden" ng-cloak value="{{stand.id}}">
      <h1  ng-cloak id="standPrice{{stand.code}}{{$index+ 1}}" class="price ng-binding" 
       ng-show="{{stand.stand_owner_id===null}}" 
       ng-cloak>{{stand.stand_owner_id==null? "$"+stand.price:null}} </h1>
      <img class="myimage" id="myimg{{stand.code}}{{$index+ 1}}" 
      ng-cloak ng-show="{{stand.stand_owner_id}}" 
      src={{stand.company_logo+"."+stand.image_ext}} ></div> 
      <p> <img  ng-show="{{stand.stand_owner_id}}" src="/assets/stand/stand-booked.png">
      <img ng-cloak ng-show="{{stand.stand_owner_id===null}}" src="/assets/stand/stand-free.png">  <br>
      <strong class="code" ng-cloak>{{stand.code}}{{$index+ 1}}</strong> </p> <p>
    <button id="viewDetail" class="btn btn-primary"  ng-click="viewDetail(stand.stand_owner_id,stand.code,stand.id,stand.event_id,stand.free_stand,$index+ 1)" ng-cloak>{{stand.stand_owner_id>0? 'View Details':stand.free_stand>0?'Book Free':'Book Now'}}</button>
     </p>
 </div>
 </div>
 </div>
 </div>
 <div data-ng-show="Companydtl.length == 0">
            No results
        </div>
<div class="modal fade ng-scope animated fadeInUp" id="viewStandModel" 
style="display: none; padding-right: 15px;">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="standCode" class="modal-title ng-binding">Stand: A1</h4>
                <input id="StandID" type="hidden" val=></input>
                <input id="eventId" type="hidden" val=></input>
            </div>
            
            <div class="modal-body">
                <p style="text-align: center;"><img id ="dtllogo" src="uploads/chrome.png"></p>
                <h4 id="heading" class="details_heading"><i id="gylphicon" class="glyphicon glyphicon-user"></i>  </h4>
                <p class="ng-binding" id="company_rep_name"></p>
                <p><a href="{{company.primary_email}}" class="ng-binding"  id="primary_email"></a></p>
                <p class="ng-binding" id="office_phone"></p>

                <h4 id="marketHeading" class="details_heading"><i class="glyphicon glyphicon-file" ></i> Marketing Documents</h4>
                <!-- ngRepeat: document in currentStandDocuments -->
                <div class="docdtl"  class="show" >
                <p ng-repeat="standID in Companydoc" class="ng-scope"
                ><a href="{{standID.doc_path+standID.doc_name +'.'+ standID.doc_ext}}" class="ng-binding">{{$index+1}} {{standID.doc_name}}</a>
                </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" ng-click ="CloseView()">Close</button>
                <button id="ReserveEvent" class="btn btn-primary show reserveBtn"  ng-click="ReserveEvent()">Reserve</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>





</body>

</html>

