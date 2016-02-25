
profileApp.controller('onlineCtr', ['$scope', '$http','$interval', function ($scope, $http,$interval) {
        
        
       $scope.updateStatus=function(){
             $http.post("updateStatus").success(function(data, status) {
          
             });   
       };

        $interval( function(){ $scope.updateStatus(); }, 30000);
       

        $scope.getMatch = function () {           
            $http.get("getmatch").then(function (response) {
                $scope.myMach = response.data;
               
              
            });    
        };
        $interval( function(){ $scope.getMatch(); }, 30001);

    }]);



profileApp.controller('matchAll', ['$scope', '$http','$interval', function ($scope, $http,$interval) {
        
       
        $scope.getMatch = function () {           
            $http.get("getall").then(function (response) {
                $scope.myMach = response.data;

            });    
        };
    

    }]);