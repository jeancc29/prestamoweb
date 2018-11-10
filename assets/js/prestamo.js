var myApp = angular
    .module("myModulePrestamo", [])
    .controller("myController", function($scope,$http, $log){


      $scope.busqueda = "";
      $scope.cliente = "";
      $scope.garante = "";
      $scope.titulo = "";
      $scope.titulo_seleccionado = "";
      $scope.cliente_o_garante_o_cobrador = 1;
      $scope.seleccionado = [];
      $scope.tasa = 0;
      $scope.interes = 0;
      $scope.monto = 0;
      $scope.cuotas = 0;
      $scope.formapago = 0;
      $scope.TipoInteres = 0;
      $scope.fecha = new Date();
      var d = [];

        //$scope.optionsTipoPrestamo = [{name: "Personal", id: 1}, {name: "Hipotecario", id: 2}, {name: "Estudio", id: 3}];
        //$scope.selectedTipoPrestamo = $scope.optionsTipoPrestamo[0];

      

        // $scope.prestamoDatos = {
        //     'id_registro':$scope.selectedTipoInteres.id,
        //     'tipo_interes':null,
        //     'codigo_usuario':null,
        //     'codigo_usuario_garante':null,
        //     'tasa':null,
        //     'cuotas':null,
        //     'fecha':null,
        //     'monto_prestamo':null,
        //     'mora':null,
        //     'TipoInteres':$scope.selectedTipoPrestamo.id,
        //     'formapago':$scope.selectedFormaPago.id,
        //     'detalle':null,
        //     'tipo_interes':

        // };


        $scope.prestamoDatos = {
            'id_registro' : null,
            'tipo_registro_documento' : null,
            'documento' : '',
            'fecha' : null,
            'codigo_usuario' : null,
            'codigo_usuario_registro' : null,
            'capital' : null,
            'porciento_interes' : null,
            'cantidad_cuotas' : null,
            'valor_cuotas' : null,
            'codigo_usuario_garante' : null,
            'monto_prestamo' : null,
            'tipo_registro_sucursal' : 0,
            'estado' : null,
            'completado' : null,
            'tipo_prestamo' : 1,
            'detalle' : null,
            'formapago' : 1,
            'mora' : null,
            'tipo_interes' : 1,
            'dias_gracia' : null,
            'fecha_pago':null,
            'codigo_usuario_cobrador':null
        };





      $scope.buscarPersona=function(){
    		$http.post("/./clases/consultaajax.php",{'data':$scope.datosBusqueda, 'action':'persona_buscar'})
    		.then(function(data){
    			$scope.data=data;
          console.log($scope.data);
    		})

    	}


        $scope.displayStud=function(){
      		$http.get("../clases/consultaajax.php")
      		.success(function(data){
      			$scope.data=data
      		})
      	}

        $scope.agregarCliente = function(data){
            if($scope.cliente_o_garante_o_cobrador == 1){
                $scope.cliente = data;
                $scope.prestamoDatos.codigo_usuario = parseFloat(data.codigo_usuario);
            }
            else if($scope.cliente_o_garante_o_cobrador == 2){
                $scope.garante = data;
                  $scope.prestamoDatos.codigo_usuario_garante = parseFloat(data.codigo_usuario);
            }
            else{
                $scope.cobrador = data;
                  $scope.prestamoDatos.codigo_usuario_cobrador = parseFloat(data.codigo_usuario);
            }
            $('#myModal').modal('hide');
          
            

          $scope.data = [];

        }


        $scope.seleccionar= function(data){
            $scope.seleccionado = d = data;
            if($scope.cliente_o_garante_o_cobrador == 1){
                $scope.cliente = d ;
            }
            else if($scope.cliente_o_garante_o_cobrador == 2){
                $scope.garante = d ;
            }
            else{
                $scope.cobrador = d ;
            }


        }

        $scope.datosForumario = function(cliente_o_garante_o_cobrador){
            $scope.datosBusqueda = {
                'datos':'',
                'tipoPersona' : ''
            };

            if(cliente_o_garante_o_cobrador == 1){
                $scope.titulo = "Clientes";
                $scope.titulo_seleccionado = "Cliente seleccionado";
                $scope.cliente_o_garante_o_cobrador = cliente_o_garante_o_cobrador;
                $scope.data = [];
                $scope.seleccionado = [];
                $scope.datosBusqueda.tipoPersona = 'Cliente';
            }
            else if(cliente_o_garante_o_cobrador == 2){
                $scope.titulo = "Garantes";
                $scope.titulo_seleccionado = "Garante seleccionado";
                $scope.cliente_o_garante_o_cobrador = cliente_o_garante_o_cobrador;
                $scope.data = [];
                $scope.seleccionado = [];
                $scope.datosBusqueda.tipoPersona = 'Cliente';
            }
            else{
                $scope.titulo = "Cobradores";
                $scope.titulo_seleccionado = "Cobrador seleccionado";
                $scope.cliente_o_garante_o_cobrador = cliente_o_garante_o_cobrador;
                $scope.data = [];
                $scope.seleccionado = [];
                $scope.datosBusqueda.tipoPersona = 'Cobrador';
            }
        }

        $scope.amortizar = function(){

            console.log( "TipoInteres: ",$scope.selectedTipoInteres.tipo_registro);
            // if(!angular.isNumber($scope.prestamoDatos.tasa)){
            //     alert("Error: El interes o tasa debe ser numerico y no debe estar vacio");
            //     return;
            // }
            // else if($scope.prestamoDatos.tasa <= 0){
            //     alert("Error: El interes o tasa debe ser mayor que cero");
            //     return;
            // }

            // if(!angular.isNumber($scope.prestamoDatos.cuotas)){
            //     alert("Error: El numero de cuotas debe ser numerico y no debe estar vacio");
            //     return;
            // }
            // else if($scope.prestamoDatos.cuotas <= 0){
            //     alert("Error: El numero de cuotas debe ser mayor que cero");
            //     return;
            // }

            // if(!angular.isNumber($scope.prestamoDatos.montoprestamo)){
            //     alert("Error: El monto debe ser numerico y no debe estar vacio");
            //     return;
            // }
            // else if($scope.prestamoDatos.montoprestamo <= 0){
            //     alert("Error: El monto debe ser mayor que cero");
            //     return;
            // }
            $scope.datosValidos = false;

            if($scope.selectedTipoPrestamo.id != 1){
                if($scope.prestamoDatos.tasa <= 0 || $scope.prestamoDatos.cuotas <= 0 || $scope.prestamoDatos.monto_prestamo <= 0){
                    alert("Error: La tasa, cuotas y monto debe ser mayores que cero");
                    return;
                }
            }
            else{
                if($scope.prestamoDatos.tasa <= 0 && $scope.prestamoDatos.cuotas <= 0){
                    alert("Error: El monto, cuotas deben ser mayores que cero");
                    return;
                }
                if($scope.prestamoDatos.valor_cuotas <= 0 && $scope.prestamoDatos.tasa <= 0){
                    alert("Error: El valor de la cuota y la tasa deben ser mayores que cero");
                    return;
                }
            }

            if($scope.prestamoDatos.tasa > 100 || $scope.prestamoDatos.tasa < 0){
                alert("Error: La tasa debe ser mayor que cero(0) y menor que cien(100)");
                    return;
            }

            $scope.prestamoDatos.tipo_interes = $scope.selectedTipoInteres.id;
            $scope.prestamoDatos.formapago = $scope.selectedFormaPago.id;
            $scope.prestamoDatos.fecha_pago = $scope.prestamoDatos.fecha;

            $scope.datosValidos = true;

            $http.post("/./clases/consultaajax.php",
                  {'data':$scope.prestamoDatos,
                  'action':'amortizar'})
                .then(function(data){
                    $scope.data=data;
                    console.log($scope.data);
                })


                  if($scope.datosValidos ){
                   $('#myModalAmortizacion').modal('show');
                  }
        }


    $scope.verPrestamo = function(data){
        $scope.tasa = data.porciento_interes;
        $scope.cuotas = data.cantidad_cuotas;
        $scope.monto = data.monto_prestamo;
        $scope.balance_pendiente = data.balance_pendiente;
        $scope.interes_pendiente = data.interes_pendiente;
        $scope.monto_pagado = data.monto_pagado;
        $scope.cuotas_pagadas = data.cuotas_pagadas;
        $scope.fecha_ultimo_pago = data.fecha_ultimo_pago;
        $scope.detalle = data.detalle;
        $scope.selectedFormaPago = $scope.optionsFormaPago[data.formapago - 1];
        $scope.selectedTipoInteres= $scope.optionsTipoInteres[data.tipo_registro_TipoInteres - 1];
            // console.log(data.porciento_interes);
            // $scope.tasa = data.porciento_interes;
            // $scope.cuotas = data.cantidad_cuotas;
            // $scope.monto = data.monto_prestamo;
            // $scope.detalle = data.detalle;
            // $scope.selectedFormaPago = $scope.optionsFormaPago[data.formapago - 1];
            // $scope.selectedTipoInteres= $scope.optionsTipoInteres[data.tipo_registro_TipoInteres - 1];
            //
            // console.log( "interes: ",$scope.interes);
            // console.log( "cuotas: ",$scope.cuotas);
            // console.log( "monto: ",$scope.monto);
            // console.log( "TipoInteres: ",$scope.TipoInteres);
            // console.log( "formapago: ",$scope.formapago);

            // $http.post("/./clases/consultaajax.php",
            //                                 {'tasa':$scope.tasa,
            //                                     'cuotas':$scope.cuotas,
            //                                     'interes':$scope.interes,
            //                                     'monto':$scope.monto,
            //                                     'TipoInteres':$scope.TipoInteres,
            //                                     'formapago':$scope.formapago,
            //                                     'action':'amortizar'})
            //     .then(function(data){
            //         $scope.data=data;
            //         console.log($scope.data);
            //     })
        }


       $scope.prestamos = $http.post("/./clases/consultaajax.php", {'action':'prestamos_obtener_todos'})
            .then(function(response){
                $scope.prestamos=response.data;
                console.log(Date());
                console.log($scope.fecha);
            })


        $scope.buscarprestamo=function(){
            $http.post("/./clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'prestamos_buscar'})
                .then(function(response){
                    $scope.prestamos=response.data;
                    console.log($scope.data);
                })

        }



            $scope.load = function(id_registro, codigo_usuario_registro){
                id_registro = parseInt(id_registro);
                $scope.prestamoDatos.codigo_usuario_registro = codigo_usuario_registro;

                $scope.optionsFormaPago = [{name:"Diario", id:1}, {name:"Semanal", id:2}, {name:"Quincenal", id:3}, {name:"Mensual", id:4}, {name:"Anual", id:5}];
                $scope.selectedFormaPago = $scope.optionsFormaPago[3]

                $scope.optionsTipoInteres = [{name:"Soluto directo", id:1}, {name:"Insoluto", id:2}, {name:"Amortizacion", id:3}, {name:"Redito", id:4}];
                $scope.selectedTipoInteres = $scope.optionsTipoInteres[0];

                //URL para cuando este en azure /./clases/consultaajax.php

                $http.post("/./clases/consultaajax.php", {'action':'interes'})
                     .then(function(response){
                         $scope.optionsTipoPrestamo=response.data;
                         $scope.selectedTipoPrestamo = $scope.optionsTipoPrestamo[1];

                         console.log($scope.optionsTipoPrestamo);
                         if(angular.isNumber(id_registro) && id_registro != undefined && id_registro > 0 ){
                              
                               $http.post("/./clases/consultaajax.php", {'action':'prestamos_obtenerpor_id',
                                  'id_registro':id_registro
                                })
                                    .then(function(response){
                                        console.log(response.data[0]);
                                        // if(response.data.length < 1) return;
                                        // if(response.data[0].fecha_ultimo_pago != "No tiene"){
                                        //   alert("No se puede editar porque ya tiene pago");
                                        //   $scope.inicializarComponentes();
                                        //   return;

                                            $scope.inicializarComponentes();
                                            $scope.prestamoDatos.id_registro=response.data[0].id_registro;
                                            $scope.prestamoDatos.tipo_interes=response.data[0].tipo_registro_interes;
                                            $scope.prestamoDatos.codigo_usuario= parseInt(response.data[0].codigo_usuario_cliente);
                                            $scope.prestamoDatos.codigo_usuario_garante=response.data[0].codigo_usuario_garante;
                                            $scope.prestamoDatos.codigo_usuario_cobrador=response.data[0].codigo_usuario_cobrador;
                                            $scope.prestamoDatos.porciento_interes= parseInt(response.data[0].porciento_interes);
                                            $scope.prestamoDatos.cantidad_cuotas= parseFloat(response.data[0].cantidad_cuotas),
                                            $scope.prestamoDatos.fecha= new Date(response.data[0].fecha);
                                            $scope.prestamoDatos.monto_prestamo= parseFloat(response.data[0].monto_prestamo);
                                            $scope.prestamoDatos.mora= parseFloat(response.data[0].mora);
                                            $scope.prestamoDatos.valor_cuotas= parseFloat(response.data[0].valor_cuotas);
                                            $scope.prestamoDatos.dias_gracia= parseFloat(response.data[0].dias_gracia);

                                            $scope.selectedFormaPago = $scope.optionsFormaPago.find(x => x.id === parseInt(response.data[0].formapago));
                                            $scope.selectedTipoInteres =$scope.optionsTipoInteres.find(x => x.id ===  parseInt(response.data[0].tipo_registro_interes));
                                            $scope.selectedTipoPrestamo =$scope.optionsTipoPrestamo.find(x => parseInt(x.tipo_registro) ===   parseInt(response.data[0].tipo_registro_tipoprestamo));

                                            console.log($scope.optionsTipoPrestamo.find(x => x.tipo_registro === 92), 'id_tipoprestamo: ', parseInt(response.data[0].tipo_registro_tipoprestamo));

                                            $scope.prestamoDatos.detalle=response.data[0].detalle;
                                            $scope.cliente = {"codigo_usuario":response.data[0].codigo_usuario_cliente, "nombre":response.data[0].nombre_cliente};
                                            $scope.garante = {"codigo_usuario":response.data[0].codigo_usuario_garante, "nombre":response.data[0].nombre_garante};
                                            $scope.cobrador = {"codigo_usuario":response.data[0].codigo_usuario_cobrador, "nombre":response.data[0].nombre_cobrador};
                                            
                                            if(response.data[0].codigo_usuario_garante >0) $scope.chkGarante = true;

                                        
                                    })


                          }


                         $scope.inicializarComponentes();
                     })
            }


          $scope.prestamoGuardar = function(codigo_usuario_registro){
           console.log('Datos prestamo ',$scope.prestamoDatos);
            if(!angular.isNumber($scope.prestamoDatos.codigo_usuario)){
                alert("Error: Debe seleccionar un cliente");
                return;
            }


            
            else if($scope.prestamoDatos.tasa <= 0){
                alert("Error: El interes o tasa debe ser mayor que cero");
                return;
            }

           
            else if($scope.prestamoDatos.cuotas <= 0){
                alert("Error: El numero de cuotas debe ser mayor que cero");
                return;
            }

            
            else if($scope.prestamoDatos.monto_prestamo <= 0){
                alert("Error: El monto debe ser mayor que cero");
                return;
            }


            $scope.prestamoDatos.tipo_prestamo = $scope.selectedTipoPrestamo.tipo_registro;
            $scope.prestamoDatos.tipo_interes = $scope.selectedTipoInteres.id;
            $scope.prestamoDatos.formapago = $scope.selectedFormaPago.id;


            $http.post("/./clases/consultaajax.php", {'action':'prestamos_guardar',
              'data':$scope.prestamoDatos})
                .then(function(response){
                    console.log(response.data);
                    alert("Se ha guardado correctamente");
                })


            // $http.post("/./clases/consultaajax.php",
            //                                 {'action':'prestamos_guardar',
            //                                   ':codigo_usuario':$scope.prestamoDatos.codigo_usuario,
            //                                   ':codigo_usuario_registro':codigo_usuario_registro,
            //                                   ':capital':$scope.prestamoDatos.montoprestamo,
            //                                   ':porciento_interes':$scope.prestamoDatos.tasa,
            //                                   ':cantidad_cuotas':$scope.prestamoDatos.cuotas,
            //                                   ':codigo_usuario_garante':$scope.prestamoDatos.codigo_usuario_garante,
            //                                   ':monto_prestamo':$scope.prestamoDatos.montoprestamo,
            //                                   ':tipo_prestamo':$scope.prestamoDatos.TipoInteres,
            //                                   ':detalle':$scope.prestamoDatos.detalle,
            //                                   ':formapago':$scope.prestamoDatos.formapago,
            //                                   ':fecha':$scope.prestamoDatos.fecha,
            //                                   ':mora':$scope.prestamoDatos.mora,
            //                                   ':tipo_interes':$scope.prestamoDatos.tipo_interes
            //                                   })
            //     .then(function(response){
            //
            //         console.log(response.data);
            //     })
        }

          $scope.prestamoEditar = function(id_registro){
            //id_registro = parseFloat(id_registro);

            console.log("Prestamo: ", id_registro);

            if(id_registro === '' || id_registro == null){
              //  alert("Error: El id debe ser valido");
                return;
            }
            id_registro = parseFloat(id_registro);
            console.log("Despues de convertir: ", id_registro);
            if(!angular.isNumber(id_registro)){
              alert("Error: El id debe ser valido");
              return;
            }








            $http.post("/./clases/consultaajax.php", {'action':'prestamos_obtenerpor_id',
              'id_registro':id_registro
            })
                .then(function(response){
                    console.log(response.data[0]);
                    if(response.data.length < 1) return;
                    if(response.data[0].fecha_ultimo_pago != "No tiene"){
                      alert("No se puede editar porque ya tiene pago");
                      $scope.inicializarComponentes();
                      return;
                    }

                    $scope.inicializarComponentes();
                    $scope.prestamoDatos.id_registro=response.data[0].id_registro;
                    $scope.prestamoDatos.tipo_interes=response.data[0].tipo_interes;
                    $scope.prestamoDatos.codigo_usuario= parseFloat(response.data[0].codigo_usuario_cliente);
                    $scope.prestamoDatos.codigo_usuario_garante=response.data[0].codigo_usuario_garante;
                    $scope.prestamoDatos.tasa= parseFloat(response.data[0].porciento_interes);
                    $scope.prestamoDatos.cuotas= parseFloat(response.data[0].cantidad_cuotas),
                    $scope.prestamoDatos.fecha= new Date(response.data[0].fecha);
                    $scope.prestamoDatos.monto_prestamo= parseFloat(response.data[0].monto_prestamo);
                    $scope.prestamoDatos.mora= parseFloat(response.data[0].mora);

                    $scope.selectedTipoInteres = $scope.optionsTipoInteres[response.data[0].tipo_registro_TipoInteres - 1]
                    $scope.prestamoDatos.TipoInteres=$scope.selectedTipoInteres.id;

                    $scope.selectedFormaPago = $scope.optionsFormaPago[response.data[0].formapago - 1]
                    $scope.prestamoDatos.formapago=$scope.selectedFormaPago.id;
                    
                    $scope.prestamoDatos.detalle=response.data[0].detalle;
                    $scope.cliente = {"codigo_usuario":response.data[0].codigo_usuario_cliente, "nombre":response.data[0].nombre_cliente};
                    $scope.garante = {"codigo_usuario":response.data[0].codigo_usuario_garante, "nombre":response.data[0].nombre_garante};
                    $scope.cobrador = {"codigo_usuario":response.data[0].codigo_usuario_cobrador, "nombre":response.data[0].nombre_cobrador};
                })



        }

       $scope.inicializarComponentes =  function(){
            $scope.prestamoDatos = {
              'id_registro' : null,
              'tipo_registro_documento' : null,
              'documento' : '',
              'fecha' : null,
              'codigo_usuario' : null,
              'codigo_usuario_registro' : null,
              'capital' : null,
              'porciento_interes' : null,
              'cantidad_cuotas' : null,
              'valor_cuotas' : null,
              'codigo_usuario_garante' : null,
              'monto_prestamo' : null,
              'tipo_registro_sucursal' : 0,
              'estado' : null,
              'completado' : null,
              'tipo_prestamo' : 1,
              'detalle' : null,
              'formapago' : 1,
              'mora' : null,
              'tipo_interes' : 1,
              'dias_gracia' : null,
              'fecha_pago':null,
              'codigo_usuario_cobrador' : null
          };
          $scope.cliente = null;
          $scope.garante = null;
          $scope.cobrador = null;
        }



        $scope.onChangedGarante = function(chkGarante){
          if(!chkGarante){
            $scope.prestamoDatos.codigo_usuario_garante = 0;
          }
        }


    })
