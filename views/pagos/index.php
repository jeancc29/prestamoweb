<div class="content-wrapper" ng-app="myModulePagos">
    <!-- Content Header (Page header) -->
    <div ng-controller="myController" ng-init="codigo_usuario_session='<?php echo $_SESSION['codigo_usuario'];?>'">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->

            <!-- /.row -->
            <!-- Main row -->
            <div class="row justify-content-center">
                <!-- Large col -->
                <section class="col-lg-12" style="overflow: hidden;">

                        <div class="col-12">
                            <div class="box">
                                <div class="box-header">
                                    <div class="row ml-2">
                                      <ul class="nav nav-tabs col-12 col-sm-7 col-lg-6">
                                        <li class="nav-item" ng-click="ventanaCambiar(true)">
                                          <a class="nav-link {{mostrarActive.prestamos}}" >Prestamos</a>
                                        </li>
                                        <li class="nav-item" ng-click="ventanaCambiar(false)">
                                          <a class="nav-link {{mostrarActive.pagos}}">Historial pagos</a>
                                        </li>

                                      </ul>
                                      <div ng-if="mostrarPagosPrestamos" class="box-tools col-12 col-sm-4 col-lg-6">
                                          <div class="input-group input-group-sm" >
                                              <input ng-model="busqueda" ng-keyup="buscarprestamo($event)" type="text" name="table_search" class="form-control pull-right" placeholder="Buscar por: Dni, prestamo, cliente">

                                              <div class="input-group-btn">
                                                  <button type="submit" class="btn btn-default p-2"><i class="fa fa-search"></i></button>
                                              </div>
                                          </div>
                                      </div>
                                    <div ng-if="!mostrarPagosPrestamos" class="box-tools col-12 col-sm-4 col-lg-6">
                                        <div class="input-group input-group-sm" >
                                            <input ng-model="busqueda" ng-keyup="buscarpago($event)" type="text" name="table_search" class="form-control pull-right" placeholder="Buscar por: Fecha, prestamo, pago">

                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default p-2"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div ng-if="mostrarPagosPrestamos" class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th style="font-size: 14px">Prestamo</th>
                                            <th style="font-size: 14px">Monto</th>
                                            <th style="font-size: 14px">Cuotas</th>
                                            <th style="font-size: 14px">Cliente</th>
                                            <th style="font-size: 14px">Ultimo pago</th>
                                            <th style="font-size: 14px">Pagado</th>
                                            <th style="font-size: 14px">Editar</th>
                                        </tr>
                                        <tr class="editar-iconos" ng-repeat="p in prestamos">

                                            <td style="font-size: 13px">{{p.id_registro}}</td>
                                            <td style="font-size: 13px">{{p.monto_prestamo | currency}}</td>
                                            <td style="font-size: 13px">{{p.cantidad_cuotas}}</td>
                                            <td style="font-size: 13px">{{p.nombre}}</td>
                                            <td style="font-size: 13px">{{p.fecha_ultimo_pago}}</td>
                                            <td style="font-size: 13px">{{p.monto_pagado | currency}}</td>
                                            <td style="font-size: 13px">
                                                <a class="ion-social-usd d-inline bg-primary py-1 px-2 text-white rounded" data-toggle="modal" data-target=".bd-example-modal-lg"  ng-click="verPrestamo(p)"></a>
                                                <a ng-click="pagos_consultar(p.id_registro)" class="ion-information-circled d-inline  ml-1 bg-primary py-1 px-2 text-white rounded" data-toggle="modal" data-target=".pagos-modal-lg"></a>

                                            </td>

                                        </tr>

                                    </table>
                                </div>
                                <div ng-if="!mostrarPagosPrestamos" class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th style="font-size: 14px">ID</th>
                                            <th style="font-size: 14px">Pagado</th>
                                            <th style="font-size: 14px">Cuota pagada</th>
                                            <th style="font-size: 14px">Balance pendiente</th>
                                            <th style="font-size: 14px">Fecha pago</th>
                                            <th style="font-size: 14px">Prestamo</th>
                                            <th style="font-size: 14px">Amortizado</th>
                                            <th style="font-size: 14px">Info</th>
                                        </tr>
                                        <tr class="editar-iconos" ng-repeat="p in pagosTodos">

                                            <td style="font-size: 13px">{{p.documento}}</td>
                                            <td style="font-size: 13px">{{p.monto}}</td>
                                            <td style="font-size: 13px">{{p.cantidad_cuotas}}</td>
                                            <td style="font-size: 13px">{{p.balance_pendiente}}</td>
                                            <td style="font-size: 13px">{{p.fecha}}</td>
                                            <td style="font-size: 13px">{{p.id_registro_afecta}}</td>
                                            <td style="font-size: 13px">{{p.monto_pagado}}</td>
                                            <td style="font-size: 13px">
                                                <a class="ion-information-circled d-inline bg-primary py-1 px-2 text-white rounded" data-toggle="modal" data-target=".pagos-info-modal-lg"  ng-click="verPrestamo(p)"></a>
                                                <a ng-click="eliminarPago(p.id_registro)" class="ion-android-delete d-inline   bg-danger py-1 px-2 text-white rounded" ></a> <!-- data-toggle="modal" data-target=".pagos-eliminar-modal-lg" -->
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

                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">


                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">



                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Realizar pago</h3>
                            <div class="col-6">
                                <div class="row  justify-content-center">
                                    <div class="custom-control custom-checkbox">
                                        <input ng-model="perdonar_mora" ng-click="cuotasChange()" ng-change=""  type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label  class="custom-control-label" for="customCheck1">Perdonar mora</label>
                                    </div>
                                </div>
                                <div class="row  justify-content-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label ng-init="detallesPagosMostrar=true"  ng-model="detallesPagosMostrar" ng-click="detallesPagosMostrar=!detallesPagosMostrar" class="custom-control-label" for="customCheck2">Detalles pagos</label>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form method="post" name="prestamos" action="<?php echo ROOT_PATH . 'prestamos/nuevo'; ?>">

                                <div class="row">
                                    <div class="form-group  col-4">
                                        <label for="" class="" >ID pago</label>
                                        <input disabled string-to-number ng-model="numPago" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Numero pago" name="pago"  >
                                    </div>
                                    <div class="form-group  col-8">
                                        <label for="" class="" >Cliente</label>
                                        <input ng-model="codigo_usuario" type="hidden" name="codigo_usuario">
                                        <input disabled string-to-number ng-model="nombre" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Nombre cliente" name="nombre"  >
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="form-group  col-4">
                                        <label for="" class="" >Tasa %</label>
                                        <input disabled string-to-number ng-model="tasa" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Tasa" name="tasa"  >
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="" class="" >Forma pago</label>
                                        <select disabled ng-options="o.name for o in optionsFormaPago" ng-model="selectedFormaPago" name="forma_pago" class="form-control col-12    col-sm-12 form-control b-none">

                                        </select>
                                    </div>
