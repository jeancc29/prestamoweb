<?php
$u = new Utilidades();

  $tipo_usuario = (!empty($viewmodel)) ? ($viewmodel[0]['tipo_registro_usuario']) : ('0') ;
  $tipo_cliente = (!empty($viewmodel)) ? ($viewmodel[0]['tipo_registro_cliente']) : ('0') ;
?>
<div ng-app="myModulePersonas">
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
                <li><a href="<?php echo ROOT_PATH; ?>personas/"><i class="ion-android-people"></i> Clientes</a></li>
                <li class="active" >General Elements</li>
            </ol>
        </section>

        <!-- Main content -->


        <section ng-init="personaEditar('<?php echo $tipo_usuario ?>', '<?php  echo $tipo_cliente ?>')"  class="content col-10 col-sm-10  col-lg-8 ">
            <div class="row justify-content-center">

                <div class="box " >

                    <div class="box box-success">

                        <div class="row m-3">
                            <h3 class="">Registrar persona</h3>
                            <a class="btn btn-primary ml-2" href="<?php echo ROOT_PATH; ?>personas">Personas</a>
                            <img style="display: none" id="cargando" class=" ml-5" src="<?php echo ROOT_PATH ?>assets/cargando.gif" alt="">
                            <img style="display: none" id="correcto" class=" ml-5 veloz" src="<?php echo ROOT_PATH ?>assets/correcto.ico" alt="">
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="post" name="clientes" action="">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="" class="" >Tipo persona</label>
                                    <!-- <select name="tipo_usuario" class="custom-select col-12    col-sm-12">
                                        <?php foreach( $u->llenar_combo_tiposregistros("usuario") as $per): ?>
                                            <option value="<?php echo $per['tipo_registro'];?>" <?php echo (!empty($viewmodel) && $per['tipo_registro'] == $viewmodel[0]['tipo_registro_usuario'])?('selected'):(''); ?>><?php echo $per['descripcion']; ?> </option>
                                        <?php endforeach; ?>
                                    </select> -->
                                    <!-- <select name="tipo_usuario" 
                                        ng-model="selectedTipoUsuario"
                                        ng-selected="selectedTipoUsuario.tipo_registro"
                                        ng-options="o.descripcion for o in optionsTipoUsuario"  value="selectedTipoUsuario.tipo_registro"   name="tipo_prestamo" class="form-control col-12    col-sm-12 form-control b-none">

                                            </select> -->
                                            <select ng-change="usuarioChange()" ng-model="selectedTipoUsuario" name="tipo_usuario" 
                                              class="form-control col-12    col-sm-12 form-control b-none">
                                            
                                            <option  ng-repeat="u in optionsTipoUsuario" 
                                                       value="{{u.tipo_registro}}" >{{u.descripcion}}</option> <!-- ng-selected="u.tipo_registro == selectedTipoUsuario" -->

                                                        
                                            </select>
                                </div>
                                <div class="form-group" ng-if="es_cliente">
                                            <label for="" class="" >Tipo cliente</label>
                                            <!-- <select ng-options="o.descripcion for o in optionsTipoCliente" ng-model="selectedTipoCliente"   name="tipo_cliente" class="form-control col-12    col-sm-12 form-control b-none">

                                            </select> -->
                                            <select  name="tipo_cliente" id="" class="form-control col-12    col-sm-12 form-control b-none">
                                                <option  ng-repeat="c in optionsTipoCliente" 
                                                      ng-selected="c.tipo_registro == selectedTipoCliente" value="{{c.tipo_registro}}" >{{c.descripcion}}</option>

                                                        
                                                </select>
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
