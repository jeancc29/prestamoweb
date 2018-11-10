var myApp = angular
    .module("myModuleUsuarios", [])
    .controller("myController", function($scope,$http, $log){


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
        $scope.fechaapertura = new Date();
        var d = [];

        $scope.optionsFormaPago = [{name:"Diario", id:1}, {name:"Semanal", id:2}, {name:"Quincenal", id:3}, {name:"Mensual", id:4}, {name:"Anual", id:5}];
        $scope.selectedFormaPago = $scope.optionsFormaPago[3]

        $scope.optionsTipoPrestamo = [{name:"Soluto directo", id:1}, {name:"Insoluto", id:2}, {name:"Amortizacion", id:3}];
        $scope.selectedTipoPrestamo = $scope.optionsTipoPrestamo[0]


        $scope.buscarcliente=function(){
            $http.post("/prestamoGitHub/clases/consultaajax.php",{'datos':$scope.busqueda, 'action':'personas'})
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
                $scope.cliente = data;
            }
            else{
                $scope.garante = data;
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




    })
