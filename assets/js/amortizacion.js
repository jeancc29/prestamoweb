var myApp = angular
    .module("myModuleAmortizacion", [])
    .controller("myController", function($scope,$http, $log){

        

        $scope.busqueda = "";
        $scope.cliente = "";
        $scope.garante = "";
        $scope.titulo = "";
        $scope.titulo_seleccionado = "";
        $scope.cliente_o_garante = true;
        $scope.seleccionado = [];
        $scope.porciento_interes = 0;
        $scope.interes = 0;
        $scope.monto = 0;
        $scope.cuotas = 0;
        $scope.formapago = 0;
        $scope.tipoprestamo = 0;
        $scope.fechaapertura = new Date();
        var d = [];
        $scope.datosValidos = false;

        $scope.optionsFormaPago = [{name:"Diario", id:1}, {name:"Semanal", id:2}, {name:"Quincenal", id:3}, {name:"Mensual", id:4}, {name:"Anual", id:5}];
        $scope.selectedFormaPago = $scope.optionsFormaPago[0];

        $scope.optionsTipoInteres = [{name:"Soluto directo", id:1}, {name:"Insoluto", id:2}, {name:"Amortizacion", id:3}, {name:"Redito", id:4}];
        $scope.selectedTipoInteres = $scope.optionsTipoInteres[0];

        $scope.optionsTipoPrestamo = [{name:"Sam", id:1}, {name:"Normal", id:2}];
        $scope.selectedTipoPrestamo = $scope.optionsTipoPrestamo[0];


        $scope.datos = {
                    'porciento_interes':0,
                    'cantidad_cuotas':0,
                    'interes':0,
                    'monto_prestamo':0,
                    'tipo_interes':$scope.selectedTipoInteres.id,
                    'formapago':$scope.selectedFormaPago.id,
                    'fecha_pago':new Date(),
                    'valor_cuotas' : 0
        }

        $scope.buscarcliente=function(){
            $http.post("/prestamoGitHub/clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'clientes'})
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
            // console.log( "porciento_interes: ",$scope.porciento_interes);
            // console.log( "interes: ",$scope.interes);
            // console.log( "cuotas: ",$scope.cuotas);
            // console.log( "monto: ",$scope.monto);
            console.log( "tipoprestamo: ",$scope.selectedTipoInteres.id);
            console.log( "variable data: ",$scope.datos);
            // console.log( "formapago: ",$scope.selectedFormaPago.id);

            if($scope.selectedTipoPrestamo.id != 1){
                if($scope.datos.porciento_interes <= 0 || $scope.datos.cantidad_cuotas <= 0 || $scope.datos.monto_prestamo <= 0){
                    alert("Error: La porciento_interes, cuotas y monto debe ser mayores que cero");
                    return;
                }
            }
            else{
                if($scope.datos.porciento_interes <= 0 && $scope.datos.cantidad_cuotas <= 0){
                    alert("Error: El monto, cuotas deben ser mayores que cero");
                    return;
                }
                if($scope.datos.valor_cuotas <= 0 && $scope.datos.porciento_interes <= 0){
                    alert("Error: El valor de la cuota y la porciento_interes deben ser mayores que cero");
                    return;
                }
            }

            if($scope.datos.porciento_interes > 100 || $scope.datos.porciento_interes < 0){
                alert("Error: La porciento_interes debe ser mayor que cero(0) y menor que cien(100)");
                    return;
            }

            $scope.datos.tipo_interes = $scope.selectedTipoInteres.id;
            $scope.datos.formapago = $scope.selectedFormaPago.id;

            $scope.datosValidos = true;

            
           

            $http.post("/prestamoGitHub/clases/consultaajax.php",
                {'data':$scope.datos,
                    'action':'amortizar'})
                .then(function(data){
                    $scope.data=data;
                    console.log($scope.data);
                });

                if($scope.datosValidos ){
                 $('#myModal').modal('show');
                }
        }


      


        $scope.prestamos = $http.post("/prestamoGitHub/clases/consultaajax.php", {'action':'prestamos_obtener_todos'})
            .then(function(response){
                $scope.prestamos=response.data;
                console.log(Date());
                console.log($scope.fechaapertura);
            })


        $scope.buscarprestamo=function(){
            $http.post("/prestamoGitHub/clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'prestamos_buscar'})
                .then(function(response){
                    $scope.prestamos=response.data;
                    console.log($scope.data);
                })

        }


        $scope.tipoPrestamoChange = function(){
            if($scope.selectedTipoPrestamo.id == 1){
                $scope.selectedTipoInteres = $scope.optionsTipoInteres[0];
            }
        }


    })
