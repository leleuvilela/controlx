var controlx = angular.module('controlx', ['ngRoute', 'ui.materialize']);

var base_url = '/controlx/';

controlx.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
    link: function(scope, element, attrs) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
            });
        });
    }
   };
}]);

// We can write our own fileUpload service to reuse it in the controller
controlx.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(file, uploadUrl, name){
    	 var id;
         var fd = new FormData();
         fd.append('file', file);
         fd.append('name', name);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         })
         .success(function(id){
            console.log("Successss");
         })
         .error(function(){
            console.log("Success(?)");
         });
         // return id;
     }
 }]);


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

      .when('/files', {
 
         templateUrl: base_url+'pages/files.html',
 
         controller: 'filesController',
 
       })

      .otherwise({redirectTo:'/'});
});



controlx.controller('homeController', ['$scope', '$location', '$log', function ($scope, $location, $log){
 
   $scope.nome = <?php echo "'Visitante'" ?>;
 
}]);
 
controlx.controller('itemsController', ['$scope', '$location', '$log','$http', function ($scope, $location, $log, $http){

	var table = "items";

	$scope.nomeFuncao = "Item";

	$scope.estadoBotao = "Adicionar";

    $scope.frmToggle = function() {

         $('#thisForm').slideToggle();

    }

    $scope.frmOpen = function (){
    	$('#thisForm').slideDown();
    }
 
	$http.get(base_url+'main/get/'+table)
	 
		.success(function(data) {
		    $scope.posts = data;
		})

		.error(function(data, status) {
		    $log.error(status);
		});
	 

	$scope.postData = function(method, data){
		console.log(data);
		$http.post(base_url+method+'/post/'+table,
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
	 
	    $http.get(base_url+'main/edit/'+id+'/'+table)
	 
		.success(function (data) {
		 

		    $scope.form.values = data[0];
		    
		    $scope.exibirForm = 'add';


		 
		});
	 
	}

	$scope.apagarPost = function(id){

		$http.post(base_url+'main/delete/'+table,
	      {
	           'id' : id,
	      })
	 
		.success(function (data) {
		 
		    $scope.posts = data;
		 
		});

	}
}]);

controlx.controller('filesController', ['$scope', '$location', '$log','$http', 'fileUpload', function ($scope, $location, $log, $http, fileUpload){

	var table = "items";

	$scope.nomeFuncao = "Item";

	$scope.estadoBotao = "Adicionar";

    $scope.frmToggle = function() {

         $('#thisForm').slideToggle();

    }

    $scope.frmOpen = function (){
    	$('#thisForm').slideDown();
    }

    $scope.uploadFile = function(file){
        var archive = file.file;
        console.log('file is ' );
        console.dir(archive);

        var uploadUrl = base_url+'main/upload/';
        var text = file.title;
        fileUpload.uploadFileToUrl(archive, uploadUrl, text);
   	};
 
	$http.get(base_url+'main/get/'+table)
	 
		.success(function(data) {
		    $scope.posts = data;
		})

		.error(function(data, status) {
		    $log.error(status);
		});
	 

	$scope.postData = function(method, data, file){

		var uploadUrl = base_url+'main/upload/';
		var teste;

		fileUpload.uploadFileToUrl(file.file, uploadUrl, file.title);

		$http.get(base_url+'main/lastId/')
		.success(function (data) {
			$scope.id = data;
			console.log($scope.id);
			data.file_id = $scope.id;
		});


		console.log(data);

		$http.post(base_url+method+'/post/'+table, data)
		.success(function (data) {
		    $scope.posts = data;
		    $scope.exibirForm = 'listar';
		    $scope.form = {};
		    $scope.estadoBotao = "Adicionar";
		});
	}

	$scope.editarPost = function(id){
	    $scope.estadoBotao = "Editar";
	 
	    $http.get(base_url+'main/edit/'+id+'/'+table)
	 
		.success(function (data) {
		 

		    $scope.form.values = data[0];
		    
		    $scope.exibirForm = 'add';


		 
		});
	 
	}

	$scope.apagarPost = function(id){

		$http.post(base_url+'main/delete/'+table,
	      {
	           'id' : id,
	      })
	 
		.success(function (data) {
		 
		    $scope.posts = data;
		 
		});

	}
}]);