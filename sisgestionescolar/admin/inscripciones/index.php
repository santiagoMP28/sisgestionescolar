<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');






?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>inscripciones: <?=$ano_actual;?></h1>
            </div>
            <br>
            <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="bi bi-person-bounding-box"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">inscripciones</span>
                <a href="create.php" class="btn btn-primary btn-sm">nuevo estudiante</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>

