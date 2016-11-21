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

	var lorem = [
      'Single latte grounds Sit rich black extra seasonal medium filter qui sugar caffeine. Cream arabica cup go body acerbic cinnamon espresso shot americano origin foam extraction froth café.',
      'Iced french variety aftertaste milk ristretto white instant skinny filter redeye sweet galão whipped dripper. Cinnamon that so mazagran Coffee crema cup cortado turkish breve foam siphon panna french aroma.',
      'Arabica cinnamon doppio viennese rich sugar percolator white cappuccino panna plunger fair extraction brewed. Saucer froth irish barista ut half aged Sit filter caffeine aftertaste sit macchiato.'
    ];

    $scope.tabs = [
      {heading: 'Tab 1', content: lorem[0], disable: false},
      {heading: 'Tab 2', content: lorem[1], disable: false},
      {heading: 'Disabled Tab 3', content: 'This tab is disabled', disable: true},
      {heading: 'Tab 4', content: lorem[2], disable: false}
    ];
 
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
		});
	}

	$scope.editarPost = function(id){
	 
	    $http.get(base_url+'dashboard/edit/'+id)
	 
		.success(function (data) {
		 
		    console.log($scope.form)
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