<?php $u = new Utilidades();?>
<div class="" ng-app="myModuleReportes">
    <div class="" ng-controller="myController">

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->


            <section class="content col-10 col-sm-10  col-lg-10 ">
                <div class="row justify-content-center">

                    <div class="box " >

                        <div class="box box-success">

                            <div class="row m-3">
                                <h3 class="mr-3">Datos </h3>
                                <button ng-click="inicializarComponentes()" class="btn btn-success ml-5">Limpiar datos</button>
                                <img style="display: none" id="cargando" class=" ml-5" src="<?php echo ROOT_PATH ?>assets/cargando.gif" alt="">
                                <img style="display: none" id="correcto" class=" ml-5 veloz" src="<?php echo ROOT_PATH ?>assets/correcto.ico" alt="">
                            </div>

                            <!-- /.box-header -->
                            <div class="box-body">
                                <form method="post" >
                                    <div class="row ">
                                        <input ng-model="reporteDatos.codigo_cliente"  type="hidden" name="codigo_cliente" value="{{codigo_usuario}}">
                                        <!--                    <div class="form-group  col-3">-->
                                        <!--                      <label for="" class="" >Dni</label>-->
                                        <!--                      <input disabled  type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="identificacion" name="identificacion" value="{{cliente.identificacion}}">-->
                                        <!--                    </div>-->

                                        <div class="form-group col-10">
                                            <label for="" class="" >Cliente</label>
                                            <input disabled  type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Nombre cliente..." name="nombre" autocomplete="off" value="{{cliente.nombre}}">
                                        </div>
                                        <div class="form-group  col-2">
                                            <label for="" class="text-white" >...</label>
                                            <button ng-click="datosForumario(true)" type="button" class="btn btn-primary col-12    col-sm-12 form-control ion-ios-person" data-toggle="modal" data-target=".bd-example-modal-lg"></button>
                                        </div>

                                    </div>
                                    <div class="row ">
                                        <input ng-model="reporteDatos.codigo_registro"  type="hidden" name="codigo_cliente" value="{{codigo_usuario}}">
                                        <!--                    <div class="form-group  col-3">-->
                                        <!--                      <label for="" class="" >Dni</label>-->
                                        <!--                      <input disabled  type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="identificacion" name="identificacion" value="{{cliente.identificacion}}">-->
                                        <!--                    </div>-->

                                        <div class="form-group col-10">
                                            <label for="" class="" >Cobrador</label>
                                            <input disabled  type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Nombre cliente..." name="nombre" autocomplete="off" value="{{registro.nombre}}">
                                        </div>
                                        <div class="form-group  col-2">
                                            <label for="" class="text-white" >...</label>
                                            <button ng-click="datosForumario(false)" type="button" class="btn btn-primary col-12    col-sm-12 form-control ion-ios-person" data-toggle="modal" data-target=".bd-example-modal-lg"></button>
                                        </div>

                                    </div>



                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label for="" class="" >Tipo cliente</label>
                                            <select ng-options="o.descripcion for o in optionsTipoCliente" ng-model="selectedTipoCliente"   name="tipo_cliente" class="form-control col-12    col-sm-12 form-control b-none">

                                            </select>
                                         
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="" class="" >Desde</label>
                                            <input ng-model="reporteDatos.fechaIni"  type="date" class="col-12    col-sm-12 form-control b-none" name="desde" autocomplete="off">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="" class="" >Hasta</label>
                                            <input ng-model="reporteDatos.fechaFin" type="date" class="col-12    col-sm-12 form-control b-none" name="hasta" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="" class="" >Tipo prestamo</label>
                                            <select ng-options="o.name for o in optionsTipoPrestamo" ng-model="selectedTipoPrestamo"   name="tipo_prestamo" class="form-control col-12    col-sm-12 form-control b-none">

                                            </select>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="" class="" >Forma pago</label>
                                            <select ng-options="o.name for o in optionsFormaPago" ng-model="selectedFormaPago"    name="forma_pago" class="form-control col-12    col-sm-12 form-control b-none">

                                            </select>
                                        </div>

                                    <div class="form-group col-12">
                                        <label for="" class="" >Tipo interes</label>
                                        <select ng-options="o.descripcion for o in optionsTipoInteres" ng-model="selectedTipoInteres"  name="tipointeres" class="form-control col-12    col-sm-12 form-control b-none">

                                    
                                        </select>
                                    </div>
                                    </div>
                                    <!--                    <div ng-init="estilo={display: 'none'}" ng-style="estilo" class="container veloz">-->
                                    <!--                        <table class="table table-hover table-bordered min-width-500px mt-4">-->
                                    <!--                            <thead class="thead-dark">-->
                                    <!--                            <tr>-->
                                    <!--                                <th scope="col">#</th>-->
                                    <!--                                <th scope="col">Fecha</th>-->
                                    <!--                                <th scope="col">Cuotas</th>-->
                                    <!--                                <th scope="col">Capital</th>-->
                                    <!--                                <th scope="col">Interes</th>-->
                                    <!--                                <th scope="col">Balance</th>-->
                                    <!--                            </tr>-->
                                    <!--                            </thead>-->
                                    <!--                            <tbody>-->
                                    <!--                            <tr  ng-repeat="d in data.data" >-->
                                    <!--                                <th style="font-size: 11px">{{$index + 1}}</th>-->
                                    <!--                                <td style="font-size: 11px">{{d.fecha_pago}}</td>-->
                                    <!--                                <td style="font-size: 11px">{{d.cuota | number:"2"}}</td>-->
                                    <!--                                <td style="font-size: 11px">{{d.capital}}</td>-->
                                    <!--                                <td style="font-size: 11px">{{d.interes}}</td>-->
                                    <!--                                <td style="font-size: 11px">{{d.balance}}</td>-->
                                    <!---->
                                    <!--                            </tr>-->
                                    <!---->
                                    <!--                            </tbody>-->
                                    <!--                        </table>-->
                                    <!--                    </div>-->
                                    <div class="row ">
                                        <div class="form-group col-4">
                                            <input ng-click="reportes_prestamos()" class="btn btn-primary btn-block" type="submit" name="generar" value="Generar">
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--/.col (right) -->
                </div>


            </section>

            <section class="col-lg-12" style="min-width: 700px">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Reporte prestamos</h3>

                                <div class="box-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
