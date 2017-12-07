
'use strict';
var CompanyApp = angular.module('CompanyApp');

//Angualar js App configuration for the Company App to StripTralingSlashed by Default.
app.service('CompanyStandService', function($http) {
    // Don't strip trailing slashes from calculated URLs
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
    //var eventid =  $('#eventID').text();
         var config = {
        params: {
            event_id: $_GET.eventID
        }
    }
    this.get = function() {
      return $http.get('../api/web/v1/stand/',config);
  };
 
    });

app.service('CompanydtlService', function($http) {
  // Don't strip trailing slashes from calculated URLs

  this.get = function(stndOwnerId) {

    var config = {
        params: {
            id:stndOwnerId
        }
      }


    return $http.get('../api/web/v1/company/',config);
   };

});

app.service('currentStandDocService', function($http) {
    // Don't strip trailing slashes from calculated URLs
    console.log("this is doc controler2222");
    this.get = function(CompId,StandId) {
  
      var config = {
          params: {
              comp_id:CompId,
              stand_id:StandId
          }
        }
  
  
      return $http.get('../api/web/v1/mktdocs/',config);
     };
  
  });