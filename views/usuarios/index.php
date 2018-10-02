
<div class="content-wrapper" ng-app="myModuleUsuarios">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General tipo registro
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active" >General Elements</li>
        </ol>
    </section>

    <!-- Main content -->


    <section class="content col-10 col-sm-10  col-lg-8 " ng-controller="myController">
        <div class="row justify-content-center">

            <div class="box " >

                <div class="box box-success">

                    <div class="row m-3">
                        <h3 class="">Tipo registro</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" name="clientes" action="">
                            <div class="row ">
                                <input type="hidden" name="codigo_usuario" value="{{cliente.codigo_usuario}}">
                                <!--                    <div class="form-group  col-3">-->
                                <!--                      <label for="" class="" >Dni</label>-->
                                <!--                      <input disabled  type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="identificacion" name="identificacion" value="{{cliente.identificacion}}">-->
                                <!--                    </div>-->

                                <div class="form-group col-6">
                                    <label for="" class="" >Nombre</label>
                                    <input disabled  type="text" class="col-12    col-sm-12 form-control b-none"  placeholder="Nombre cliente..." name="nombre" autocomplete="off" value="{{cliente.nombre}}">
                                </div>
                                <div class="form-group  col-2">
                                    <label for="" class="text-white" >...</label>
                                    <button ng-click="datosForumario(true)" type="button" class="btn btn-primary col-12    col-sm-12 form-control ion-ios-person" data-toggle="modal" data-target=".bd-example-modal-lg"></button>
                                </div>
                            </div>

                            <!-- textarea -->
                            <div class="form-group">
                                <label>Usuarios</label>
                                <input type="text" name="usuario" class="form-control" rows="3" placeholder="Usuario ..."></input>
                            </div>
                            <div class="form-group">
                                <label>Clave</label>
                                <input type="password" name="clave" class="form-control" rows="3" placeholder="Clave ..."></input>
                            </div>


                            <input type="submit" name="guardar" value="Guardar" class="btn btn-info pull-right">


                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
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
                                <input class="col-2 btn btn-primary ml-2" type="submit" name="" value="Buscar" ng-click="buscarcliente()">

                            </div>
                        </div>

                        <table class="table table-hover table-bordered min-width-500px mt-4">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">identificacion</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Agregar</th>
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


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
