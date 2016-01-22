'use strict';

describe('Controller: GeneralController', function() {

    var $rootScope, $scope, $controller;

    beforeEach(module('myApp'));

    beforeEach(inject(function(_$rootScope_, _$controller_){
        $rootScope = _$rootScope_;
        $scope = $rootScope.$new();
        $controller = _$controller_;

        $controller('GeneralController', {'$rootScope' : $rootScope, '$scope': $scope});
    }));

    it('should make about menu item active.', function() {
        expect($scope.isActive == "/");
    });

});