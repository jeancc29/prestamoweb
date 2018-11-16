
<?php

$u = new Utilidades();
if($_GET['controller'] != "login")
{
    if(isset($_POST['salir']))
    {
        session_destroy();
        header('location:' . ROOT_PATH. "login");
    }
}

?>
<!DOCTYPE html>
<html <?php if($_GET['controller'] == "home-clientes") echo "ng-app='myModuleHomeClientes'"; ?> >
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo ROOT_PATH ?>plugins/iCheck/square/blue.css">

    <script src="<?php echo ROOT_PATH ?>assets/js/angular.min.js" ></script>
    <?php if($_GET['controller'] == "prestamos"):?>
        <script src="<?php echo ROOT_PATH ?>assets/js/prestamo.js" ></script>
    <?php endif; ?>
    <?php if($_GET['controller'] == "home" || $_GET['controller'] == ""):?>
        <script src="<?php echo ROOT_PATH ?>assets/js/home.js" ></script>
    <?php endif; ?>
    <?php if($_GET['controller'] == "pagos"):?>
        <script src="<?php echo ROOT_PATH ?>assets/js/pagos.js" ></script>
    <?php endif; ?>
    <?php if($_GET['controller'] == "clientes"):?>
        <script src="<?php echo ROOT_PATH ?>assets/js/clientes.js" ></script>
    <?php endif; ?>
    <?php if($_GET['controller'] == "personas"):?>
        <script src="<?php echo ROOT_PATH ?>assets/js/personas.js" ></script>
    <?php endif; ?>

    <?php if($_GET['controller'] == "usuarios"):?>
        <script src="<?php echo ROOT_PATH ?>assets/js/usuarios.js" ></script>
    <?php endif; ?>
 <?php if($_GET['controller'] == "home-clientes"):?>
        <script src="<?php echo ROOT_PATH ?>assets/js/home_clientes.js" ></script>
    <?php endif; ?>

    <?php if($_GET['controller'] == "amortizacion"):?>
        <script src="<?php echo ROOT_PATH ?>assets/js/amortizacion.js" ></script>
    <?php endif; ?>
 <?php if($_GET['controller'] == "principal"):?>
        <script src="<?php echo ROOT_PATH ?>assets/js/principal.js" ></script>
    <?php endif; ?>
