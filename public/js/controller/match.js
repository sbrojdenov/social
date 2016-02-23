
profileApp.controller('matchCtr', ['$scope', '$http','$interval', function ($scope, $http,$interval) {
        
        
       $scope.updateStatus=function(){
             $http.post("updateStatus").success(function(data, status) {
          
             });   
       };

        $interval( function(){ $scope.updateStatus(); }, 30000);
       

        $scope.getMatch = function () {           
            $http.get("getmatch").then(function (response) {
                $scope.myMach = response.data;
               
                console.log($scope.myMach);
              
            });    
        };
        $interval( function(){ $scope.getMatch(); }, 30001);

    }]);