<!--                                    <div class="form-group col-4">-->
<!--                                        <label for="" class="" >Monto a pagar</label>-->
<!--                                        <input disabled ng-model="monto" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto a pagar" name="monto"  >-->
<!--                                    </div>-->
                                    <div class="form-group col-4">
                                        <label for="" class="" >Mora</label>
                                        <input disabled ng-model="mora" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Mora" name="mora"  >
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="" class="" >Cuotas a pagar</label>
                                        <select ng-change="cuotasChange()" ng-options="o.fila for o in optionsCuotas" ng-model="selectedCuotas" name="tipo_prestamo" class="form-control col-12    col-sm-12 form-control b-none">

                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="" class="" >Monto pagado</label>
                                        <input ng-keyup="montopagado_keyup()" ng-model="montopagado" type="number" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto pagado" name="pago"  >
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="" class="" >Devuelta</label>
                                        <input disabled ng-model="devuelta" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Devuelta" name="pago"  >
                                    </div>
                                </div>


                            </form>
                            <div class="row">
                                <div class="col-8">
                                    <table ng-hide="detallesPagosMostrar" class="table table-hover table-bordered min-width-500px">
                                        <thead class="">
                                        <tr>
                                            <th scope="col" style="font-size: 13px">#</th>
                                            <th scope="col" style="font-size: 13px">Fecha</th>
                                            <th scope="col" style="font-size: 13px">Cuotas</th>
                                            <th scope="col" style="font-size: 13px">Capital</th>
                                            <th scope="col" style="font-size: 13px">Interes</th>
                                            <th scope="col" style="font-size: 13px">Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr  ng-repeat="d in amortizacion">
                                            <th style="font-size: 13px">{{$index + 1}}</th>
                                            <td style="font-size: 13px">{{d.fecha_pago}}</td>
                                            <td style="font-size: 13px">{{d.cuota | number:"2"}}</td>
                                            <td style="font-size: 13px">{{d.capital}}</td>
                                            <td style="font-size: 13px">{{d.interes}}</td>
                                            <td style="font-size: 13px">{{d.balance}}</td>

                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-4">
                                    <div class="row  justify-content-end">
                                        <h6 class="text-primary mr-4" >Subtotal: {{subtotal | currency:"RD$"}}</h6>
                                    </div>
                                    <div class="row  justify-content-end">
                                        <h4 class=" text-primary mr-4" >Total: {{monto | currency:"RD$"}}</h4>
                                    </div>
                                </div>


                            </div>