<?php if($_GET['controller'] == "reportes"):?>
        <script src="<?php echo ROOT_PATH ?>assets/js/reportes.js" ></script>
    <?php endif; ?>

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo ROOT_PATH ?>bootstrap/bootstrap/css/bootstrap.min.css">
  <!--<link rel="stylesheet" href="<?php echo ROOT_PATH ?>bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo ROOT_PATH ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo ROOT_PATH ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo ROOT_PATH ?>dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       <link rel="stylesheet" href="<?php echo ROOT_PATH ?>dist/css/skins/_all-skins.min.css">
       <!-- Morris chart -->
       <link rel="stylesheet" href="<?php echo ROOT_PATH ?>bower_components/morris.js/morris.css">
       <!-- jvectormap -->
       <link rel="stylesheet" href="<?php echo ROOT_PATH ?>bower_components/jvectormap/jquery-jvectormap.css">
       <!-- Date Picker -->
       <link rel="stylesheet" href="<?php echo ROOT_PATH ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
       <!-- Daterange picker -->
       <link rel="stylesheet" href="<?php echo ROOT_PATH ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
       <!-- bootstrap wysihtml5 - text editor -->
       <link rel="stylesheet" href="<?php echo ROOT_PATH ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style media="screen">
      .editar-iconos{

      }
  .navbar-nav-3 {
      margin: 7.5px -15px;
    }
    .navbar-nav-3 > li > a {
      padding-top: 10px;
      padding-bottom: 10px;
      line-height: 20px;
    }
    @media (max-width: 767px) {
      .navbar-nav-3 .open .dropdown-menu {
        position: static;
        float: none;
        width: auto;
        margin-top: 0;
        background-color: transparent;
        border: 0;
        -webkit-box-shadow: none;
                box-shadow: none;
      }
      .navbar-nav-3 .open .dropdown-menu > li > a,
      .navbar-nav-3 .open .dropdown-menu .dropdown-header {
        padding: 5px 15px 5px 25px;
      }
      .navbar-nav-3 .open .dropdown-menu > li > a {
        line-height: 20px;
      }
      .navbar-nav-3 .open .dropdown-menu > li > a:hover,
      .navbar-nav-3 .open .dropdown-menu > li > a:focus {
        background-image: none;
      }
    }
    @media (min-width: 768px) {
      .navbar-nav-3 {
        float: left;
        margin: 0;
      }
      .navbar-nav-3 > li {
        float: left;
      }
      .navbar-nav-3 > li > a {
        padding-top: 15px;
        padding-bottom: 15px;
      }
    }

      .navbar-nav-3 > li > .dropdown-menu {
        margin-top: 0;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
      .navbar-fixed-bottom .navbar-nav-3 > li > .dropdown-menu {
        margin-bottom: 0;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .navbar-default .navbar-nav-3 > li > a {
        color: #777;
      }
      .navbar-default .navbar-nav-3 > li > a:hover,
      .navbar-default .navbar-nav-3 > li > a:focus {
        color: #333;
        background-color: transparent;
      }
      .navbar-default .navbar-nav-3 > .active > a,
      .navbar-default .navbar-nav-3 > .active > a:hover,
      .navbar-default .navbar-nav-3 > .active > a:focus {
        color: #555;
        background-color: #e7e7e7;
      }
      .navbar-default .navbar-nav-3 > .disabled > a,
      .navbar-default .navbar-nav-3 > .disabled > a:hover,
      .navbar-default .navbar-nav-3 > .disabled > a:focus {
        color: #ccc;
        background-color: transparent;
      }
      .navbar-default .navbar-nav-3 > .open > a,
      .navbar-default .navbar-nav-3 > .open > a:hover,
      .navbar-default .navbar-nav-3 > .open > a:focus {
        color: #555;
        background-color: #e7e7e7;
      }
      @media (max-width: 767px) {
        .navbar-default .navbar-nav-3 .open .dropdown-menu > li > a {
          color: #777;
        }
        .navbar-default .navbar-nav-3 .open .dropdown-menu > li > a:hover,
        .navbar-default .navbar-nav-3 .open .dropdown-menu > li > a:focus {
          color: #333;
          background-color: transparent;
        }
        .navbar-default .navbar-nav-3 .open .dropdown-menu > .active > a,
        .navbar-default .navbar-nav-3 .open .dropdown-menu > .active > a:hover,
        .navbar-default .navbar-nav-3 .open .dropdown-menu > .active > a:focus {
          color: #555;
          background-color: #e7e7e7;
        }
        .navbar-default .navbar-nav-3 .open .dropdown-menu > .disabled > a,
        .navbar-default .navbar-nav-3 .open .dropdown-menu > .disabled > a:hover,
        .navbar-default .navbar-nav-3 .open .dropdown-menu > .disabled > a:focus {
          color: #ccc;
          background-color: transparent;
        }
      }
      .navbar-inverse .navbar-nav-3 > li > a {
        color: #9d9d9d;
      }
      .navbar-inverse .navbar-nav-3 > li > a:hover,
      .navbar-inverse .navbar-nav-3 > li > a:focus {
        color: #fff;
        background-color: transparent;
      }
      .navbar-inverse .navbar-nav-3 > .active > a,
      .navbar-inverse .navbar-nav-3 > .active > a:hover,
      .navbar-inverse .navbar-nav-3 > .active > a:focus {
        color: #fff;
        background-color: #080808;
      }
      .navbar-inverse .navbar-nav-3 > .disabled > a,
      .navbar-inverse .navbar-nav-3 > .disabled > a:hover,
      .navbar-inverse .navbar-nav-3 > .disabled > a:focus {
        color: #444;
        background-color: transparent;
      }
      .navbar-inverse .navbar-nav-3 > .open > a,
      .navbar-inverse .navbar-nav-3 > .open > a:hover,
      .navbar-inverse .navbar-nav-3 > .open > a:focus {
        color: #fff;
        background-color: #080808;
      }
      @media (max-width: 767px) {
        .navbar-inverse .navbar-nav-3 .open .dropdown-menu > .dropdown-header {
          border-color: #080808;
        }
        .navbar-inverse .navbar-nav-3 .open .dropdown-menu .divider {
          background-color: #080808;
        }
        .navbar-inverse .navbar-nav-3 .open .dropdown-menu > li > a {
          color: #9d9d9d;
        }
        .navbar-inverse .navbar-nav-3 .open .dropdown-menu > li > a:hover,
        .navbar-inverse .navbar-nav-3 .open .dropdown-menu > li > a:focus {
          color: #fff;
          background-color: transparent;
        }
        .navbar-inverse .navbar-nav-3 .open .dropdown-menu > .active > a,
        .navbar-inverse .navbar-nav-3 .open .dropdown-menu > .active > a:hover,
        .navbar-inverse .navbar-nav-3 .open .dropdown-menu > .active > a:focus {
          color: #fff;
          background-color: #080808;
        }
        .navbar-inverse .navbar-nav-3 .open .dropdown-menu > .disabled > a,
        .navbar-inverse .navbar-nav-3 .open .dropdown-menu > .disabled > a:hover,
        .navbar-inverse .navbar-nav-3 .open .dropdown-menu > .disabled > a:focus {
          color: #444;
          background-color: transparent;
        }
      }

      .dropdown-menu-3 {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        font-size: 14px;
        text-align: left;
        list-style: none;
        background-color: #fff;
        -webkit-background-clip: padding-box;
                background-clip: padding-box;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, .15);
        border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
                box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
      }
      .dropdown-menu-3.pull-right {
        right: 0;
        left: auto;
      }
      .dropdown-menu-3 .divider {
        height: 1px;
        margin: 9px 0;
        overflow: hidden;
        background-color: #e5e5e5;
      }
      .dropdown-menu-3 > li > a {
        display: block;
        padding: 3px 20px;
        clear: both;
        font-weight: normal;
        line-height: 1.42857143;
        color: #333;
        white-space: nowrap;
      }
      .dropdown-menu-3 > li > a:hover,
      .dropdown-menu-3 > li > a:focus {
        color: #262626;
        text-decoration: none;
        background-color: #f5f5f5;
      }
      .dropdown-menu-3 > .active > a,
      .dropdown-menu-3 > .active > a:hover,
      .dropdown-menu-3 > .active > a:focus {
        color: #fff;
        text-decoration: none;
        background-color: #337ab7;
        outline: 0;
      }
      .dropdown-menu-3 > .disabled > a,
      .dropdown-menu-3 > .disabled > a:hover,
      .dropdown-menu-3 > .disabled > a:focus {
        color: #777;
      }
      .dropdown-menu-3 > .disabled > a:hover,
      .dropdown-menu-3 > .disabled > a:focus {
        text-decoration: none;
        cursor: not-allowed;
        background-color: transparent;
        background-image: none;
        filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
      }
      .open > .dropdown-menu-3 {
        display: block;
      }
      .open > a {
        outline: 0;
      }
      .dropdown-menu-3-right {
        right: 0;
        left: auto;
      }
      .dropdown-menu-3-left {
        right: auto;
        left: 0;
      }


      .nav-3{
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
      }
      .nav-3> li {
        position: relative;
        display: block;
      }


      .nav-3> li > a {
        position: relative;
        display: block;
        padding: 15px 15px;
      }
      .nav-3> li > a:hover,
      .nav-3> li > a:focus {
        text-decoration: none;
        background-color: #eee;
      }
      .nav-3> li.disabled > a {
        color: #777;
      }
      .nav-3> li.disabled > a:hover,
      .nav-3> li.disabled > a:focus {
        color: #777;
        text-decoration: none;
        cursor: not-allowed;
        background-color: transparent;
      }
      .nav-3.open > a,
      .nav-3.open > a:hover,
      .nav-3.open > a:focus {
        background-color: #eee;
        border-color: #337ab7;
      }
      .nav-3.nav-divider {
        height: 1px;
        margin: 9px 0;
        overflow: hidden;
        background-color: #e5e5e5;
      }
      .nav-3> li > a > img {
        max-width: none;
      }
      .label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: bold;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
      }
      .btn .label {
        position: relative;
        top: -1px;
      }

      .bg-azul{
        background: #3c8dbc;

      }

      .bg-azul > div > ul > li > a,
      .bg-azul > .sidebar-toggle{
        color: #fff;
      }





      #cargando{
        width: 5%;
        height: 5%;
      }
      #correcto{
        width: 5%;
        height: 5%;
      }

      .veloz{
        -webkit-animation: 1s veloz 1;
      }

      @-webkit-keyframes veloz{
        0%{
          opacity: 0;
          -webkit-transform: translateX(-200%);
        }
      }

  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" <?php if($_GET['controller'] == "home-clientes") echo "ng-controller='myController'"; ?>>
<div  class="wrapper">



  <header class="main-header" style="display:<?php if($_GET['controller'] == 'login') echo 'none'; ?>">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PRS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Prestamos</b>Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar-3 navbar-static-top navbar-dark bg-azul">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav-3 navbar-nav-3">
          <!-- Messages: style can be found in dropdown.less-->



          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="" data-toggle="dropdown">
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
            </a>
            <ul class="dropdown-menu-3">
              <!-- User image -->
              <!-- <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li> -->
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>

              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
            <?php if($_GET['controller'] != "principal"): ?>
              <li>
                  <form action="<?php echo ROOT_PATH . 'home'?>" method="post">
                      <input type="submit" name="salir" value="salir" class="btn btn-btn-white mt-1">
                  </form>
              </li>
            <?php endif;?>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
