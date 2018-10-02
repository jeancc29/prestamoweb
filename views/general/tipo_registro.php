
<div class="content-wrapper">
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


    <section class="content col-10 col-sm-10  col-lg-8 ">
        <div class="row justify-content-center">

            <div class="box " >

                <div class="box box-success">

                    <div class="row m-3">
                        <h3 class="">Tipo registro</h3>
                        <img style="display: none" id="cargando" class=" ml-5" src="<?php echo ROOT_PATH ?>assets/cargando.gif" alt="">
                        <img style="display: none" id="correcto" class=" ml-5 veloz" src="<?php echo ROOT_PATH ?>assets/correcto.ico" alt="">
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" name="clientes">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Renglon</label>
                                <input name="renglon" type="text" class="form-control" placeholder="Renglon ...">
                            </div>

                            <!-- textarea -->
                            <div class="form-group">
                                <label>Descripcion</label>
                                <textarea name="descripcion" class="form-control" rows="3" placeholder="Descripcion ..."></textarea>
                            </div>

                            <?php global $info, $error; if($error == 1): ?>
                                <p class="text-danger"><?php  echo $info; ?></p>
                            <?php endif ?>
                            <?php global $info, $error; if($error == 2): ?>
                                <p class="text-primary"><?php  echo $info; ?></p>
                            <?php endif ?>
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
