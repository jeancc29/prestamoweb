
<div class="login-box bg-primary">
    <div class="login-logo">
        <a href="../../index2.html"><b>Presta</b>mos</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <div class="social-auth-links text-center">

            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                Google+</a>
        </div>

        <form name="form_login" action="<?php echo ROOT_PATH ?>login" method="post">
            <div class="form-group has-feedback">
                <input name="usuario" type="text" class="form-control" placeholder="usuario" value="<?php global $error, $u;  if(!empty($error)) echo $u; ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="clave" type="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row justify-content-center">
                <?php global $error; if(!empty($error)): ?>
                    <p class="text-danger"><?php  echo $error; ?></p>
                <?php endif ?>
                <div class="col-12">
                    <button name="login" type="submit" class="btn btn-primary btn-block ">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>



    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

