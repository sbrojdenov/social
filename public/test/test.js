describe("Unit Test", function () {
    var myApp;


    beforeEach(function () {
        myApp = angular.module('myApp');
    });

    it('should have a GeneralController controller', function () {
        expect(myApp).toBeDefined();
        expect(myApp.controller('GeneralController')).toBeDefined();
    });
    
     
});