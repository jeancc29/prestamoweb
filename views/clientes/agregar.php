<?php
$u = new Utilidades();
?>
<div ng-app="myModuleClientes">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" ng-controller="myController">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Registrar persona
                <small>Preview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo ROOT_PATH; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo ROOT_PATH; ?>clientes//"><i class="ion-android-people"></i> Clientes</a></li>
                <li class="active" >General Elements</li>
            </ol>
        </section>

        <!-- Main content -->


        <section class="content col-2 col-sm-10  col-lg-8 ">
            <div class="row justify-content-center">

                <div class="box " >

                    <div class="box box-success">

                        <div class="row m-3">
                            <h3 class="">Registrar persona</h3>
                            <img style="display: none" id="cargando" class=" ml-5" src="<?php echo ROOT_PATH ?>assets/cargando.gif" alt="">
                            <img style="display: none" id="correcto" class=" ml-5 veloz" src="<?php echo ROOT_PATH ?>assets/correcto.ico" alt="">
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="post" name="clientes" action="<?php echo ROOT_PATH;?>clientes/agregar">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="" class="" >Tipo persona</label>
                                    <select name="tipo_usuario" ng-model="selectedTipoUsuario" ng-options="o.name for o in optionsTipoUsuario" class="custom-select col-12    col-sm-12">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input required name="nombre" type="text" class="form-control" placeholder="Nombre completo ..." value="<?php if(!empty($viewmodel)) echo $viewmodel[0]['nombre'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Correo</label>
                                    <input required name="correo" type="email" class="form-control" placeholder="Correo ..." value="<?php if(!empty($viewmodel)) echo $viewmodel[0]['correo'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Fecha nacimiento</label>
                                    <input required name="fecha_nacimiento" type="date" class="form-control" placeholder="Enter ..." value="<?php if(!empty($viewmodel)) echo $viewmodel[0]['fecha_nacimiento'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Sector</label>
                                    <select name="sector" id="" class="form-control">
                                        <?php foreach( $u->llenar_combo_tiposregistros("ubicacion") as $cli): ?>
                                            <option value="<?php echo $cli['tipo_registro'];?>" <?php echo (!empty($viewmodel) && $cli['tipo_registro'] == $viewmodel[0]['tipo_registro_sector'])?('selected'):(''); ?>><?php echo $cli['descripcion']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <textarea name="direccion" class="form-control" rows="3" placeholder="Enter ..."><?php if(!empty($viewmodel)) echo $viewmodel[0]['direccion'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Identificacion</label>
                                    <input name="identificacion" type="text" class="form-control" placeholder="Enter ..." value="<?php if(!empty($viewmodel)) echo $viewmodel[0]['identificacion'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Seleccionar sexo</label>
                                    <select name="sexo" class="form-control">
                                        <option value="Masculino">Hombre</option>
                                        <option value="Femenino">Mujer</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Telefono</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input name="telefono" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="<?php if(!empty($viewmodel)) echo $viewmodel[0]['telefono'] ?>">
                                    </div>
                                    <!-- /.input group -->
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
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>





  <!-- Control Sidebar -->
