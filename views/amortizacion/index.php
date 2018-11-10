<?php $u = new Utilidades();?>
<div class="" ng-app="myModuleAmortizacion">
    <div class="" ng-controller="myController">

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Amortizacion
                    <small>Preview</small>
                </h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active" >General Elements</li>
                </ol> -->
            </section>

            <!-- Main content -->


            <section class="content col-10 col-sm-10  col-lg-8 ">
                <div class="row justify-content-center">

                    <div class="box " >

                        <div class="box box-success">

                            <div class="row m-3">
                                <h3 class="mr-3">Datos amortizacion</h3>

                                <img style="display: none" id="cargando" class=" ml-5" src="<?php echo ROOT_PATH ?>assets/cargando.gif" alt="">
                                <img style="display: none" id="correcto" class=" ml-5 veloz" src="<?php echo ROOT_PATH ?>assets/correcto.ico" alt="">
                            </div>

                            <!-- /.box-header -->
                            <div class="box-body">
                                <form method="post" name="prestamos" action="<?php echo ROOT_PATH . 'prestamos/nuevo'; ?>">

                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="" class="" >Tipo prestamo</label>
                                            <!-- <select ng-model="data.tipo_interes"  name="tipo_prestamo" class="form-control col-12    col-sm-12 form-control b-none">

                                                <option selected value="1">Soluto directo</option>
                                                <option value="2">Insoluto</option>
                                                <option value="3">Amortizacion fija</option>

                                            </select> -->
                                            <select ng-change="tipoPrestamoChange()" ng-options="o.name for o in optionsTipoPrestamo" ng-model="selectedTipoPrestamo"  name="tipo_prestamo" class="form-control col-12    col-sm-12 form-control b-none">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="" class="" >Monto prestamo</label>
                                            <input ng-model="datos.monto_prestamo" type="number" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto prestamo" name="monto" autocomplete="off">
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="" class="" >Cuotas</label>
                                            <input ng-model="datos.cantidad_cuotas" type="number" class="col-12    col-sm-12 form-control b-none"  placeholder="Cuotas" name="cuotas" autocomplete="off">
                                        </div>
                                        
                                        <!-- <div class="form-group col-6">
                                            <label for="" class="" >Fecha apertura</label>
                                            <input ng-model="datos.fecha_pago" type="date" class="col-12    col-sm-12 form-control b-none" name="fecha" autocomplete="off">
                                        </div> -->
                                    </div>

                                    <div class="row ">
                                        <div ng-if="selectedTipoPrestamo.id == 1" class="form-group col-6">
                                            <label for="" class="" >Valor cuotas</label>
                                            <input ng-model="datos.valor_cuotas" type="number" class="col-12    col-sm-12 form-control b-none"  placeholder="Monto prestamo" name="monto" autocomplete="off">
                                        </div>

                                        <div class="form-group  col-6"
                                        ng-class="{'col-6': (selectedTipoPrestamo.id == 1), 'col-12': (selectedTipoPrestamo.id != 1)}">
                                            <label for="" class="" >Tasa %</label>
                                            <input ng-model="datos.porciento_interes" type="number" class="col-12    col-sm-12 form-control b-none"  placeholder="Tasa" name="tasa">
                                        </div>

                                        

                                    </div>

                                    

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="" class="" >Tipo interes</label>
                                            <!-- <select ng-model="data.tipo_interes"  name="tipo_prestamo" class="form-control col-12    col-sm-12 form-control b-none">

                                                <option selected value="1">Soluto directo</option>
                                                <option value="2">Insoluto</option>
                                                <option value="3">Amortizacion fija</option>

                                            </select> -->
                                            <select  ng-options="o.name for o in optionsTipoInteres" ng-model="selectedTipoInteres"   ng-model="data.tipo_interes"  name="tipo_prestamo" class="form-control col-12    col-sm-12 form-control b-none">

                                            </select>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="" class="" >Forma pago</label>
                                            <!-- <select ng-model="data.formapago"  name="forma_pago" class="form-control col-12    col-sm-12 form-control b-none">
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
                                        <div ng-click="estilo={display:'block'}" class="form-group col-3">
                                            <p  ng-click="amortizar()" name="amortizar" class="btn btn-primary btn-block" >Amortizar</p>

 <!-- <input  type="submit" ng-click="amortizar()" name="amortizar" class="btn btn-primary btn-block" data-toggle="modal" data-target=".amortizacion-modal-lg"> -->
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

       


        <div id="myModal" class="modal fade amortizacion-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
