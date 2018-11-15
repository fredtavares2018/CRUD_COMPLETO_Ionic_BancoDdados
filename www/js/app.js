// Ionic Starter App

angular.module('starter', ['ionic'])

.run(function($ionicPlatform) {
    $ionicPlatform.ready(function() {
        // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
        // for form inputs)
        if (window.cordova && window.cordova.plugins.Keyboard) {
            cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
        }
        if (window.StatusBar) {
            StatusBar.styleDefault();
        }
    });
})

.controller('AppCtrl', function($scope, $http, $state, $window) {
   
    $scope.data = {};

    $scope.gravar = function(form){
        var link = 'http://localhost/IonicServerSave/PHP/api_gravar.php';

        var nome = form.username;

        $http.post(link, 
            {username : nome}
            ).then(function (res){
            $scope.response = res.data;
            $window.location.reload();
        });
    };   // fim do gravar



     $scope.data = {};

    $scope.clonar = function(nome){
        var link = 'http://localhost/IonicServerSave/PHP/api_gravar.php';

        var nomeClonar = nome;

            $http.post(link, 
                {username : nomeClonar}
                ).then(function (res){
                $scope.response = res.data;
                $window.location.reload();
            });
        };   // fim do gravar




            $scope.del = [];
            $scope.excluir = function(id){

                var excluirID = id;

                console.log("Entrou excluir",excluirID);

                $http.post('http://localhost/IonicServerSave/PHP/api_excluir.php', 
                {
                  id : excluirID,

                }).success(function (res){
                $scope.response = res.del;
                $window.location.reload();
                });

            }   //  fim excluir




            $scope.editar = function(id,nome){

                console.log("entrou ed",nome);

                var id_Add = id;
                var nomeAdd = nome;

                console.log("entrou editar",id_Add,nomeAdd);

                 $scope.edt = {};

                    $http.post('http://localhost/IonicServerSave/PHP/api_editar.php', 
                        {
                            id : id_Add,
                            nome : nomeAdd, 
                            
                            
                        }).then(function (res){
                        $scope.response = res.edt;
                        console.log("voltou editar ",$scope.response);
                        $window.location.reload();
                       //  isso aqui vai no locar do erro ou acerto
                        // var erroMsg = "Sucesso ao editar";
                        // var titulo = "Edição de CADASTRO";
                        // $scope.showAlert(titulo, erroMsg);
                    });  

            };  // fim edit






        $scope.input = {};    

        $http.get('http://localhost/IonicServerSave/PHP/api_listar.php')
        .success(function(data) {

        $scope.clientes = data;

        //Caso queira ver a resposta completa do servidor:
        console.log("Clientes",data);

        })




});