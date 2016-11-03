var controlx = angular.module('controlx', ['ngRoute', 'ui.materialize']);

var base_url = '/controlx/';


controlx.config(function($routeProvider){
	$routeProvider
 
      .when('/', {
 
         templateUrl: base_url+'pages/home.html',
 
         controller: 'homeController',
 
       })
 
      .when('/items', {
 
         templateUrl: base_url+'pages/items.html',
 
         controller: 'itemsController',
 
       })
      .when('/items/edit', {

  		 templateUrl: base_url+'pages/items.html',
 
         controller: 'itemsController',

      })
      .otherwise({redirectTo:'/'});
});

controlx.controller('homeController', ['$scope', '$location', '$log', function ($scope, $location, $log){
 
   $scope.nome = <?php echo "'Visitante'" ?>;
 
}]);
 
controlx.controller('itemsController', ['$scope', '$location', '$log','$http', function ($scope, $location, $log, $http){
 
    $scope.frmToggle = function() {

         $('#blogForm').slideToggle();

    }
 
	$http.get(base_url+'dashboard/get')
	 
		.success(function(data) {
		    $scope.posts = data;
		})

		.error(function(data, status) {
		    $log.error(status);
		});
	 
	$scope.criarPost = function(){
	 
	    $http.post(base_url+'dashboard/post/',
	      {
	      	   'id' : $scope.form.id,
	           'title' : $scope.form.title,
	           'description' : $scope.form.description
	      })
	 
		.success(function (data) {
		 	
		    $scope.posts = data;
		    $scope.exibirForm = 'listar';

		});
	 
	}

	$scope.editarPost = function(id){
	 
	    $http.get(base_url+'dashboard/edit/'+id)
	 
		.success(function (data) {
		 
		    console.log($scope.form)
		    $scope.form = data[0];
		    
		    $scope.exibirForm = 'add';


		 
		});
	 
	}

	$scope.apagarPost = function(id){

		$http.post(base_url+'dashboard/delete',
	      {
	           'id' : id,
	      })
	 
		.success(function (data) {
		 
		    $scope.posts = data;
		 
		});

	}
 
}]);