<!--                            <table class="table table-hover table-bordered min-width-500px mt-4">-->
<!--                                <thead class="thead-dark">-->
<!--                                <tr>-->
<!--                                    <th scope="col" style="font-size: 13px">#</th>-->
<!--                                    <th scope="col" style="font-size: 13px">Fecha</th>-->
<!--                                    <th scope="col" style="font-size: 13px">Cuotas</th>-->
<!--                                    <th scope="col" style="font-size: 13px">Capital</th>-->
<!--                                    <th scope="col" style="font-size: 13px">Interes</th>-->
<!--                                    <th scope="col" style="font-size: 13px">Balance</th>-->
<!--                                </tr>-->
<!--                                </thead>-->
<!--                                <tbody>-->
<!--                                <tr  ng-repeat="d in amortizacion">-->
<!--                                    <th style="font-size: 11px">{{$index + 1}}</th>-->
<!--                                    <td style="font-size: 11px">{{d.fecha_pago}}</td>-->
<!--                                    <td style="font-size: 11px">{{d.cuota | number:"2"}}</td>-->
<!--                                    <td style="font-size: 11px">{{d.capital}}</td>-->
<!--                                    <td style="font-size: 11px">{{d.interes}}</td>-->
<!--                                    <td style="font-size: 11px">{{d.balance}}</td>-->
<!---->
<!--                                </tr>-->
<!---->
<!--                                </tbody>-->
<!--                            </table>-->

                        </div>
                        <div class="modal-footer mt-0">
                            <button ng-click="pagar()" type="button" class="btn btn-primary">Pagar</button>
                        </div>

                    </div>
                </div>
            </div>



            <div class="modal fade pagos-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Datos cuotas</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">


                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-hover table-bordered min-width-500px">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" style="font-size: 13px">#</th>
                                            <th scope="col" style="font-size: 13px">Fecha</th>
                                            <th scope="col" style="font-size: 13px">Cuotas</th>
                                            <th scope="col" style="font-size: 13px">Capital</th>
                                            <th scope="col" style="font-size: 13px">Interes</th>
                                            <th scope="col" style="font-size: 13px">Balance</th>
                                            <th scope="col" style="font-size: 13px">Estado</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr  ng-repeat="d in pagos_consulta">
                                            <th style="font-size: 13px">{{$index + 1}}</th>
                                            <td style="font-size: 13px">{{d.fecha_pago}}</td>
                                            <td style="font-size: 13px">{{d.cuota | number:"2"}}</td>
                                            <td style="font-size: 13px">{{d.capital}}</td>
                                            <td style="font-size: 13px">{{d.interes}}</td>
                                            <td style="font-size: 13px">{{d.balance}}</td>
                                            <td style="font-size: 13px">{{d.pagado}}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer mt-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>


            <div class="modal fade pagos-info-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Datos pagos</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form method="post" name="prestamos" action="<?php echo ROOT_PATH . 'prestamos/nuevo'; ?>">


                                <div class="row ">
                                  <div class="form-group col-4">
                                      <label for="" class="" >#Prestamo</label>
                                      <input disabled ng-model="pagosDatos.id_prestamo" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Cuotas" name="cuotas" autocomplete="off">
                                  </div>
                                  <div class="form-group  col-8">
                                      <input ng-model="pagosDatos.codigo_registro" type="hidden" name="" value="">
                                      <label for="" class="" >Empleado</label>
                                      <input disabled string-to-number ng-model="pagosDatos.usuario_registro" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Tasa" name="tasa"  >
                                  </div>
                                    <div class="form-group  col-6">
                                        <input ng-model="pagosDatos.codigo_cliente" type="hidden" name="" value="">
                                        <label for="" class="" >Cliente</label>
                                        <input disabled string-to-number ng-model="pagosDatos.nombre_cliente" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Tasa" name="tasa"  >
                                    </div>



                                    <div class="form-group col-6">
                                        <label for="" class="" >Cuota afectada</label>
                                        <input disabled ng-model="pagosDatos.cuota_pagada" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Cuotas" name="cuotas" autocomplete="off">
                                    </div>

                                </div>

                                <div class="row">
                                  <div class="form-group col-6">
                                      <label for="" class="" >Monto pagado</label>
                                      <input disabled ng-model="pagosDatos.montopagado" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto prestamo" name="monto" autocomplete="off">
                                  </div>
                                    <div class="form-group col-6">
                                        <label for="" class="" >Fecha</label>
                                        <input disabled ng-model="pagosDatos.fechapago" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto prestamo" name="monto" autocomplete="off">
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

            <div class="modal fade pagos-eliminar-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Eliminar pago</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form method="post" name="prestamos" action="<?php echo ROOT_PATH . 'prestamos/nuevo'; ?>">


                              <div class="row ">
                                  <div class="form-group col-12">
                                      <input ng-model="idEliminar" type="hidden" name="" value="">
                                      <label for="" class="" >Indique el porque desea eliminar el pago:</label>
                                      <textarea ng-model="detalleEliminar" name="detalle" class="form-control col-12    col-sm-12 form-control b-none" placeholder="Detalle del prestamo..."></textarea>
                                  </div>
                              </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>
    <!-- /.content -->
</div>
