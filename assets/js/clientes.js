var myApp = angular
    .module("myModuleClientes", [])
    .controller("myController", function($scope, $http){
        $scope.busqueda = "";
        $scope.optionsTipoUsuario = [{name:"Cliente", id:1}, {name:"Garante", id:2}, {name:"Usuario", id:3}];
        $scope.selectedTipoUsuario = $scope.optionsTipoUsuario[0];


        $http.post("/./clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'clientes'})
            .then(function(response){
                $scope.clientes=response.data;
                console.log($scope.clientes);
            })

        $scope.buscarcliente=function(){
            $http.post("/./clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'clientes'})
                .then(function(response){
                    $scope.clientes=response.data;
                    console.log($scope.clientes);
                })

        }

        $scope.clienteeliminar=function(codigo_usuario){
            if(confirm("Desea eliminar este cliente?"))
            {
                $http.post("/./clases/consultaajax.php",{'datos':codigo_usuario, 'action':'clientes_eliminar'})
                    .then(function(response){
                        console.log(response.data);
                        $scope.buscarcliente();
                    })
            }

        }
    })
