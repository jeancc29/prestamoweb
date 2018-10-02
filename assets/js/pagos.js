var myApp = angular
    .module("myModulePagos", [])
    .controller("myController", function($scope,$http){


      $scope.pagosDatos = {
          id_registro:null,
          codigo_cliente:null,
          nombre_cliente:null,
          codigo_usuario_registro:null,
          nombre_registro:null,
          usuario_registro:null,
          cuota_pagada:null,
          fechapago:null,
          montopagado:null,
          id_prestamo:null
      };

        $scope.mostrarPagosPrestamos = true;
        $scope.mostrarActive = {'prestamos':'active', 'pagos':''};
        $scope.busqueda = "";
        $scope.montopagado = "";
        $scope.perdonar_mora = false;
        $scope.optionsFormaPago = [{name:"Diario", id:1}, {name:"Semanal", id:2}, {name:"Quincenal", id:3}, {name:"Mensual", id:4}, {name:"Anual", id:5}];
        $scope.selectedFormaPago = $scope.optionsFormaPago[3];


        $scope.optionsTipoPrestamo = [{name:"Soluto directo", id:1}, {name:"Insoluto", id:2}, {name:"Amortizacion", id:3}];
        $scope.selectedTipoPrestamo = $scope.optionsTipoPrestamo[0]

        $http.post("/./clases/consultaajax.php",{'action':'pagos_obtener_todos'})
            .then(function(response){
              console.log(response.data);
                $scope.pagosTodos=response.data;
            })

        $scope.prestamos = $http.post("/./clases/consultaajax.php", {'action':'prestamos_obtener_todos'})
            .then(function(response){
                var data = [];
                for(var i=0; i < response.data.length; i++){
                    if(response.data[i].pagado == "no")
                        data.push(response.data[i]);

                }
                $scope.prestamos=data;
                console.log(Date());
                console.log($scope.fechaapertura);
            })


        $scope.buscarprestamo=function(datos){
            $http.post("/./clases/consultaajax.php",{'datos':datos.target.value, 'action':'prestamos_buscar'})
                .then(function(response){var data = [];
                    for(var i=0; i < response.data.length; i++){
                        if(response.data[i].pagado == "no")
                            data.push(response.data[i]);

                    }
                    $scope.prestamos=data;
                   // $scope.prestamos=response.data;
                    console.log($scope.data);
                })

        }

        $scope.inicializarComponentes = function(){
            $scope.monto = 0;
            $scope.montopagado = 0;
            $scope.mora = 0;
            $scope.monto = (0).toFixed(2);
            $scope.total = 0;
            $scope.subtotal = (0).toFixed(2);
            $scope.perdonar_mora = 0;
            $scope.selectedFormaPago= $scope.optionsFormaPago[0];
            $scope.optionsTipoPrestamo= [];
            $scope.selectedTipoPrestamo= [];
            $scope.optionsCuotas= [];
            $scope.selectedCuotas= [];
        }


        $scope.verPrestamo = function(data){
            $scope.inicializarComponentes();
            $scope.prestamo = data;
            $scope.codigo_usuario = data.codigo_usuario;
            $scope.nombre = data.nombre;

            $scope.tasa = data.porciento_interes;
            $scope.detalle = data.detalle;
            $scope.selectedFormaPago = $scope.optionsFormaPago[data.formapago - 1];
            $scope.selectedTipoPrestamo= $scope.optionsTipoPrestamo[data.tipo_registro_tipoprestamo - 1];



            $http.post("/./clases/consultaajax.php", {'action':'pagos_siguienteid'})
                .then(function(response){
                    $scope.numPago=response.data[0].id;
                })

            $http.post("/./clases/consultaajax.php", {'action':'pagos', 'datos' : data.id_registro})
                .then(function(response){
                    var data = [];
                    for(var i=0; i < response.data.length; i++){
                        if(response.data[i].pagado.toLowerCase() != "pagado")
                            data.push(response.data[i]);
                        if(response.data[i].mora_perdonada == 1)
                            $scope.perdonar_mora = true;
                          console.log(response.data[i].pagado);

                    }
                    console.log(data);
                    $scope.optionsCuotas = data;
                    $scope.selectedCuotas = $scope.optionsCuotas[0];
                    $scope.mora = $scope.selectedCuotas.mora;
                    $scope.cuotasChange();
                })




        }


        $scope.verPago = function(data){
            //$scope.inicializarComponentesPagos();
            console.log(data);
          $scope.pagosDatos.id_registro = data.id_registro
          $scope.pagosDatos.codigo_cliente = data.codigo_usuario;
          $scope.pagosDatos.nombre_cliente = data.nombre;
          $scope.pagosDatos.codigo_usuario_registro = data.codigo_usuario_registro;
          $scope.pagosDatos.nombre_registro = data.nombre_registro;
          $scope.pagosDatos.usuario_registro = data.usuario_registro;
          $scope.pagosDatos.cuota_pagada = data.cantidad_cuotas;
          $scope.pagosDatos.montopagado = data.monto;
          $scope.pagosDatos.fechapago = data.fecha;
          $scope.pagosDatos.id_prestamo = data.id_registro_afecta;

        }

        $scope.cuotasChange = function(){
            var total = 0, subtotal = 0, interes = 0;
            var amortizacion = [];
            var mora = 0, mora_total = 0;

            for(var i=0; i<$scope.selectedCuotas.fila; i++){
                console.log($scope.optionsCuotas[i].mora, ' mora options');
                // if($scope.perdonar_mora == false && $scope.optionsCuotas[i].mora != undefined)
                //     mora = parseFloat($scope.optionsCuotas[i].mora) ;
                // else if($scope.perdonar_mora)
                //     mora = 0;

                subtotal = subtotal + parseFloat($scope.optionsCuotas[i].cuota);
                amortizacion.push($scope.optionsCuotas[i]);

                mora_total += mora;

            }



            $scope.mora = mora_total.toFixed(2);
            $scope.subtotal = subtotal.toFixed(2);
            $scope.monto = (subtotal + mora_total).toFixed(2);
            $scope.amortizacion = amortizacion;
            $scope.montopagado_keyup();
        }


        $scope.montopagado_keyup = function(){
            var devuelta = 0;

                devuelta = (parseFloat($scope.montopagado) - parseFloat($scope.monto)).toFixed(2);
                if(devuelta > 0)
                    $scope.devuelta = devuelta;
                else
                    $scope.devuelta = 0;
                //console.log(devuelta);


            //Error: si va a pagar varias cuotas, debe pagarlas todas y saldar su totalidad
        }





        $scope.pagar = function(){
            var capital = 0, interes = 0, mora =0, monto = 0;
            //console.log($scope.prestamo.id_registro);

            console.log($scope.montopagado);


            if(!angular.isNumber($scope.montopagado) || $scope.montopagado <= 0){
                alert("Error: El monto debe ser numerico, mayor que cero y no debe estar vacio");
                return;
            }
            if($scope.selectedCuotas.fila > 1 && ($scope.montopagado < $scope.monto)){
                alert("Error: si va a pagar varias cuotas, debe pagarlas todas y saldar su totalidad");
                return;
            }

                var aa = {'documento':$scope.numPago,
                    'codigo_usuario':$scope.prestamo.codigo_usuario,
                    'codigo_usuario_registro':$scope.codigo_usuario_session,
                    'capital':$scope.subtotal,
                    'interes':$scope.interes,
                    'mora':$scope.mora,
                    'cantidad_cuotas':$scope.selectedCuotas.fila,
                    'monto':$scope.monto,
                    'balance':$scope.selectedCuotas.balance,
                    'id_registro_afecta':$scope.prestamo.id_registro,
                    'action':'pagos_guardar'};


                    var monto_pagado = parseFloat($scope.montopagado) - parseFloat($scope.devuelta);


console.log("************** desde aqui ***********");

            for(var i=0; i<$scope.selectedCuotas.fila; i++){
                console.log($scope.optionsCuotas[i].mora, ' mora options');
                if($scope.perdonar_mora == false && $scope.optionsCuotas[i].mora != undefined)
                    mora = mora + parseFloat($scope.optionsCuotas[i].mora) ;
                else if($scope.perdonar_mora)
                    mora = 0;
                  var a = {'documento':parseFloat($scope.numPago),
                        'codigo_usuario': parseFloat($scope.prestamo.codigo_usuario),
                        'codigo_usuario_registro':parseFloat($scope.codigo_usuario_session),
                        'capital':parseFloat(capital),
                        'interes':parseFloat(interes),
                        'mora':parseFloat(mora),
                        'cantidad_cuotas': parseFloat($scope.optionsCuotas[i].numero_cuota),
                        'monto':parseFloat((monto)),
                        'balance':parseFloat($scope.optionsCuotas[i].balance),
                        'id_registro_afecta':parseFloat($scope.prestamo.id_registro),
                        'idAmortizacion':parseFloat($scope.optionsCuotas[i].idAmortizacion),
                        'mora_perdonada':$scope.perdonar_mora,
                        'action':'pagos_guardar'};

                capital = parseFloat($scope.optionsCuotas[i].capital);
                interes = parseFloat($scope.optionsCuotas[i].interes);
                monto = parseFloat($scope.optionsCuotas[i].cuota); // + $scope.mora

                if(monto_pagado < monto)
                  monto = parseFloat(monto_pagado);
                else if(monto_pagado === monto)
                    monto = parseFloat(monto_pagado);
                else
                  monto = monto ;

                monto_pagado = parseFloat(monto_pagado) - parseFloat(monto);

                console.log('Pagado: ',monto, " pagar: ", monto_pagado);

                $http.post("/./clases/consultaajax.php",
                    {'documento':parseFloat($scope.numPago),
                        'codigo_usuario': parseFloat($scope.prestamo.codigo_usuario),
                        'codigo_usuario_registro':parseFloat($scope.codigo_usuario_session),
                        'capital':parseFloat(capital),
                        'interes':parseFloat(interes),
                        'mora':parseFloat(mora),
                        'cantidad_cuotas': parseFloat($scope.optionsCuotas[i].numero_cuota),
                        'monto':parseFloat((monto)),
                        'balance':parseFloat($scope.optionsCuotas[i].balance),
                        'id_registro_afecta':parseFloat($scope.prestamo.id_registro),
                        'idAmortizacion':parseFloat($scope.optionsCuotas[i].idAmortizacion),
                        'mora_perdonada':$scope.perdonar_mora,
                        'action':'pagos_guardar'})
                    .then(function(response){
                        console.log(response.data);
                    })

            }


            alert("El pago se ha realizado correctamente");
            $scope.inicializarComponentes();
            $http.post("/./clases/consultaajax.php", {'action':'prestamos_obtener_todos'})
                .then(function(response){
                    var data = [];
                    for(var i=0; i < response.data.length; i++){
                        if(response.data[i].pagado == "no")
                            data.push(response.data[i]);

                    }
                    $scope.prestamos=data;
                    console.log(Date());
                    console.log($scope.fechaapertura);
                })

                $http.post("/./clases/consultaajax.php",{'action':'pagos_obtener_todos'})
                    .then(function(response){
                      console.log(response.data);
                        $scope.pagosTodos=response.data;
                    })
            $scope.verPrestamo($scope.prestamo);


                // $http.post("/./clases/consultaajax.php",
                //     {'documento':$scope.numPago,
                //         'codigo_usuario':$scope.prestamo.codigo_usuario,
                //         'codigo_usuario_registro':$scope.codigo_usuario_session,
                //         'capital':$scope.subtotal,
                //         'interes':$scope.interes,
                //         'mora':$scope.mora,
                //         'cantidad_cuotas':$scope.selectedCuotas.fila,
                //         'monto':$scope.monto,
                //         'balance':$scope.selectedCuotas.balance,
                //         'id_registro_afecta':$scope.prestamo.id_registro,
                //         'action':'pagos_guardar'})
                //     .then(function(response){
                //         console.log(response.data);
                //     })


            // $scope.codigo_usuario = data.codigo_usuario;
            // $scope.nombre = data.nombre;
            //
            // $scope.tasa = data.porciento_interes;
            // $scope.detalle = data.detalle;
            // $scope.selectedFormaPago = $scope.optionsFormaPago[data.formapago - 1];
            // $scope.selectedTipoPrestamo= $scope.optionsTipoPrestamo[data.tipo_registro_tipoprestamo - 1];
            // console.log( "interes: ",$scope.interes);
            // console.log( "cuotas: ",$scope.cuotas);
            // console.log( "monto: ",$scope.monto);
            // console.log( "tipoprestamo: ",$scope.tipoprestamo);
            // console.log( "formapago: ",$scope.formapago);



        }

        $scope.perdonar_mora_Check = function () {

            console.log($scope.perdonar_mora);
            if($scope.perdonar_mora){
                $scope.perdonar_mora = false;
                $scope.mora = 0;
            }
            else{
                $scope.perdonar_mora = true;
            }

           // $scope.cuotasChange();

        }


        $scope.pagos_consultar = function(id_registro){
            $http.post("/./clases/consultaajax.php", {'action':'pagos_consultar', 'datos' : id_registro})
                .then(function(response){
                    $scope.pagos_consulta = response.data;
                })
        }


        $scope.pagosMostrar = function(codigo_usuario){
                $http.post("/./clases/consultaajax.php", {'codigo_usuario': codigo_usuario,'action':'pagos_obtener_todos'})
                    .then(function(response){
                        $scope.pagosTodos=response.data;
                        console.log($scope.pagosTodos);
                    })
            }

        $scope.buscarpago=function(datos){
                   console.log(datos.target.value);
                   $http.post("/./clases/consultaajax.php",{'datos':datos.target.value, 'action':'pagos_buscar'})
                       .then(function(response){
                           $scope.pagosTodos=response.data;
                       })

               }

               $scope.ventanaCambiar = function(d){
                 console.log("Aqui ventanaCambiar: ", d);
                 if(d){
                   $scope.mostrarPagosPrestamos = true;
                     $scope.mostrarActive.prestamos = 'active';
                     $scope.mostrarActive.pagos = '';
                 }
                 else{
                   $scope.mostrarPagosPrestamos = false;
                     $scope.mostrarActive.pagos = 'active';
                     $scope.mostrarActive.prestamos = '';
                 }
               }


               $scope.eliminarPago=function(id){
                     if(confirm("Desea eliminar este cliente?"))
                     {
                          $http.post("/./clases/consultaajax.php",{'id':id, 'action':'pagos_eliminar'})
                              .then(function(response){
                                  console.log(response.data);

                                  $http.post("/./clases/consultaajax.php",{'action':'pagos_obtener_todos'})
                                      .then(function(response){
                                        console.log(response.data);
                                          $scope.pagosTodos=response.data;
                                      })


                                      $http.post("/./clases/consultaajax.php", {'action':'prestamos_obtener_todos'})
                                          .then(function(response){
                                              var data = [];
                                              for(var i=0; i < response.data.length; i++){
                                                  if(response.data[i].pagado == "no")
                                                      data.push(response.data[i]);

                                              }
                                              $scope.prestamos=data;
                                              console.log(Date());
                                              console.log($scope.fechaapertura);
                                          })
                              })


                        }

                    }


        // function calcular_diferencia_dias_entre_fechas(fechaini){
        //     //alert("funcion diferencia de dias, fechaini: ", fechaini);
        //      fechaini = new Date('2018-03-01');
        //      var fechafin = new Date();
        //     var diasdif= fechafin.getTime()-fechaini.getTime();
        //     var contdias = Math.round(diasdif/(1000*60*60*24));
        //     console.log(contdias);
        // }


        // $scope.calcular_mora= function(fechaini, mora_porcentaje){
        //     var diasdif = $scope.calcular_diferencia_dias_entre_fechas(fechaini);
        //     if(diasdif > 0){
        //
        //     }
        // }
        //
        // $scope.calcular_diferencia_dias_entre_fechas = function(fechaini){
        //     fechaini = moment('2018-03-01');
        //     fechafin = moment(new Date());
        //     console.log(fechafin.diff(fechaini, 'days'), 'dias de diferencia')
        // }

    })
