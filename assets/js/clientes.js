var myApp = angular
    .module("myModuleClientes", [])
    .controller("myController", function($scope, $http){
        $scope.busqueda = "";
        $scope.optionsTipoUsuario = [{name:"Cliente", id:1}, {name:"Garante", id:2}, {name:"Usuario", id:3}];
        $scope.selectedTipoUsuario = $scope.optionsTipoUsuario[0];


<<<<<<< HEAD
        $http.post("/prestamoGitHub/clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'clientes'})
=======
        $http.post("/./clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'clientes'})
>>>>>>> 75af20c6caca26357ecb844a7ea5f0dc8553b422
            .then(function(response){
                $scope.clientes=response.data;
                console.log($scope.clientes);
            })

        $scope.buscarcliente=function(){
<<<<<<< HEAD
            $http.post("/prestamoGitHub/clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'clientes'})
=======
            $http.post("/./clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'clientes'})
>>>>>>> 75af20c6caca26357ecb844a7ea5f0dc8553b422
                .then(function(response){
                    $scope.clientes=response.data;
                    console.log($scope.clientes);
                })

        }

        $scope.clienteeliminar=function(codigo_usuario){
            if(confirm("Desea eliminar este cliente?"))
            {
<<<<<<< HEAD
                $http.post("/prestamoGitHub/clases/consultaajax.php",{'datos':codigo_usuario, 'action':'clientes_eliminar'})
=======
                $http.post("/./clases/consultaajax.php",{'datos':codigo_usuario, 'action':'clientes_eliminar'})
>>>>>>> 75af20c6caca26357ecb844a7ea5f0dc8553b422
                    .then(function(response){
                        console.log(response.data);
                        $scope.buscarcliente();
                    })
            }

        }
    })
