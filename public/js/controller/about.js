profileApp.directive('fileModel', ['$parse', function ($parse) {
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {
                var model = $parse(attrs.fileModel);
                var modelSetter = model.assign;

                element.bind('change', function () {
                    scope.$apply(function () {
                        modelSetter(scope, element[0].files[0]);
                    });
                });
            }
        };
    }]);

profileApp.service('fileUpload', ['$http', '$q', function ($http, $q) {
        var fileUpload = this;
        fileUpload.fileList = {};

        fileUpload.uploadFileToUrl = function (file, uploadUrl) {
            var defer = $q.defer();
            var fd = new FormData();
            fd.append('file', file);
            $http.post(uploadUrl, fd, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined}
            }).success(function (res) {
                fileUpload.fileList = res;
                defer.resolve(res);

            }).error(function (err, status) {
                defer.reject(err);
            })
            return defer.promise;
        }
        return fileUpload;
    }]);



profileApp.controller('myCtrl', ['$scope', 'fileUpload', '$location', '$rootScope', function ($scope, fileUpload, $location) {


        $scope.isActive = function (viewLocation) {
            return viewLocation === $location.path();
        };

        $scope.uploadFile = function () {

            var listener = $scope.$watch('file', function (newVal) {
                if (newVal) {
                    $scope.file = newVal;
                    var uploadUrl = "avatar";

                    fileUpload.uploadFileToUrl($scope.file, uploadUrl).then(function (res) {
                        $scope.image = fileUpload.fileList.path;
                    }), function (err) {

                    }
                }
            });

            setTimeout(function () {
                listener();
            }, 1000);
        };

        $scope.tabs = [{
                title: 'About',
                url: 'tabs/about.html'
            }, {
                title: 'Photos',
                url: 'tabs/photos.html'
            }, {
                title: 'Messages',
                url: 'chat/messages.html'
            }];

        $scope.currentTab = 'tabs/about.html';

        $scope.onClickTab = function (tab) {
            $scope.currentTab = tab.url;
        }

        $scope.isActiveTab = function (tabUrl) {
            return tabUrl == $scope.currentTab;
        }
    }]);



profileApp.controller('photoCtrl', ['$scope', 'fileUpload', '$http', function ($scope, fileUpload, $http) {
        $scope.initFirst = function () {
            $http.get('/thumbs').success(function (data) {
                $scope.images = data;
            });
        };

        $scope.uploadFile = function () {

            var listener = $scope.$watch('file', function (newVal) {
                if (newVal) {
                    $scope.file = newVal;
                    var uploadUrl = "avatar/1";

                    fileUpload.uploadFileToUrl($scope.file, uploadUrl).then(function (res) {
                        //$scope.thumbs = fileUpload.fileList.path;
                        $scope.initFirst();
                    }), function (err) {

                    }
                }

            });

            setTimeout(function () {
                listener();
            }, 1000);

        };

        $scope.getUrl = function (id, photo) {

            $scope.activeUrl = "upload" + "/" + id + "/" + "thumb_" + photo;
        }

    }]);


profileApp.controller('messageCtr', ['$scope', '$http', function ($scope, $http) {
        
        $scope.allMessage=function(){
             $http.get("getmessage").then(function (response) {
                $scope.allMeesage = response.data;
                 
            });
            
        }
   
        $scope.getMessages = function (email) {
            $http.get("getmessage/"+email).then(function (response) {
                $scope.myData = response.data;
                console.log($scope.myData);

            });
        }

    }]);
