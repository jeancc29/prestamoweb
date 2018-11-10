var myApp = angular
    .module("myModulePersonas", [])
    .controller("myController", function($scope, $http){
        $scope.busqueda = "";
        // $scope.optionsTipoUsuario = [{name:"Cliente", id:1}, {name:"Garante", id:2}, {name:"Usuario", id:3}];
        // $scope.selectedTipoUsuario = $scope.optionsTipoUsuario[0];

         $scope.optionsTipoCliente = [];
        $scope.selectedTipoCliente = {};
        $scope.es_cliente = false;
        $scope.persona = {
          'codigo_usuario':null,
          'nombre':null,
          'sexo':null,
          'identificacion':null,
          'telefono':null,
          'direccion':null,
          'fecha_nacimiento':null,
          'correo':null,
          'idSector':null,
          'tipo_usuario':null,
          'tipo_cliente':null
        }
       

        $scope.load = function(codigo_usuario){

          codigo_usuario = parseInt(codigo_usuario);

          $http.post("/prestamoGitHub/clases/consultaajax.php", {'action':'tipos_registros_obtener_todos_json'})
             .then(function(response){
                 $scope.optionsTipoUsuario =JSON.parse(response.data[0].tipo_persona);
                $scope.selectedTipoUsuario =  $scope.optionsTipoUsuario[0];

                $scope.optionsTipoCliente =JSON.parse(response.data[0].tipo_cliente);
                $scope.selectedTipoCliente =  $scope.optionsTipoCliente[0];

                $scope.optionsTipoSector =JSON.parse(response.data[0].tipo_sector);
                $scope.selectedTipoSector =  $scope.optionsTipoSector[0];

                $scope.optionsSexo = [{'id':'Masculino', 'name':'Hombre'}, {'id':'Femenino', 'name':'Mujer'}];
             $scope.selectedSexo = $scope.optionsSexo[0];

                //console.log(JSON.parse(response.data[0].tipo_sector));

                  console.log('tipo usuario id: ',$scope.optionsTipoUsuario.find(x => x.descripcion === 'Cliente')); 

                  if(angular.isNumber(codigo_usuario) && codigo_usuario != undefined && codigo_usuario > 0 ){
                      console.log('codigo_usuario distinto de undefined', $scope.optionsTipoSector);

                      $http.post("/prestamoGitHub/clases/consultaajax.php", {'action':'personas_obtener_por_id', 'data' : codigo_usuario})
                       .then(function(response){
                           
                           if(response.data[0] != undefined){
                            $scope.persona.codigo_usuario = response.data[0].codigo_usuario;
                            $scope.persona.nombre = response.data[0].nombre;
                            $scope.persona.sexo = response.data[0].sexo;
                            $scope.persona.identificacion = response.data[0].identificacion;
                            $scope.persona.telefono = response.data[0].telefono;
                            $scope.persona.direccion = response.data[0].direccion;
                            $scope.persona.fecha_nacimiento = new Date(response.data[0].fecha_nacimiento);
                            $scope.persona.correo = response.data[0].correo;
                            $scope.selectedTipoSector = $scope.optionsTipoSector.find(x => x.tipo_registro === parseInt(response.data[0].tipo_registro_sector));
                            $scope.selectedTipoUsuario =$scope.optionsTipoUsuario.find(x => x.tipo_registro ===  parseInt(response.data[0].tipo_registro_usuario));
                            $scope.selectedTipoCliente =$scope.optionsTipoCliente.find(x => x.tipo_registro ===   parseInt(response.data[0].tipo_registro_cliente));
                           }
                      });
                   }

             });

             


             
        }

        $http.post("/prestamoGitHub/clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'personas'})
            .then(function(response){
                $scope.clientes=response.data;
                console.log($scope.clientes);
            })

        $scope.buscarcliente=function(){
            $http.post("/prestamoGitHub/clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'personas'})
                .then(function(response){
                    $scope.clientes=response.data;
                    console.log($scope.clientes);
                })

        }

        $scope.clienteeliminar=function(codigo_usuario){
            if(confirm("Desea eliminar este cliente?"))
            {
                $http.post("/prestamoGitHub/clases/consultaajax.php",{'datos':codigo_usuario, 'action':'clientes_eliminar'})
                    .then(function(response){
                        console.log(response.data);
                        $scope.buscarcliente();
                    })
            }

        }

        $scope.personaEditar = function(tipo_usuario, tipo_cliente){

             // $http.post("/prestamoGitHub/clases/consultaajax.php", {'action':'tipos_registros', 'renglon' : 'Cliente'})
             // .then(function(response){
             //      console.log(response);
             //     $scope.optionsTipoCliente =response.data;
             //    // $scope.optionsTipoCliente.push({'tipo_registro': 0, 'descripcion':'Seleccionar...'});
             //    $scope.selectedTipoCliente =  $scope.optionsTipoCliente[0];

             //    console.log( $scope.optionsTipoCliente.length);
                 
             //     if(tipo_cliente !== '' && tipo_cliente !== null && tipo_cliente != 0){
             //          //  alert("Error: El id debe ser valido");
             //          for (var i = $scope.optionsTipoCliente.length - 1; i >= 0; i--) {
             //              if(tipo_cliente == $scope.optionsTipoCliente[i].tipo_registro)
             //              {
             //                $scope.selectedTipoCliente = $scope.optionsTipoCliente[i].tipo_registro;
             //                break;
             //              }
             //          }
                      
                    
             //        }
             //    else{   
             //        for (var i = $scope.optionsTipoCliente.length - 1; i >= 0; i--) {
             //              if($scope.optionsTipoCliente[i].tipo_registro == 0)
             //              {
             //                $scope.selectedTipoCliente = $scope.optionsTipoCliente[i].tipo_registro;
             //                break;
             //              }
             //          }
             //    }
             // })

            $http.post("/prestamoGitHub/clases/consultaajax.php", {'action':'tipos_registros_obtener_todos_json'})
             .then(function(response){
                 $scope.optionsTipoUsuario =JSON.parse(response.data[0].tipo_persona);
                $scope.selectedTipoUsuario =  $scope.optionsTipoUsuario[0];

                $scope.optionsTipoCliente =JSON.parse(response.data[0].tipo_cliente);
                $scope.selectedTipoCliente =  $scope.optionsTipoCliente[0];

                $scope.optionsTipoSector =JSON.parse(response.data[0].tipo_sector);
                $scope.selectedTipoSector =  $scope.optionsTipoSector[0];

                console.log(JSON.parse(response.data[0].tipo_sector));

                  //console.log('tipo usuario id: ',$scope.optionsTipoUsuario.find(x => x.descripcion === 'Cliente'));
                 
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


        $scope.actualizar = function(){
          $scope.persona.idSector = $scope.selectedTipoSector.tipo_registro;
          $scope.persona.tipo_usuario = $scope.selectedTipoUsuario.tipo_registro;
          $scope.persona.tipo_cliente = $scope.selectedTipoCliente.tipo_registro;
          $scope.persona.sexo = $scope.selectedTipoCliente.id;

          console.log($scope.persona);

          $http.post("/prestamoGitHub/clases/consultaajax.php",{'data':$scope.persona, 'action':'persona_actualizar'})
                    .then(function(response){
                        console.log(response.data);
                        if(response.data[0].errores == 0)
                            {
                              alert(response.data[0].mensaje);
                            }
                    })
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
