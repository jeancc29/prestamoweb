
<aside style="display:<?php if($_GET['controller'] == 'login') echo 'none'; ?>" class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <?php if($_GET['controller'] != "home-clientes" && $_GET['controller'] != "principal"): ?>
      <div>
          <!-- <div class="user-panel">
              <div class="pull-left image">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                  <p><?php echo $_SESSION['nombre']; ?></p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
          </div> -->
          <!-- search form -->
          <!-- <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
              </div>
          </form> -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>
              <li class="active treeview">
                  <a href="#">
                      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  </a>
              </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-files-o"></i>
                      <span>General</span>
                      <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="<?php echo ROOT_PATH; ?>general/tipo-registro"><i class="fa fa-circle-o"></i> Tipo registro</a></li>
                  </ul>
              </li>
              <li>
                  <a href="<?php echo ROOT_PATH; ?>personas/">
                      <i class="fa fa-user"></i> <span>Personas</span>
                  </a>
              </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-pie-chart"></i>
                      <span>Prestamo</span>
                      <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="<?php echo ROOT_PATH; ?>prestamos/"><i class="fa fa-circle-o"></i> Todos</a></li>
                      <li><a href="<?php echo ROOT_PATH; ?>prestamos/nuevo"><i class="fa fa-circle-o"></i> Nuevo prestamo</a></li>
                      <!--          <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Activos</a></li>-->
                      <!--          <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Declinados</a></li>-->
                      <!--          <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Incobrables</a></li>-->
                  </ul>
              </li>
              <li>
                  <a href="<?php echo ROOT_PATH; ?>pagos/">
                      <i class="fa fa-user"></i> <span>Pagos</span>
                  </a>
              </li>
              <li>
                  <a href="<?php echo ROOT_PATH; ?>usuarios/">
                      <i class="fa fa-laptop"></i> <span>Usuarios</span>
                  </a>
              </li>
              <li>
                  <a href="<?php echo ROOT_PATH; ?>amortizacion/">
                      <i class="ion-android-apps"></i> <span>Amortizacion</span>
                  </a>
              </li>
              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-files-o"></i>
                      <span>Reportes</span>
                      <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="<?php echo ROOT_PATH; ?>reportes/prestamos"><i class="fa fa-circle-o"></i> Prestamos</a></li>
                      <li><a href="<?php echo ROOT_PATH; ?>reportes/pagos"><i class="fa fa-circle-o"></i> Pagos</a></li>
                      <li><a href="<?php echo ROOT_PATH; ?>reportes/ganancias"><i class="fa fa-circle-o"></i> Ganancias</a></li>
                  </ul>
              </li>






              <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
              <li class="header">LABELS</li>
              <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
              <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
              <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
          </ul>
      </div>
    <?php endif; ?>
      <?php if($_GET['controller'] == "home-clientes"): ?>
          <div>
              <!-- <div class="user-panel">
                  <div class="pull-left image">
                      <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info">
                      <p><?php echo $_SESSION['nombre']; ?></p>
                      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                  </div>
              </div> -->
              <!-- search form -->
              <!-- <form action="#" method="get" class="sidebar-form">
                  <div class="input-group">
                      <input type="text" name="q" class="form-control" placeholder="Search...">
                      <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
                  </div>
              </form> -->
              <!-- /.search form -->
              <!-- sidebar menu: : style can be found in sidebar.less -->
              <ul class="sidebar-menu" data-widget="tree">
                  <!-- <li class="header">MAIN NAVIGATION</li>
                  <li class="active treeview">
                      <a href="#">
                          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                      </a>
                  </li> -->
                  <li>
                      <a ng-click="ventana=1" >
                          <i class="fa fa-user"></i> <span>Resumen</span>
                      </a>
                  </li>
                  <li>
                      <a ng-click="ventana=2" >
                          <i class="fa fa-user"></i> <span>Prestamos</span>
                      </a>
                  </li>
                  <li>
                      <a ng-click="ventana=3" >
                          <i class="fa fa-user"></i> <span>Pagos</span>
                      </a>
                  </li>







                  <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                  <li class="header">LABELS</li>
                  <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                  <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                  <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
              </ul>
          </div>
      <?php endif; ?>

      <?php if($_GET['controller'] == "principal"): ?>
          <div>

              <ul class="sidebar-menu" data-widget="tree">

                  <li>
                      <a href="<?php echo ROOT_PATH; ?>principal/amortizacion" >
                          <i class="ion-android-apps"></i> <span> Amortizacion</span>
                      </a>
                  </li>
                  <li>
                      <a ng-click="ventana=2" href="<?php echo ROOT_PATH; ?>principal/sucursales">
                          <i class="fa fa-home"></i> <span>Sucursales</span>
                      </a>
                  </li>
                  <li>
                      <a ng-click="ventana=3" href="<?php echo ROOT_PATH; ?>login">
                          <i class="fa fa-user"></i> <span>Login</span>
                      </a>
                  </li>








              </ul>
          </div>
      <?php endif; ?>
  </section>
  <!-- /.sidebar -->
</aside>
