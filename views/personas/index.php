<div class="content-wrapper" ng-app="myModulePersonas">
    <!-- Content Header (Page header) -->
    <div ng-controller="myController">
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
                <section class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header">

                                    <h3 class="box-title">Personas</h3>
                                    <a href="<?php echo ROOT_PATH; ?>personas/agregar" class="btn btn-primary ml-3">Nuevo</a>
                                    <div class="box-tools">
                                        <div class="input-group input-group-sm" style="width: 350px;">
                                            <input ng-model="busqueda" ng-keyup="buscarcliente()" type="text" name="table_search" class="form-control pull-right" placeholder="Buscar por: Dni, nombre">

                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default p-2"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Fecha</th>
                                            <th>Direccion</th>
                                            <th>Usuario</th>
                                        </tr>
                                        <tr class="editar-iconos" ng-repeat="c in clientes">

                                            <td>{{c.codigo_usuario}}</td>
                                            <td>{{c.nombre}}</td>
                                            <td>{{c.identificacion}}</td>
                                            <td>{{c.correo}}</td>
                                            <td>
                                                <a href="<?php echo ROOT_PATH; ?>personas/agregar/{{c.codigo_usuario}}" class="ion-edit d-inline bg-primary py-1 px-2 text-white rounded"></a>
                                                <a ng-click="clienteeliminar(c.codigo_usuario)" class="ion-android-delete d-inline  ml-2 bg-danger py-1 px-2 text-white rounded"></a>
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

        </section>
    </div>
    <!-- /.content -->
</div>