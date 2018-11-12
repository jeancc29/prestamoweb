<div class="content-wrapper" ng-app="myModulePrestamo">
    <!-- Content Header (Page header) -->
   <div ng-controller="myController">
      <!--  <section class="content-header">
           <h1>
               Dashboard
               <small>Control panel</small>
           </h1>
           <ol class="breadcrumb">
               <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
               <li class="active">Dashboard</li>
           </ol>
       </section> -->

       <!-- Main content -->
       <section class="content">
           <!-- Small boxes (Stat box) -->

           <!-- /.row -->
           <!-- Main row -->
           <div class="row justify-content-center">
               <!-- Large col -->
               <section class="col-lg-12" style=" overflow: auto;">
                   <div class="row">
                       <div class="col-12">
                           <div class="box">
                               <div class="box-header">
                                   <h3 class="box-title">Prestamos</h3>
                                   <a class="btn btn-primary" href="<?php echo ROOT_PATH; ?>prestamos/nuevo">Nuevo</a>
                                   <div class="box-tools">
                                       <div class="input-group input-group-sm col-7 col-sm-10 float-right" style="width: 350px;">
                                           <input ng-model="busqueda" ng-keyup="buscarprestamo()" type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                           <div class="input-group-btn">
                                               <button type="submit" class="btn btn-default p-2"><i class="fa fa-search"></i></button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <!-- /.box-header -->
                               <div class="box-body table-responsive no-padding">
                                   <table class="table table-hover table-sm">
                                       <tr>
<!--                                           <th>ID prestamo</th>-->
<!--                                           <th>Monto</th>-->
<!--                                           <th>Cuotas</th>-->
<!--                                           <th>Cliente</th>-->
                                           <th class="d-none d-sm-table-row" style="font-size: 13px">ID</th>
                                           <th style="font-size: 13px">Monto</th>
                                           <th class="d-none d-sm-table-row" style="font-size: 13px">Cuotas</th>
                                           <th style="font-size: 13px">Balance</th>
                                           <th style="font-size: 13px">Pagado</th>
                                           <th style="font-size: 13px">Fecha</th>
                                           <th class="d-none d-sm-table-cell" style="font-size: 13px">Ultimo pago</th>
                                           <th style="font-size: 13px">Cliente</th>
                                           <th style="font-size: 13px">Editar</th>
                                       </tr>
                                       <tr class="editar-iconos" ng-repeat="p in prestamos">

                                           <td class="d-none d-sm-table-row" style="font-size: 13px">{{p.id_registro}}</td>
                                           <td style="font-size: 13px">{{p.monto_prestamo | currency}}</td>
                                           <td class="d-none d-sm-table-row" style="font-size: 13px">{{p.cantidad_cuotas}}</td>
                                           <td style="font-size: 13px">{{p.balance_pendiente | currency}}</td>
                                           <td style="font-size: 13px">{{p.monto_pagado | currency}}</td>
                                           <td style="font-size: 13px">{{p.fecha}}</td>
                                           <td class="d-none d-sm-table-cell" style="font-size: 13px">{{p.fecha_ultimo_pago}}</td>
                                           <td class="d-none d-sm-table-cell" style="font-size: 13px">{{p.nombre}}</td>
                                           <td  class="d-sm-none" style="font-size: 13px">{{p.nombre | limitTo:15:0}}</td>
                                           <td style="font-size: 10px">
                                               <a class="ion-edit d-inline bg-primary py-1 px-2 text-white rounded" href="<?php echo ROOT_PATH ?>prestamos/nuevo/{{p.id_registro}}"></a>
                                               <a class="ion-information-circled d-inline bg-primary py-1 px-2 text-white rounded" data-toggle="modal" data-target=".bd-example-modal-lg"  ng-click="verPrestamo(p)"></a>
                                               
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

       </section>
   </div>
    <!-- /.content -->
</div>
