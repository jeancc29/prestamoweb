var myApp = angular
    .module("myModuleHome", [])
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
            'codigo_usuario_cobrador':null,
            'monto_pagado' : 0
        };





      $scope.buscarPersona=function(){
    		$http.post("/./clases/consultaajax.php",{'data':$scope.datosBusqueda, 'action':'persona_buscar'})
    		.then(function(data){
    			$scope.data=data;
          console.log($scope.data);
    		})

    	}
       

        


       




            $scope.load = function(){
              $scope.datos = {
                'total_prestado':0,
                'capital_cobrado':0,
                'interes_cobrado':0,
                'mora_cobrada':0,
                'prestamos':[]
              }
              //Cargar estadisticas
              $scope.prestamos = $http.post("/./clases/consultaajax.php", {'action':'estadisticas'})
                    .then(function(response){
                        $scope.datos.total_prestado = response.data[0].total_prestado;
                        $scope.datos.interes_cobrado = response.data[0].interes_cobrado;
                        $scope.datos.capital_cobrado = response.data[0].capital_cobrado;
                        $scope.datos.mora_cobrada = response.data[0].mora_cobrada;
                        
                        console.log(response.data);
                    })
                //Cargar todos los prestamos
               $scope.prestamos = $http.post("/./clases/consultaajax.php", {'action':'prestamos_obtener_todos'})
                    .then(function(response){
                        $scope.datos.prestamos=response.data;
                        console.log(Date());
                        console.log($scope.fecha);
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
