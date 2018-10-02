var myApp = angular
    .module("myModuleHomeClientes", [])
    .controller("myController", function($scope,$http, $log){

        $scope.ventana = 1;

        $scope.codigo_usuario = 0;
        $scope.textoBusqueda = "";
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
        $scope.fechaapertura = new Date();
        $scope.prestamos = [];
        var d = [];

        $scope.optionsFormaPago = [{name:"Diario", id:1}, {name:"Semanal", id:2}, {name:"Quincenal", id:3}, {name:"Mensual", id:4}, {name:"Anual", id:5}];
        $scope.selectedFormaPago = $scope.optionsFormaPago[3]

        $scope.optionsTipoPrestamo = [{name:"Soluto directo", id:1}, {name:"Insoluto", id:2}, {name:"Amortizacion", id:3}];
        $scope.selectedTipoPrestamo = $scope.optionsTipoPrestamo[0]


        $scope.buscarcliente=function(){
            $http.post("/./clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'clientes'})
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

        $scope.agregarCliente = function(){
            if($scope.cliente_o_garante){
                $scope.cliente = d;
            }
            else{
                $scope.garante = d;
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
                $scope.garante = d ;
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
                $scope.titulo = "Garantes";
                $scope.titulo_seleccionado = "Garante seleccionado";
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
            console.log(data.interes_pendiente);
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
            $scope.selectedTipoPrestamo= $scope.optionsTipoPrestamo[data.tipo_registro_tipoprestamo - 1];


        }





        $scope.prestamosMostrar = function(codigo_usuario){
            $http.post("/./clases/consultaajax.php", {'codigo_usuario': codigo_usuario,'action':'prestamos_codigo_usuario'})
                .then(function(response){
                    $scope.prestamosTodos=response.data;
                    console.log($scope.prestamosTodos);
                })
        }

    $scope.pagosMostrar = function(codigo_usuario){
            $http.post("/./clases/consultaajax.php", {'codigo_usuario': codigo_usuario,'action':'pagos_codigo_usuario'})
                .then(function(response){
                    $scope.pagosTodos=response.data;
                    console.log($scope.pagosTodos);
                })
        }


        $scope.buscarprestamo=function(datos){
            console.log(datos.target.value);
            $http.post("/./clases/consultaajax.php",{'datos':datos.target.value, 'action':'prestamos_buscar_para_cliente', 'codigo_cliente':$scope.codigo_usuario})
                .then(function(response){
                    $scope.prestamosTodos=response.data;
                })

        }

 $scope.buscarpago=function(datos){
            console.log(datos.target.value);
            $http.post("/./clases/consultaajax.php",{'datos':datos.target.value, 'action':'pagos_buscar_para_cliente', 'codigo_cliente':$scope.codigo_usuario})
                .then(function(response){
                    $scope.pagosTodos=response.data;
                })

        }


        $scope.ventanaCambiar = function(valor){
            $scope.ventana = valor;
        }

    $scope.clienteDatosResumen = function(codigo_usuario){
        $http.post("/./clases/consultaajax.php",{ 'action':'clientes_datos_resumen', 'codigo_cliente':$scope.codigo_usuario})
            .then(function(response){
                $scope.datosResumen=response.data;
                console.log($scope.datosResumen);
            })

        console.log(codigo_usuario);

        }




    })
