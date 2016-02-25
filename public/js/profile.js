var profileApp = angular.module('profileApp', ['ngRoute'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});



profileApp.config(function ($routeProvider) {
    $routeProvider
            .when('/', {
                templateUrl: 'particial-update/first.html',
                controller: 'myCtrl',
            })

            .when('/work', {
                templateUrl: 'particial-update/second.html',
                controller: 'WorkController',
                data: 'addorder'      
            })

            .when('/interest', {
                templateUrl: 'particial-update/third.html',
                controller: 'ItnerestController',
            })
            
            .when('/location', {
                templateUrl: 'particial-update/fourth.html',
                controller: 'LocationController',
            })
            
              .when('/looks', {
                templateUrl: 'particial-update/five.html',
                controller: 'LookController',
            })
            
             .when('/all', {
                templateUrl: 'particial-update/all.html',
                controller: 'matchAll',
            })
            
             .when('/online', {
                templateUrl: 'particial-update/online.html',
                controller: 'onlineCtr',
            })
 
});








