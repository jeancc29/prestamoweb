var myApp = angular
    .module("myModuleReportes", [])
    .controller("myController", function($scope,$http, $log){


      $http.post("/./clases/consultaajax.php", {'action':'interes'})
             .then(function(response){
                 $scope.optionsTipoInteres=response.data;
                 $scope.optionsTipoInteres.push({'tipo_registro': '0', 'descripcion':'Seleccionar'});
                $scope.selectedTipoInteres = $scope.optionsTipoInteres[3];
                 
             })


 $http.post("/./clases/consultaajax.php", {'action':'tipos_registros', 'renglon' : 'Cliente'})
             .then(function(response){
                 $scope.optionsTipoCliente =response.data;
                 $scope.optionsTipoCliente.push({'tipo_registro': 0, 'descripcion':'Seleccionar...'});
                $scope.selectedTipoCliente =  $scope.optionsTipoCliente[1];
                for (var i = $scope.optionsTipoCliente.length - 1; i >= 0; i--) {
                          if($scope.optionsTipoCliente[i].tipo_registro == 0)
                          {
                            $scope.selectedTipoCliente = $scope.optionsTipoCliente[i];
                            break;
                          }
                      }
             })



        $scope.busqueda = "";
        $scope.cliente = "";
        $scope.garante = "";
        $scope.titulo = "";
        $scope.titulo_seleccionado = "";
        $scope.cliente_o_garante = true;
        $scope.seleccionado = [];
        $scope.tasa = 0;
        $scope.interes = 0;
        $scope.monto = 0;
        $scope.cuotas = 0;
        $scope.formapago = 0;
        $scope.tipoprestamo = 0;
        $scope.fecha_desde= new Date();
        $scope.fecha_hasta= new Date();
        $scope.codigo_usuario = null;
        var d = [];

        $scope.optionsFormaPago = [{name:"Seleccionar...", id:0} ,{name:"Diario", id:1}, {name:"Semanal", id:2}, {name:"Quincenal", id:3}, {name:"Mensual", id:4}, {name:"Anual", id:5}];
        $scope.selectedFormaPago = $scope.optionsFormaPago[0]

        $scope.optionsTipoPrestamo = [{name:"Seleccionar...", id:0}, {name:"Soluto directo", id:1}, {name:"Insoluto", id:2}, {name:"Amortizacion", id:3}];
        $scope.selectedTipoPrestamo = $scope.optionsTipoPrestamo[0]


        $scope.buscarcliente=function(){
            $http.post("/./clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'clientes'})
                .then(function(data){
                    $scope.data=data;
                    console.log($scope.data);
                })

        }
$scope.buscarcobrador=function(){
            $http.post("/./clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'cobrador'})
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
            if($scope.cliente_o_garante){
                $scope.cliente =data;
                $scope.reporteDatos.codigo_cliente = data.codigo_usuario;
            }
            else{
                $scope.registro = data;
                console.log(data.codigo_usuario);
                  $scope.reporteDatos.codigo_registro = data.codigo_usuario;

            }
            alert("Se ha agregado correctamente");

            $scope.data = [];

        }


        $scope.seleccionar= function(data){
            $scope.seleccionado = d = data;
            if($scope.cliente_o_garante){
                $scope.cliente = d ;
            }
            else{
                $scope.registro = d ;
            }


        }

        $scope.datosForumario = function(cliente_o_garante){
            if(cliente_o_garante){
                $scope.titulo = "Clientes";
                $scope.titulo_seleccionado = "Cliente seleccionado";
                $scope.cliente_o_garante = cliente_o_garante;
                $scope.data = [];
                $scope.seleccionado = [];
            }
            else{
                $scope.titulo = "Cobradores";
                $scope.titulo_seleccionado = "Cobrador seleccionado";
                $scope.cliente_o_garante = cliente_o_garante;
                $scope.data = [];
                $scope.seleccionado = [];

            }


        }

        $scope.amortizar = function(){
            // console.log( "tasa: ",$scope.tasa);
            // console.log( "interes: ",$scope.interes);
            // console.log( "cuotas: ",$scope.cuotas);
            // console.log( "monto: ",$scope.monto);
            console.log( "tipoprestamo: ",$scope.selectedTipoPrestamo.id);
            // console.log( "formapago: ",$scope.selectedFormaPago.id);

            $http.post("/./clases/consultaajax.php",
                {'tasa':$scope.tasa,
                    'cuotas':$scope.cuotas,
                    'interes':$scope.interes,
                    'monto':$scope.monto,
                    'tipoprestamo':$scope.tipoprestamo,
                    'formapago':$scope.formapago,
                    'fecha_pago':$scope.fechaapertura,
                    'action':'amortizar'})
                .then(function(data){
                    $scope.data=data;
                    console.log($scope.data);
                })
        }


        $scope.verPrestamo = function(data){
            console.log(data.tipo_registro_tipoprestamo);
            $scope.tasa = data.porciento_interes;
            $scope.cuotas = data.cantidad_cuotas;
            $scope.monto = data.monto_prestamo;
            $scope.balance_pendiente = data.balance_pendiente;
            $scope.interes_pendiente = data.interes_pendiente;
            $scope.monto_pagado = data.monto_pagado;
            $scope.cuotas_pagadas = data.cuotas_pagadas;
            $scope.fecha_ultimo_pago = data.fecha_ultimo_pago;
            $scope.detalle = data.detalle;
            $scope.selectedFormaPago = $scope.optionsFormaPago[data.formapago];
            $scope.selectedTipoPrestamo= $scope.optionsTipoPrestamo[data.tipo_registro_tipoprestamo];


        }

        $scope.verPago = function(data){
            //$scope.inicializarComponentesPagos();
            console.log(data);
          //$scope.pagosDatos.id_registro = data.id_registro
          $scope.reporteDatos.codigo_cliente = data.codigo_cliente;
          $scope.reporteDatos.nombre_cliente = data.nombre_cliente;
          $scope.reporteDatos.codigo_registro = data.codigo_registro;
          $scope.reporteDatos.nombre_registro = data.nombre_registro;
          $scope.reporteDatos.usuario_registro = data.usuario_registro;
          $scope.reporteDatos.cuota_pagada = data.cantidad_cuotas;
          $scope.reporteDatos.montopagado = data.monto;
          $scope.reporteDatos.fechapago = data.fecha;
          $scope.reporteDatos.id_registro_afecta = data.id_registro_afecta;

        }

        $scope.prestamos = $http.post("/./clases/consultaajax.php", {'action':'prestamos_obtener_todos'})
            .then(function(response){
                $scope.prestamos=response.data;
                console.log(Date());
                console.log($scope.fechaapertura);
            })


        $scope.buscarprestamo=function(){
            $http.post("/./clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'prestamos_buscar'})
                .then(function(response){
                    $scope.prestamos=response.data;
                    console.log($scope.data);
                })

        }

$scope.reportes_prestamos=function(){
    var b = null;
    console.log($scope.reporteDatos.codigo_registro);
      if($scope.selectedTipoPrestamo.id != 0)
        $scope.reporteDatos.tipo_prestamo = $scope.selectedTipoPrestamo.id;
      else {
        $scope.reporteDatos.tipo_prestamo = null;
      }

      if($scope.selectedTipoCliente.tipo_registro != 0)
        $scope.reporteDatos.tipo_cliente = $scope.selectedTipoCliente.tipo_registro;
      else {
        $scope.reporteDatos.tipo_cliente = null;
      }


      if($scope.selectedFormaPago.id != 0)
        $scope.reporteDatos.forma_pago = $scope.selectedFormaPago.id;
      else {
        $scope.reporteDatos.forma_pago = null;
      }

      if($scope.selectedTipoInteres.tipo_registro != 0)
        b = $scope.selectedTipoInteres.tipo_registro;
      else {
        b = null;
      }

console.log({
                     'action':'reportes_prestamos',
                     "fechaIni" :$scope.reporteDatos.fechaIni,
                     "fechaFin" :$scope.reporteDatos.fechaFin,
                     "codigo_cliente" :$scope.reporteDatos.codigo_cliente,
                     "codigo_garante" :$scope.reporteDatos.codigo_garante,
                     "codigo_registro" :$scope.reporteDatos.codigo_registro,
                     "tipo_prestamo" :$scope.reporteDatos.tipo_prestamo,
                     "forma_pago" :$scope.reporteDatos.forma_pago,
                     "tipo_interes" :b,
                     "tipo_cliente" :$scope.reporteDatos.tipo_cliente
            });



            $http.post("/./clases/consultaajax.php",{
                     'action':'reportes_prestamos',
                     "fechaIni" :$scope.reporteDatos.fechaIni,
                     "fechaFin" :$scope.reporteDatos.fechaFin,
                     "codigo_cliente" :$scope.reporteDatos.codigo_cliente,
                     "codigo_garante" :$scope.reporteDatos.codigo_garante,
                     "codigo_registro" :$scope.reporteDatos.codigo_registro,
                     "tipo_prestamo" :$scope.reporteDatos.tipo_prestamo,
                     "forma_pago" :$scope.reporteDatos.forma_pago,
                     "tipo_interes" :b,
                     "tipo_cliente" :$scope.reporteDatos.tipo_cliente
                    
            })
                .then(function(response){
                    $scope.reporte=response.data;
                    console.log(response.data);
                })

        }



        $scope.reportes_pagos=function(){

              if($scope.selectedTipoPrestamo.id != 0)
                $scope.reporteDatos.tipo_prestamo = $scope.selectedTipoPrestamo.id;
              else {
                $scope.reporteDatos.tipo_prestamo = null;
              }


              if($scope.selectedFormaPago.id != 0)
                $scope.reporteDatos.forma_pago = $scope.selectedFormaPago.id;
              else {
                $scope.reporteDatos.forma_pago = null;
              }



                    $http.post("/./clases/consultaajax.php",{
                             'action':'reportes_pagos',
                             "fechaIni" :$scope.reporteDatos.fechaIni,
                             "fechaFin" :$scope.reporteDatos.fechaFin,
                             "codigo_cliente" :$scope.reporteDatos.codigo_cliente,
                             "codigo_garante" :$scope.reporteDatos.codigo_garante,
                             "codigo_registro" :$scope.reporteDatos.codigo_registro,
                             "tipo_prestamo" :$scope.reporteDatos.tipo_prestamo,
                             "forma_pago" :$scope.reporteDatos.forma_pago
                    })
                        .then(function(response){
                            $scope.reporte=response.data;
                            console.log(response.data);
                        })

                }

  $scope.reportes_ganancias=function(){

                    $http.post("/./clases/consultaajax.php",{
                             'action':'reportes_ganancias',
                             "fechaIni" :$scope.reporteDatos.fechaIni,
                             "fechaFin" :$scope.reporteDatos.fechaFin
                    })
                        .then(function(response){
                            $scope.reporte=response.data;
                            console.log(response.data);
                        })

                }




        $scope.reporteDatos = {
          tipo_prestamo:null,
          forma_pago:null,

          fechaIni:null,
          fechaFin:null,

          codigo_cliente:null,
          nombre_cliente:null,
          codigo_garante:null,
          nombre_garante:null,
          codigo_registro:null,
          nombre_registro:null,

          cuota_pagada:null,
          montopagado:null,
          fechapago:null,
          id_registro_afecta:null,
          tipo_cliente:null
        }

        $scope.inicializarComponentes = function(){
          $scope.cliente = null;
          $scope.garante = null;
          $scope.registro = null;
          $scope.selectedFormaPago = $scope.optionsFormaPago[0];
          $scope.selectedTipoPrestamo = $scope.optionsTipoPrestamo[0];

          for (var i = $scope.optionsTipoCliente.length - 1; i >= 0; i--) {
                          if($scope.optionsTipoCliente[i].tipo_registro == 0)
                          {
                            $scope.selectedTipoCliente = $scope.optionsTipoCliente[i];
                            break;
                          }
                      }


          $scope.reporteDatos.tipo_prestamo = null;
          $scope.reporteDatos.forma_pago = null;

          $scope.reporteDatos.fechaIni = null;
          $scope.reporteDatos.fechaFin = null;

          $scope.reporteDatos.codigo_cliente = null;
          $scope.reporteDatos.nombre_cliente = null;
          $scope.reporteDatos.codigo_garante = null;
          $scope.reporteDatos.nombre_garante = null;
          $scope.reporteDatos.codigo_registro = null;
          $scope.reporteDatos.nombre_registro = null;
          $scope.reporteDatos.tipo_cliente = null;

        }


    })
