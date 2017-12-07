

    //Main Controller for the RESTfull client application
        'use strict';
        var controllers = angular.module('controllers', []);
        controllers.controller('StandController', ['$scope','$http', 'CompanyStandService','CompanydtlService', 'currentStandDocService',
        function ($scope,$http, CompanyStandService, CompanydtlService, currentStandDocService) {
                $scope.CompanyStand = [];
                function getQueryParams(qs) {
                    qs = qs.split("+").join(" ");
                    var params = {},
                        tokens,
                        re = /[?&]?([^=]+)=([^&]*)/g;
                
                    while (tokens = re.exec(qs)) {
                        params[decodeURIComponent(tokens[1])]
                            = decodeURIComponent(tokens[2]);
                    }
                
                    return params;
                }
                
             var $_GET = getQueryParams(document.location.search);
             console.log("HA HA HAH-"+$_GET.username);
             $scope.username =$_GET.username;
    
         $scope.ReserveEvent = function() 
                { 
                   // $('#standCode').text(code + e);
                    var standID= $('#StandID').val();
                    var standEventId= $('#eventId').val();
                    console.log(standID+' - '+standEventId);
                  window.location = 'index.php?r=expo-company%2Fcreate&standID='+standID+'&eventId='+standEventId;   
              
              
                }



                $scope.viewDetail = function(stndOwnerId, code,standID,eventId,freeStand,e) 
                   {  
                   console.log("Testing 2- "+code+e+" - "
                 +stndOwnerId);    
                  console.log('FreeStand'+freeStand);
                   var standImage = $("#myimg"+code+e).attr('src');
                           $('#viewStandModel').css('display','block'); 
                           $('#viewStandModel').css('opicity','1'); 
                         //  $('body').append('<div class="modal-backdrop fade in"></div>');
                       //  console.log(stndOwnerId+'This is myinitital testing');
                         if (stndOwnerId){
                           // console.log(stndOwnerId+'This is my testing');
                            $('#ReserveEvent').addClass('hide');
                            $('#ReserveEvent').removeClass('show');

                            $('.docdtl').addClass('show');
                            $('.docdtl').removeClass('hide');

                            $('#gylphicon').empty();
                            $('#gylphicon').html('Contact Details');
                            $('#gylphicon').addClass('glyphicon-user');
                            $('#gylphicon').removeClass('glyphicon-shopping-cart');
                          }else{
                            $('#ReserveEvent').addClass('show');
                            $('#ReserveEvent').removeClass('hide');
                            standImage= '/assets/stand/stand-real.jpeg';
                            $('#gylphicon').empty();
                            $('#gylphicon').html('Price');
                            $('#gylphicon').removeClass('glyphicon-user');
                            $('#gylphicon').addClass('glyphicon-shopping-cart');
                            if (freeStand==1){
                                $('#company_rep_name').text('FREE');
                            }else{
                            $('#company_rep_name').html($('#standPrice'+code+e).text());
                            }
                            $('#marketHeading').empty();
                            $('#primary_email').empty();
                            $('#office_phone').empty();
                            $('#logo').removeClass('glyphicon-user');
                            $('#gylphicon').addClass('glyphicon-shopping-cart');
                            $('.docdtl').addClass('hide');
                            $('.docdtl').removeClass('show');
                            //console.log('Here we are -'+ standID);
                          }
                            $('#viewStandModel').addClass('in');
                            $("#dtllogo").attr('src',standImage);
                            $("#dtllogo").css('width','60%');
                            $('#standCode').text("Stand : " + code + e);
                            $('#StandID').val(standID);
                         //   $('#standOwnerId').val(stndOwnerId);
                            $('#eventId').val(eventId);
                        //    console.log('StandID -'+ standID);
                   /*      CompanyStandService.get().then(function (data) {
                            if (data.status == 200){
                                $scope.CompanyStand = data.data;
                                console.log($scope.CompanyStand);
                            }
                        }, function (err) {
                            console.log(err);
                        })
                 
                        var config = {
                            params: {
                                comp_id:stndOwnerId,
                                stand_id:standID
                            }
                          }*/
                        //  console.log("this is service call");
                        
               currentStandDocService.get(stndOwnerId,standID).then(function (data) {
            if (data.status == 200){
               // console.log("this is doc controler2"+ data.data);
                $scope.Companydoc = data.data;
               }
              }, function (err) {
                 console.log(err);
               })
                         var check="../frontend/views/site/expo_comp_service.php?id="+stndOwnerId+"&action=listpoints";
                                 
                                     $.getJSON(check, function(json) {    
                                       if (json.company.length > 0) {
                                           for (var i=0; i<json.company.length; i++) {
                                               var company = json.company[i];
                                               console.log(company);
                                           
                                               $('#company_rep_name').text(company.name);
                                               $('#primary_email').text(company.email);
                                               $('#office_phone').text(company.phone);
                                        }        
                                       }
                                   })
                   }     
                   $scope.CloseView = function(stndOwnerId, e,) 
                   {  
                  //  $('#viewStandModel').removeClass('fadeInUp');
                   // $('#viewStandModel').addClass('slideOutDown');
                   // $("#viewStandModel").css('opcity', '0');
                    $("#viewStandModel").css('display', 'none');
                   }    
                 // console.log("Hay you");
                  
                   CompanyStandService.get().then(function (data) {
                    if (data.status == 200){
                     //   console.log("Hay you  xx");
                        $scope.CompanyStand = data.data;
                     //   console.log($scope.CompanyStand);
                        //console.log($scope.CompanyStand[i].price);
                    }
                }, function (err) {
                    console.log(err);
                })
                
            }
            
        ]);

        controllers.controller('currentStandDocuments', ['$scope', 'currentStandDocService',
        function ($scope, currentStandDocService) {
           console.log("this is doc controler");
            $scope.CloseView = function() 
            {  
           
             $("#viewStandModel").css('display', 'none');
            }     
            
 
          //  console.log("this is service call");
          currentStandDocService.get().then(function (data) {
                if (data.status == 200){
                    console.log("this is doc controler2");
                    $scope.Companydoc = data.data;
                }
            }, function (err) {
                console.log(err);
            })
        }
    ]);


  

    