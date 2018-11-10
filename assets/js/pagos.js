var myApp = angular
    .module("myModulePagos", [])
    .controller("myController", function($scope,$http){


      $scope.pagosDatos = {
          'codigo_usuario' : null,
            'codigo_usuario_registro' : null,
            'capital' : 0,
            'interes' : 0,
            'efectivo' : 0,
            'cheque' : 0,
            'tarjeta' : 0,
            'mora' : 0,
            'paga_mora' : null,
            'cantidad_cuotas' : null,
            'valor_cuotas' : null,
            'monto' : null,
            'balance' : null,
            'completado' : null,
            'id_registro_afecta' : null,
            'idAmortizacion' : null,
            'mora_perdonada' : 0,
            'tipo_pago' : null,
            'amortizacion' : []
      };


      $scope.pagos_obtener_id_prestamo = function(){

      }

        $scope.mostrarPagosPrestamos = true;
        $scope.mostrarActive = {'prestamos':'active', 'pagos':''};
        $scope.busqueda = "";
        $scope.montopagado = "";
        $scope.perdonar_mora = false;
        $scope.optionsFormaPago = [{name:"Diario", id:1}, {name:"Semanal", id:2}, {name:"Quincenal", id:3}, {name:"Mensual", id:4}, {name:"Anual", id:5}];
        $scope.selectedFormaPago = $scope.optionsFormaPago[3];


        $scope.optionsTipoPrestamo = [{name:"Soluto directo", id:1}, {name:"Insoluto", id:2}, {name:"Amortizacion", id:3}];
        $scope.selectedTipoPrestamo = $scope.optionsTipoPrestamo[0]

        //URL para cuando este en azure https://prestamoweb.azurewebsites.net/clases/consultaajax.php

        $http.post("https://prestamoweb.azurewebsites.net/clases/consultaajax.php",{'action':'pagos_obtener_todos'})
            .then(function(response){
              console.log(response.data);
                $scope.pagosTodos=response.data;
            })

        $scope.prestamos = $http.post("https://prestamoweb.azurewebsites.net/clases/consultaajax.php", {'action':'prestamos_obtener_todos'})
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
            $http.post("https://prestamoweb.azurewebsites.net/clases/consultaajax.php",{'datos':datos.target.value, 'action':'prestamos_buscar'})
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

             $scope.pagosDatos = {
          'codigo_usuario' : null,
            'codigo_usuario_registro' : null,
            'capital' : 0,
            'interes' : 0,
            'efectivo' : 0,
            'cheque' : 0,
            'tarjeta' : 0,
            'mora' : 0,
            'paga_mora' : null,
            'cantidad_cuotas' : null,
            'valor_cuotas' : null,
            'monto' : null,
            'balance' : null,
            'completado' : null,
            'id_registro_afecta' : null,
            'idAmortizacion' : null,
            'mora_perdonada' : 0,
            'tipo_pago' : null,
            'amortizacion' : []
      };
        }


        $scope.seleccionar = function(data){
            $scope.inicializarComponentes();
            // $scope.prestamo = data;
            // $scope.codigo_usuario = data.codigo_usuario;
            // $scope.nombre = data.nombre;

            // $scope.tasa = data.porciento_interes;
            // $scope.detalle = data.detalle;
            // $scope.selectedFormaPago = $scope.optionsFormaPago[data.formapago - 1];
            // $scope.selectedTipoPrestamo= $scope.optionsTipoPrestamo[data.tipo_registro_tipoprestamo - 1];

           
            console.log(data);
            $scope.pagosDatos.codigo_usuario = data.codigo_usuario;
            $scope.pagosDatos.nombre = data.nombre;
            $scope.pagosDatos.id_registro_afecta = data.id_registro;
            $scope.pagosDatos.documento = data.documento;
            $scope.pagosDatos.porciento_interes = data.porciento_interes;
            console.log($scope.pagosDatos);

            $http.post("https://prestamoweb.azurewebsites.net/clases/consultaajax.php", {'action':'vw_prestamos_pagos', 'datos' : data.id_registro})
                .then(function(response){
                    var data = [];
                             $scope.pagos_consulta = response.data;
                             console.log('pagos consulta: ', $scope.pagos_consulta);
                })


        }

        $scope.ckbSeleccionarCuotaChanged = function(cuota, ckbSeleccionarCuota){
            //$scope.pagosDatos.amortizacion.push(cuota);
            console.log($scope.pagosDatos.amortizacion);
            if(ckbSeleccionarCuota){
                console.log(Object.keys($scope.pagosDatos.amortizacion).lenght);
                if(Object.keys($scope.pagosDatos.amortizacion).length > 0){
                    console.log($scope.pagosDatos.amortizacion.find(x => x.idAmortizacion == parseInt(cuota.idAmortizacion)));
                    if($scope.pagosDatos.amortizacion.find(x => x.idAmortizacion == parseInt(cuota.idAmortizacion)) != undefined)
                        {
                            alert("Error: ya existe");
                            return;
                        }
                    else
                        $scope.pagosDatos.amortizacion.push(cuota);
                }
                else
                    $scope.pagosDatos.amortizacion.push(cuota);
            }
            else{
                if($scope.pagosDatos.amortizacion.find(x => x.idAmortizacion == parseInt(cuota.idAmortizacion)) != undefined)
                    {
                        let idx = $scope.pagosDatos.amortizacion.findIndex(x => x.idAmortizacion == parseInt(cuota.idAmortizacion));
                        $scope.pagosDatos.amortizacion.splice(idx,1);
                    }
            }

            $scope.calcularTotal();
        }

        $scope.calcularTotal = function(){
            var monto_a_pagar = 0, capital_a_pagar = 0, interes_a_pagar = 0;
             $scope.pagosDatos.amortizacion.forEach(function(valor, indice, array){
                console.log('Valor:', array[indice].capital, 'indice: ', indice);
                monto_a_pagar +=  parseFloat(array[indice].cuota);
                capital_a_pagar += parseFloat(array[indice].capital);
                interes_a_pagar += parseFloat(array[indice].interes);

             });

             $scope.pagosDatos.capital_a_pagar = capital_a_pagar;
             $scope.pagosDatos.interes_a_pagar = interes_a_pagar;
             $scope.pagosDatos.monto_a_pagar = monto_a_pagar;
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
            


            $http.post("https://prestamoweb.azurewebsites.net/clases/consultaajax.php", {'action':'sp_pagos_guardar', 'datos' : $scope.pagosDatos})
                .then(function(response){
                    var data = [];
                            $scope.pagosDatos.amortizacion = [];
                             $scope.calcularTotal();
                             $scope.pagosDatos.monto = 0;
                             $scope.pagos_consulta = response.data;
                             console.log('Resultado pagos: ', response.data);
                })
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
            $http.post("https://prestamoweb.azurewebsites.net/clases/consultaajax.php", {'action':'pagos_consultar', 'datos' : id_registro})
                .then(function(response){
                    $scope.pagos_consulta = response.data;
                })
        }


        $scope.pagosMostrar = function(codigo_usuario){
                $http.post("https://prestamoweb.azurewebsites.net/clases/consultaajax.php", {'codigo_usuario': codigo_usuario,'action':'pagos_obtener_todos'})
                    .then(function(response){
                        $scope.pagosTodos=response.data;
                        console.log($scope.pagosTodos);
                    })
            }

        $scope.buscarpago=function(datos){
                   console.log(datos.target.value);
                   $http.post("https://prestamoweb.azurewebsites.net/clases/consultaajax.php",{'datos':datos.target.value, 'action':'pagos_buscar'})
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
                          $http.post("https://prestamoweb.azurewebsites.net/clases/consultaajax.php",{'id':id, 'action':'pagos_eliminar'})
                              .then(function(response){
                                  console.log(response.data);

                                  $http.post("https://prestamoweb.azurewebsites.net/clases/consultaajax.php",{'action':'pagos_obtener_todos'})
                                      .then(function(response){
                                        console.log(response.data);
                                          $scope.pagosTodos=response.data;
                                      })


                                      $http.post("https://prestamoweb.azurewebsites.net/clases/consultaajax.php", {'action':'prestamos_obtener_todos'})
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
