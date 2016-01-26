myApp.controller('GreetingController', ['$scope', function ($scope) {
        $scope.greeting = 'Hola!';
    }]);


myApp.controller('StepContr', ['$rootScope', function ($rootScope) {


    }]);


myApp.controller('GeneralController', ['$scope', '$location', '$http', '$localStorage','$timeout', function ($scope, $location, $http, $localStorage,$timeout) {
        $scope.emailBlurred = function (isValid) {
            if (isValid) {
                $scope.badEmailAddress = false;
                $http.post("/email", {'email': $scope.email}).success(function (res) {
                    if (res.countEmail === 0) {
                        $scope.myform.email.$setValidity("email", true);                     
                    } else {
                        $scope.myform.email.$setValidity("email", false);
                         $scope.exist=true;
                         $timeout(function () {$scope.exist=false; }, 3000); 
                    }
                });
            }
        };

        $scope.items = [{
                id: 0,
                label: 'Male',
            }, {
                id: 1,
                label: 'Female',
            }];

        $scope.inputType = "password";
        $scope.$on('$locationChangeStart', function (event) {
            if ($scope.myform.$invalid) {
                event.preventDefault();
            }
        });

        $scope.isActive = function (viewLocation) {
            return viewLocation === $location.path();
        };

        $scope.hideShowPassword = function () {
            if ($scope.inputType === 'password') {
                $scope.inputType = 'text';
            } else {
                $scope.inputType = 'password';
            }
        };
        $scope.addGeneral = function () {
            $localStorage.general = {email: $scope.email, password: $scope.password, name: $scope.name, birthday: $scope.date, gender: $scope.selected};
        };
        if (typeof $localStorage.general != 'undefined') {
            $scope.info = $localStorage.general;
            $scope.email = $localStorage.general.email;
            $scope.password = $localStorage.general.password;
            $scope.name = $localStorage.general.name;
            $scope.date = $localStorage.general.birthday;
            $scope.gender = $localStorage.general.gender.id;
            $scope.selected = $scope.items[$scope.gender];
        }

    }]);

myApp.controller('InterestController', ['$scope', '$location', '$localStorage', function ($scope, $location, $localStorage) {
        $scope.isActive = function (viewLocation) {
            return viewLocation === $location.path();
        };
        $scope.$on('$locationChangeStart', function (event) {
            if ($scope.myform.$invalid) {
                event.preventDefault();
            }
        });

        $scope.addInterest = function () {

            $localStorage.interest = {sport: $scope.sport, movie: $scope.movie, book: $scope.book, club: $scope.club};
        };
        if (typeof $localStorage.interest != 'undefined') {
            $scope.interest = $localStorage.interest;
            $scope.sport = $localStorage.interest.sport;
            $scope.movie = $localStorage.interest.movie;
            $scope.book = $localStorage.interest.book;
            $scope.club = $localStorage.interest.club;
        }

    }]);

myApp.controller('LocationController', ['$scope', '$location', '$http', '$localStorage', function ($scope, $location, $http, $localStorage) {
        $scope.isActive = function (viewLocation) {
            return viewLocation === $location.path();
        };
        $scope.$on('$locationChangeStart', function (event) {
            if ($scope.myform.$invalid) {
                event.preventDefault();
            }
        });
        if (typeof $localStorage.location != 'undefined') {
            $scope.hometown = $localStorage.location.hometown.id;
            $scope.current = $localStorage.location.current.id;
            $scope.favorite = $localStorage.location.favorite.id;
        } else {
            $scope.hometown = 0;
            $scope.current = 0;
            $scope.favorite = 0;
        }

        $http.get('town.json').success(function (data) {
            $scope.towns = data;
            $scope.selectedTown = $scope.towns[$scope.hometown];
            $scope.currentdTown = $scope.towns[$scope.current];

        });

        $http.get('country.json').success(function (data) {
            $scope.countries = data;
            $scope.favoriteTown = $scope.countries[$scope.favorite];
        });

        $scope.addLocation = function () {
            $localStorage.location = {hometown: $scope.selectedTown, current: $scope.currentdTown, favorite: $scope.favoriteTown};
        }


    }]);

myApp.controller('FoodController', ['$scope', '$location', '$localStorage', '$http','$window', function ($scope, $location, $localStorage, $http,$window) {

        $scope.isActive = function (viewLocation) {
            return viewLocation === $location.path();
        };

        $scope.$on('$locationChangeStart', function (event) {
            if ($scope.myform.$invalid) {
                event.preventDefault();
            }
        });

        $scope.addVision = function () {
            $localStorage.vision = {height: $scope.height, eyes: $scope.eyes, hair: $scope.hair, weight: $scope.weight};
            $http.post('/create', [
                $localStorage.general, $localStorage.education, $localStorage.interest, $localStorage.location, $localStorage.vision
            ]).success(function (data, status, headers, config) {
                     if(data.perfect){
                     $localStorage.$reset();
                     $window.location.href = '/me';
                 }
             
            });
        };

        $scope.addLast = function () {
            $localStorage.vision = {height: $scope.height, eyes: $scope.eyes, hair: $scope.hair, weight: $scope.weight};

        }

        if (typeof $localStorage.vision != 'undefined') {
            $scope.height = $localStorage.vision.height;
            $scope.eyes = $localStorage.vision.eyes;
            $scope.hair = $localStorage.vision.hair;
            $scope.weight = $localStorage.vision.weight;
        }
    }]);


myApp.controller('EducationController', ['$scope', '$location', '$localStorage', function ($scope, $location, $localStorage) {
        $scope.isActive = function (viewLocation) {
            return viewLocation === $location.path();
        };
        $scope.addEducation = function () {
            $localStorage.education = {work: $scope.work, college: $scope.college, hight: $scope.hight};
        };
        $scope.$on('$locationChangeStart', function (event) {
            if ($scope.myform.$invalid) {
                event.preventDefault();
            }
        });
        if (typeof $localStorage.education != 'undefined') {
            $scope.education = $localStorage.education;
            $scope.work = $localStorage.education.work;
            $scope.college = $localStorage.education.college;
            $scope.hight = $localStorage.education.hight;
        }
    }]);


