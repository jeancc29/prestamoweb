
<!-- Left side column. contains the logo and sidebar -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" ng-app="myModuleHome">
    <!-- Content Header (Page header) -->
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
    <section class="content" ng-controller="myController" ng-init="load()">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>Prestamos</h3>

                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo ROOT_PATH;?>prestamos" class="small-box-footer">Ver prestamos <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>Pagos<sup style="font-size: 20px"></sup></h3>


                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo ROOT_PATH;?>pagos" class="small-box-footer">Ver pagos <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>Personas</h3>


                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?php echo ROOT_PATH;?>personas" class="small-box-footer">Ver personas <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- Content Header (Page header) -->
    

        <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-usd"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total prestado</span>
                  <span class="info-box-number">{{datos.total_prestado | currency}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa fa-usd"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Capital cobrado</span>
                  <span class="info-box-number">{{datos.capital_cobrado | currency}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-usd"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Interes cobrado</span>
                  <span class="info-box-number">{{datos.interes_cobrado | currency}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
             <div class="col-sm-6 col-lg-3">
              <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa fa-usd"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Mora cobrado</span>
                  <span class="info-box-number">{{datos.mora_cobrada | currency}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
        </div>
            
        

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
