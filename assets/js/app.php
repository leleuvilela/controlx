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

	$scope.nomeFuncao = "Item";

	$scope.estadoBotao = "Adicionar";

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
	 

	$scope.postData = function(method, data){
		console.log(data);
		$http.post(base_url+method+'/post',
			data)
		.success(function (data) {
		    $scope.posts = data;
		    $scope.exibirForm = 'listar';
		    $scope.form = {};
		    $scope.estadoBotao = "Adicionar";
		});
	}

	$scope.editarPost = function(id){
	    $scope.estadoBotao = "Editar";
	 
	    $http.get(base_url+'dashboard/edit/'+id)
	 
		.success(function (data) {
		 

		    $scope.form.values = data[0];
		    
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