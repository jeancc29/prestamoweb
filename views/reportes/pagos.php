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
                                        <div class="form-group col-6">
                                            <label for="" class="" >Desde</label>
                                            <input ng-model="reporteDatos.fechaIni"  type="date" class="col-12    col-sm-12 form-control b-none" name="desde" autocomplete="off">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="" class="" >Hasta</label>
                                            <input ng-model="reporteDatos.fechaFin" type="date" class="col-12    col-sm-12 form-control b-none" name="hasta" autocomplete="off">
                                        </div>
                                    </div>


                                    <div class="row ">
                                        <div class="form-group col-4">
                                            <input ng-click="reportes_pagos()" class="btn btn-primary btn-block" type="submit" name="generar" value="Generar">
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
              <div class="row" >
                  <div class="col-12">
                      <div class="box">
                          <div class="box-header">
                              <h3 class="box-title">Pagos</h3>
                              <div class="box-tools">
                                  <div class="input-group input-group-sm" style="width: 350px;">

                                  </div>
                              </div>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                  <tr>
                                      <th>ID</th>
                                      <th>Pagado</th>
                                      <th>Cuota pagada</th>
                                      <th>Balance pendiente</th>
                                      <th>Fecha pago</th>
                                      <th>Prestamo</th>
                                      <th>Amortizado</th>
                                      <th>Cajero</th>
                                      <th>Info</th>
                                  </tr>
                                  <tr class="editar-iconos" ng-repeat="p in reporte">

                                      <td>{{p.documento}}</td>
                                      <td>{{p.monto}}</td>
                                      <td>{{p.cantidad_cuotas}}</td>
                                      <td>{{p.balance_pendiente}}</td>
                                      <td>{{p.fecha}}</td>
                                      <td>{{p.id_registro_afecta}}</td>
                                      <td>{{p.monto_pagado}}</td>
                                      <td>{{p.nombre_registro | limitTo:13:0}}</td>
                                      <td>
                                          <a class="ion-information-circled d-inline bg-primary py-1 px-2 text-white rounded" data-toggle="modal" data-target=".pagos-info-modal-lg"  ng-click="verPago(p)"></a>
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
                                  <input disabled ng-model="reporteDatos.id_registro_afecta" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Cuotas" name="cuotas" autocomplete="off">
                              </div>
                              <div class="form-group  col-8">
                                  <input ng-model="reporteDatos.codigo_registro" type="hidden" name="" value="">
                                  <label for="" class="" >Empleado</label>
                                  <input disabled string-to-number ng-model="reporteDatos.nombre_registro" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Tasa" name="tasa"  >
                              </div>
                                <div class="form-group  col-6">
                                    <input ng-model="reporteDatos.codigo_cliente" type="hidden" name="" value="">
                                    <label for="" class="" >Cliente</label>
                                    <input disabled string-to-number ng-model="reporteDatos.nombre_cliente" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Tasa" name="tasa"  >
                                </div>



                                <div class="form-group col-6">
                                    <label for="" class="" >Cuota afectada</label>
                                    <input disabled ng-model="reporteDatos.cuota_pagada" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Cuotas" name="cuotas" autocomplete="off">
                                </div>

                            </div>

                            <div class="row">
                              <div class="form-group col-6">
                                  <label for="" class="" >Monto pagado</label>
                                  <input disabled ng-model="reporteDatos.montopagado" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto prestamo" name="monto" autocomplete="off">
                              </div>
                                <div class="form-group col-6">
                                    <label for="" class="" >Fecha</label>
                                    <input disabled ng-model="reporteDatos.fechapago" type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto prestamo" name="monto" autocomplete="off">
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

                                <th scope="col">Editar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr  ng-repeat="d in data.data" >
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
