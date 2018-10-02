<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php if($_GET['controller'] == "login"):?>
<script src="<?php echo ROOT_PATH ?>assets/js/usuarios.js" ></script>
<?php endif; ?>
<?php if($_GET['controller'] == "prestamosss"):?>
    <!--<script src="<?php echo ROOT_PATH ?>assets/js/prestamo.js" ></script> -->
<?php endif; ?>









<!-- jQuery 3 -->
<script src="<?php echo ROOT_PATH ?>bootstrap/popper/popper.min.js" ></script>
<script src="<?php echo ROOT_PATH ?>bower_components/jquery/dist/jquery-3.3.1.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo ROOT_PATH ?>bootstrap/bootstrap/js/bootstrap.min.js" ></script>
<!-- Slimscroll -->
<script src="<?php echo ROOT_PATH ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo ROOT_PATH ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ROOT_PATH ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ROOT_PATH ?>dist/js/demo.js"></script>
<script src="<?php echo ROOT_PATH ?>assets/js/moment.min.js"></script>
</body>
</html>
