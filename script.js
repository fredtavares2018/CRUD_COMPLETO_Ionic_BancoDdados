angular.module('App', ['ngCordova'])


.controller('CrudCtrl', ['$scope',
	function($scope,$rootScope,$http,$state,$ionicModal) {

		$scope.input = {};
		   
		   $http.get('http://localhost/Cadastro_Ionic_BancoDdados/lista_clientes.php')
		        .success(function(data) {

		        $scope.Profiles = data;

		        //Caso queira ver a resposta completa do servidor:
		        console.log(data);

		        })  // FIM DO HTTP
	 


	 $scope.Matriz = {}
	    
	 $scope.edit = function(index){
	   $scope.Matriz = $scope.Profiles[index];
	   $scope.Matriz.index = index;
	   $scope.Matriz.editable = true;
	 }
	    
	 $scope.delete = function(index){
	   $scope.Profiles.splice(index,1);
	 }
	    
	 $scope.save = function(index){
	   $scope.Profiles[index].editable = false;
	   
	 }
	    
	 $scope.add = function(){
	   $scope.Profiles.push({
	      name : "",
        country : "",
        editable : true
	   })
	 }
	}
]);