<!--                                           <th>ID prestamo</th>-->
<!--                                           <th>Monto</th>-->
<!--                                           <th>Cuotas</th>-->
<!--                                           <th>Cliente</th>-->
                                        <th style="font-size: 15px">ID</th>
                                        <th style="font-size: 15px">Monto</th>
                                        <th style="font-size: 15px">Cuotas</th>
                                        <th style="font-size: 15px">Balance</th>
                                        <th style="font-size: 15px">Pagado</th>
                                        <th style="font-size: 15px">Fecha</th>
                                        <th style="font-size: 15px">Ultimo pago</th>
                                        <th style="font-size: 15px">Dias</th>
                                        <th style="font-size: 15px">Cliente</th>
                                        <th style="font-size: 15px">tipo interes</th>
                                        
                                        <th>Info</th>
                                    </tr>
                                    <tr class="editar-iconos" ng-repeat="p in reporte">

                                        <td style="font-size: 13px">{{p.id_registro}}</td>
                                        <td style="font-size: 13px">{{p.monto_prestamo | currency}}</td>
                                        <td style="font-size: 13px">{{p.cantidad_cuotas}}</td>
                                        <td style="font-size: 13px">{{p.balance_pendiente | currency}}</td>
                                        <td style="font-size: 13px">{{p.monto_pagado | currency}}</td>
                                        <td style="font-size: 13px">{{p.fecha}}</td>
                                        <td style="font-size: 13px">{{p.fecha_ultimo_pago}}</td>
                                        <td style="font-size: 13px">{{p.dias_ultima_fecha_pago}}</td>
                                        <td style="font-size: 13px">{{p.nombre_cliente | limitTo:10:0}}</td>
                                        <td style="font-size: 13px">{{p.tipo_registro_cliente | limitTo:10:0}}</td>
                                        <td style="font-size: 13px">

                                            <a class="ion-information-circled d-inline bg-primary py-1 px-2 text-white rounded" data-toggle="modal" data-target=".prestamo-modal-lg"  ng-click="verPrestamo(p)"></a>

                                        </td>

                                    </tr>

                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>


        <div class="modal fade prestamo-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Datos prestamo</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form method="post" name="prestamos" action="<?php echo ROOT_PATH . 'prestamos/nuevo'; ?>">


                            <div class="row ">
                                <div class="form-group  col-3">
                                    <label for="" class="" >Tasa %</label>
                                    <input disabled string-to-number ng-model="tasa" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Tasa" name="tasa"  >
                                </div>

                                <div class="form-group col-3">
                                    <label for="" class="" >Cuotas</label>
                                    <input disabled ng-model="cuotas" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Cuotas" name="cuotas" autocomplete="off">
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="" >Monto prestamo</label>
                                    <input disabled ng-model="monto" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto prestamo" name="monto" autocomplete="off">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="form-group  col-6">
                                    <label for="" class="" >Balance pendiente</label>
                                    <input disabled string-to-number ng-model="balance_pendiente" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Tasa" name="tasa"  >
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="" >Interes pendiente</label>
                                    <input disabled ng-model="interes_pendiente" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto prestamo" name="monto" autocomplete="off">
                                </div>

                                <div class="form-group col-4">
                                    <label for="" class="" >Monto pagado</label>
                                    <input disabled ng-model="monto_pagado" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Cuotas" name="cuotas" autocomplete="off">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="" >Cuotas pagadas</label>
                                    <input disabled ng-model="cuotas_pagadas" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto prestamo" name="monto" autocomplete="off">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="" >Fecha ultimo pago</label>
                                    <input disabled ng-model="fecha_ultimo_pago" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto prestamo" name="monto" autocomplete="off">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="" class="" >Tipo prestamo</label>
                                    <select disabled ng-options="o.name for o in optionsTipoPrestamo" ng-model="selectedTipoPrestamo" name="tipo_prestamo" class="form-control col-12    col-sm-12 form-control b-none">

                                    </select>
                                </div>

                                <div class="form-group col-6">
                                    <label for="" class="" >Forma pago</label>
                                    <select disabled ng-options="o.name for o in optionsFormaPago" ng-model="selectedFormaPago" name="forma_pago" class="form-control col-12    col-sm-12 form-control b-none">

                                    </select>
                                </div>

                            </div>
                            <div class="row ">
                                <div class="form-group col-12">
                                    <label for="" class="" >Detalle</label>
                                    <textarea disabled name="detalle" class="form-control col-12    col-sm-12 form-control b-none" placeholder="Detalle del prestamo...">{{detalle}}</textarea>
                                </div>
                            </div>
                            <!--                    <div ng-init="estilo={display: 'none'}" ng-style="estilo" class="container veloz">-->
                            <!--                        <table class="table table-hover table-bordered min-width-500px mt-4">-->
                            <!--                            <thead class="thead-dark">-->
                            <!--                            <tr>-->
                            <!--                                <th scope="col">#</th>-->
                            <!--                                <th scope="col">Fecha</th>-->
                            <!--                                <th scope="col">Cuotas</th>-->
                            <!--                                <th scope="col">Capital</th>-->
                            <!--                                <th scope="col">Interes</th>-->
                            <!--                                <th scope="col">Balance</th>-->
                            <!--                            </tr>-->
                            <!--                            </thead>-->
                            <!--                            <tbody>-->
                            <!--                            <tr  ng-repeat="d in data.data" >-->
                            <!--                                <th style="font-size: 11px">{{$index + 1}}</th>-->
                            <!--                                <td style="font-size: 11px">{{d.fecha_pago}}</td>-->
                            <!--                                <td style="font-size: 11px">{{d.cuota | number:"2"}}</td>-->
                            <!--                                <td style="font-size: 11px">{{d.capital}}</td>-->
                            <!--                                <td style="font-size: 11px">{{d.interes}}</td>-->
                            <!--                                <td style="font-size: 11px">{{d.balance}}</td>-->
                            <!---->
                            <!--                            </tr>-->
                            <!---->
                            <!--                            </tbody>-->
                            <!--                        </table>-->
                            <!--                    </div>-->

                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">{{titulo}}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <!-- <form>
                          <div class="form-group mb-2">
                            <input type="text" class="form-control b-none" id="recipient-name" placeholder="Nombre completo">
                          </div>
                          <div class="form-group my-2">
                            <input type="email" name="" value="" placeholder="Correo electronico" class="form-control">
                          </div>
                          <div class="form-group my-2">
                            <input type="password" name="" value="" placeholder="Password..." class="form-control">
                          </div>
                          <input type="submit" name="guardar" value="Guardar" class="btn btn-primary btn-block p-2">
                        </form> -->

                        <div class="container">
                            <div class="row">
                                <input class="col-5 form-control" type="text" name="" value="" ng-model="busqueda" placeholder="Buscar por dni o nombre">
                                <input ng-if="cliente_o_garante" class="col-2 btn btn-primary ml-2" type="submit" name="" value="Buscar" ng-click="buscarcliente()">
                                <input ng-if="!cliente_o_garante" class="col-2 btn btn-primary ml-2" type="submit" name="" value="Buscar" ng-click="buscarcobrador()">
                            
                            </div>
                        </div>

                        <table class="table table-hover table-bordered min-width-500px mt-4">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Identificacion</th>
                                <th scope="col">Nombre</th>

                                <th scope="col">Info</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr  ng-repeat="d in data.data"  ng-click="$parent.seleccionar(d)">
                                <th>{{$index + 1}}</th>
                                <td>{{d.identificacion}}</td>
                                <td ng-click="dni = dni + 1">{{d.nombre}}</td>

                                <td>
                                    <input  type="submit" name="" value="agregar" class="ml-2 btn btn-success d-inline" ng-click="agregarCliente(d)">
                                </td>

                            </tr>

                            </tbody>
                        </table>

                        <div class="container">

                            <div style="display: {{seleccionado}}" class="alert alert-primary d-inline ml-5 " role="alert">
                                {{titulo_seleccionado}} : {{seleccionado.nombre}} - {{seleccionado.identificacion}}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>



        <div class="modal fade amortizacion-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Amortizacion</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">



                        <table class="table table-hover table-bordered min-width-500px mt-4">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Cuotas</th>
                                <th scope="col">Capital</th>
                                <th scope="col">Interes</th>
                                <th scope="col">Balance</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr  ng-repeat="d in data.data"  ng-click="$parent.seleccionar(d)">
                                <th style="font-size: 11px">{{$index + 1}}</th>
                                <td style="font-size: 11px">{{d.fecha_pago}}</td>
                                <td style="font-size: 11px">{{d.cuota | number:"2"}}</td>
                                <td style="font-size: 11px">{{d.capital}}</td>
                                <td style="font-size: 11px">{{d.interes}}</td>
                                <td style="font-size: 11px">{{d.balance}}</td>

                            </tr>

                            </tbody>
                        </table>

                        <div class="container">

                            <div style="display: {{seleccionado}}" class="alert alert-primary " role="alert">
                                Los campos tasa, cuotas, monto prestamo de estar llenos
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>
</div>































<!-- Small modal -->


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">!Inicia sesion con tu cuenta!</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">


            </div>

            <!-- <div class="modal-footer"> -->

            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button> -->
            <!-- </div> -->

        </div>
    </div>
</div>
