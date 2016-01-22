var myApp = angular.module('myApp', ['ngRoute', '720kb.datepicker', 'ngStorage'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

myApp.factory("user", function () {
    return {};
});


myApp.config(function ($routeProvider) {
    $routeProvider
            .when('/', {
                templateUrl: 'particials/first-step.html',
                controller: 'GeneralController',
            })

            .when('/third', {
                templateUrl: 'particials/third-step.html',
                controller: 'InterestController',
            })

            .when('/fourth', {
                templateUrl: 'particials/fourth-step.html',
                controller: 'LocationController',
            })

            .when('/fifth', {
                templateUrl: 'particials/five-step.html',
                controller: 'FoodController',
            })

            .when('/second', {
                templateUrl: 'particials/second-step.html',
                controller: 'EducationController',
            });
});




