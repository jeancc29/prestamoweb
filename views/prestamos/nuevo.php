<?php $u = new Utilidades();?>
<div class="" ng-app="myModulePrestamo">
  <div class="" ng-controller="myController">

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Prestamos agregar nuevo
          <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active" >General Elements</li>
        </ol>
      </section>

      <!-- Main content -->


      <section ng-init="prestamoEditar('<?php echo $_GET['id']?>')" class="content col-10 col-sm-10  col-lg-8 ">
        <div class="row justify-content-center">

          <div class="box" >

            <div class="box box-success">

              <div class="row m-3">
                <h3 class="mr-3">Datos prestamo</h3>
                  <a class="btn btn-primary" href="<?php echo ROOT_PATH; ?>prestamos/">Prestamos</a>
                  <a ng-click="inicializarComponentes()" class="btn btn-primary ml-3">Limpiar</a>
                <img style="display: none" id="cargando" class=" ml-5" src="<?php echo ROOT_PATH ?>assets/cargando.gif" alt="">
                <img style="display: none" id="correcto" class=" ml-5 veloz" src="<?php echo ROOT_PATH ?>assets/correcto.ico" alt="">
              </div>

              <!-- /.box-header -->
              <div class="box-body">
                <form method="post" name="prestamos" > <!--action="<?php echo ROOT_PATH . 'prestamos/nuevo'; ?>" -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="" class="" >Tipo interes</label>
                            <select ng-options="o.descripcion for o in optionsTipoInteres" ng-model="selectedTipoInteres"  name="tipointeres" class="form-control col-12    col-sm-12 form-control b-none">


                            </select>
                        </div>
                    </div>
                  <div class="row ">
                      <input ng-model="prestamoDatos.codigo_cliente" type="hidden" name="codigo_cliente" value="{{cliente.codigo_usuario}}">
<!--                    <div class="form-group  col-3">-->
<!--                      <label for="" class="" >Dni</label>-->
<!--                      <input disabled  type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="identificacion" name="identificacion" value="{{cliente.identificacion}}">-->
<!--                    </div>-->

                    <div class="form-group col-10">
                      <label for="" class="" >Cliente</label>
                      <input disabled ng-model="cliente.nombre"  type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Nombre cliente..." name="nombre" autocomplete="off" value="{{cliente.nombre}}">
                    </div>
                    <div class="form-group  col-2">
                      <label for="" class="text-white" >...</label>
                      <button ng-click="datosForumario(true)" type="button" class="btn btn-primary col-12    col-sm-12 form-control ion-ios-person" data-toggle="modal" data-target=".bd-example-modal-lg"></button>
                    </div>
                  </div>
                <div class="row">
                    <input ng-model="prestamoDatos.codigo_garante" type="hidden" name="codigo_garante" value="{{garante.codigo_usuario}}">
<!--                    <div class="form-group  col-3">-->
<!--                      <label for="" class="" >Dni</label>-->
<!--                      <input disabled  type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="identificacion" name="identificacion_garante" value="{{garante.identificacion}}">-->
<!--                    </div>-->

                    <div class="form-group col-10">
                      <label for="" class="" >Garante</label>
                      <input disabled ng-model="garante.nombre"  type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Nombre garante" name="garante" autocomplete="off" value="{{garante.nombre}}">
                    </div>
                    <div class="form-group  col-2">
                      <label for="" class="text-white" >...</label>
                      <button ng-click="datosForumario(false)" type="button" class="btn btn-primary col-12    col-sm-12 form-control b-none ion-ios-person" data-toggle="modal" data-target=".bd-example-modal-lg"></button>
                    </div>
                  </div>

                  <div class="row ">
                    <div class="form-group  col-3">
                      <label for="" class="" >Tasa %</label>
                      <input ng-model="prestamoDatos.tasa" type="number" class="col-12    col-sm-12 form-control b-none"  placeholder="Tasa" name="tasa">
                    </div>

                    <div class="form-group col-3">
                      <label for="" class="" >Cuotas</label>
                      <input ng-model="prestamoDatos.cuotas" type="number" class="col-12    col-sm-12 form-control b-none"  placeholder="Cuotas" name="cuotas" autocomplete="off">
                    </div>
                      <div class="form-group col-6">
                          <label for="" class="" >Fecha apertura</label>
                          <input ng-model="prestamoDatos.fechaapertura" type="date" class="col-12    col-sm-12 form-control b-none" name="fecha" autocomplete="off">
                      </div>

                  </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="" class="" >Monto prestamo</label>
                            <input ng-model="prestamoDatos.montoprestamo" type="number" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto prestamo" name="monto" autocomplete="off">
                        </div>
                        <div class="form-group col-6">
                            <label for="" class="" >Mora %</label>
                            <input ng-model="prestamoDatos.mora" type="text" class="col-12    col-sm-12 form-control b-none" name="mora" autocomplete="off">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="" class="" >Tipo prestamo</label>
                            <!-- <select  ng-model="tipoprestamo"  name="tipo_prestamo" class="form-control col-12    col-sm-12 form-control b-none">

                                <option selected value="1">Soluto directo</option>
                                <option value="2">Insoluto</option>
                                <option value="3">Amortizacion fija</option>

                            </select> -->
                            <select ng-options="o.name for o in optionsTipoPrestamo" ng-model="selectedTipoPrestamo"   ng-model="tipoprestamo"  name="tipo_prestamo" class="form-control col-12    col-sm-12 form-control b-none">

                            </select>
                        </div>

                            <div class="form-group col-6">
                                <label for="" class="" >Forma pago</label>
                                <!-- <select ng-model="formapago"  name="forma_pago" class="form-control col-12    col-sm-12 form-control b-none">
                                    <option value="1">Diario</option>
                                    <option value="2">Semanal</option>
                                    <option value="3">Quincenal</option>
                                    <option selected value="4">Mensual</option>
                                    <option value="5">Anual</option>

                                </select> -->
                                <select  ng-options="o.name for o in optionsFormaPago" ng-model="selectedFormaPago"  name="forma_pago" class="form-control col-12    col-sm-12 form-control b-none">

                                </select>
                            </div>

                    </div>
                    <div class="row ">
                        <div class="form-group col-12">
                            <label for="" class="" >Detalle</label>
                            <textarea ng-model="prestamoDatos.detalle" name="detalle" class="form-control col-12    col-sm-12 form-control b-none" placeholder="Detalle del prestamo..."></textarea>
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
                            <input  ng-click="prestamoGuardar('<?php echo $_SESSION['codigo_usuario']?>')" name="guardar" type="submit" class="btn btn-primary btn-block" value="Registrar prestamo">
                        </div>
                        <div ng-click="estilo={display:'block'}" class="form-group col-3">
                            <p ng-click="amortizar()" name="amortizar" class="btn btn-success btn-block" data-toggle="modal" data-target=".amortizacion-modal-lg">Amortizar</p>
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
      <!-- /.content -->
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">{{titulo}}</h3>
          <div style="display: {{seleccionado}}" class="alert alert-primary d-inline ml-5 " role="alert">
            {{titulo_seleccionado}} : {{seleccionado.nombre}} - {{seleccionado.identificacion}}
          </div>
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
              <input class="col-2 btn btn-primary ml-2" type="submit" name="" value="Buscar" ng-click="buscarcliente()">

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
