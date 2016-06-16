var myApp = angular.module('myApp', ['ngRoute']);

myApp.config(function ($routeProvider){

	$routeProvider

	.when('/', {
		templateUrl: '../dashboard/pages/walkinLog.php',
		controller: 'mainController'

	})

	.when('/loglist', {
		templateUrl: '../dashboard/pages/loglist.html',
		controller: 'loglistController',

		

	})

	.when('/addmember', {
		templateUrl: 'pages/addmember.html',
		controller: 'addmemberController',

		

	})

	.when('/loglistexp', {
		templateUrl: '../dashboard/pages/loglistexperiment.php',
		controller: 'loglistController',

		

	})




});

myApp.controller('mainController', ['$scope', '$log','$location','$route', function($scope, $route,$log){



}]);


myApp.controller('loglistController', ['$scope', '$http', function ($scope, $http) {
            
	

            $scope.data=[];
     $scope.selectedMember={ firstname:"",lastname:"",gender:"",type:"" };

            $http.get("loglistajax.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });

                $scope.showInEdit=function(member){
           $scope.selectedMember = member;
     };

                

 }]);

myApp.controller('wtever', ['$scope', '$log','$route', '$state', function($scope, $route, $log, $state){


}]);