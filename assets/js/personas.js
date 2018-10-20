var myApp = angular
    .module("myModulePersonas", [])
    .controller("myController", function($scope, $http){
        $scope.busqueda = "";
        // $scope.optionsTipoUsuario = [{name:"Cliente", id:1}, {name:"Garante", id:2}, {name:"Usuario", id:3}];
        // $scope.selectedTipoUsuario = $scope.optionsTipoUsuario[0];

         $scope.optionsTipoCliente = [];
        $scope.selectedTipoCliente = {};
        $scope.es_cliente = false;

       


        $http.post("/./clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'personas'})
            .then(function(response){
                $scope.clientes=response.data;
                console.log($scope.clientes);
            })

        $scope.buscarcliente=function(){
            $http.post("/./clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'personas'})
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

        $scope.personaEditar = function(tipo_usuario, tipo_cliente){

             $http.post("/./clases/consultaajax.php", {'action':'tipos_registros', 'renglon' : 'Cliente'})
             .then(function(response){
                 $scope.optionsTipoCliente =response.data;
                 $scope.optionsTipoCliente.push({'tipo_registro': 0, 'descripcion':'Seleccionar...'});
                $scope.selectedTipoCliente =  $scope.optionsTipoCliente[1].tipo_registro;

                console.log( $scope.optionsTipoCliente.length);
                 
                 if(tipo_cliente !== '' && tipo_cliente !== null && tipo_cliente != 0){
                      //  alert("Error: El id debe ser valido");
                      for (var i = $scope.optionsTipoCliente.length - 1; i >= 0; i--) {
                          if(tipo_cliente == $scope.optionsTipoCliente[i].tipo_registro)
                          {
                            $scope.selectedTipoCliente = $scope.optionsTipoCliente[i].tipo_registro;
                            break;
                          }
                      }
                      
                    
                    }
                else{   
                    for (var i = $scope.optionsTipoCliente.length - 1; i >= 0; i--) {
                          if($scope.optionsTipoCliente[i].tipo_registro == 0)
                          {
                            $scope.selectedTipoCliente = $scope.optionsTipoCliente[i].tipo_registro;
                            break;
                          }
                      }
                }
             })

            $http.post("/./clases/consultaajax.php", {'action':'tipos_registros', 'renglon' : 'usuario'})
             .then(function(response){
                 $scope.optionsTipoUsuario =response.data;
                $scope.selectedTipoUsuario =  $scope.optionsTipoUsuario[0].tipo_registro;
                 
                     if(tipo_usuario !== '' || tipo_usuario !== null){
                   //alert("Error: El id debe ser valido");
                      for (var i = $scope.optionsTipoUsuario.length - 1; i >= 0; i--) {
                          if(tipo_usuario == $scope.optionsTipoUsuario[i].tipo_registro)
                          {
                            $scope.selectedTipoUsuario = $scope.optionsTipoUsuario[i].tipo_registro;
                
                            break;
                          }
                      }
                        
                    }

                    $scope.usuarioChange();
             })

             

           
            
            // id = parseFloat(id);
            // console.log("Despues de convertir: ", id);
            // if(!angular.isNumber(id)){
            //   alert("Error: El id debe ser valido");
            //   return;
            // }



            
        }

        $scope.usuarioChange = function(){
            var encontrado = false;
             
             for (var i = $scope.optionsTipoUsuario.length - 1; i >= 0; i--) {
                          if($scope.selectedTipoUsuario == $scope.optionsTipoUsuario[i].tipo_registro)
                          {
                            if($scope.optionsTipoUsuario[i].descripcion == 'Cliente')
                            {
                                encontrado = true;
                                break;
                            }
                          }
                      }

            if(encontrado) $scope.es_cliente = true;
        }
    })
