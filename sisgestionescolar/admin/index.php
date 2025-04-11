<?php
include (__DIR__ . '/../../app/config.php');
include (__DIR__ . '/../layout/parte1.php');
include (__DIR__ . '/../../app/controllers/roles/listado_de_roles.php');
include (__DIR__ . '/../../app/controllers/usuarios/listado_de_usuarios.php');
include (__DIR__ . '/../../app/controllers/niveles/listado_de_niveles.php');
include (__DIR__ . '/../../app/controllers/grados/listado_de_grados.php');
include (__DIR__ . '/../../app/controllers/materias/listado_de_materias.php');
include (__DIR__ . '/../../app/controllers/administrativos/listado_de_administrativos.php');
include (__DIR__ . '/../../app/controllers/docentes/listado_de_docentes.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="container">
        <div class="container">
            <div class="row">
                <h1><?=APP_NAME;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $contador_roles = 0;
                            foreach ($roles as $role){
                                $contador_roles = $contador_roles + 1;
                            }
                            ?>
                            <h3><?=$contador_roles;?></h3>
                            <p>Roles registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-bookmarks"></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/roles" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $contador_usuarios = 0;
                            foreach ($usuarios as $usuario){
                                $contador_usuarios = $contador_usuarios + 1;
                            }
                            ?>
                            <h3><?=$contador_usuarios;?></h3>
                            <p>usuarios registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-people-fill"></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/usuarios" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $contador_niveles = 0;
                            foreach ($niveles as $nivele){
                                $contador_niveles = $contador_niveles + 1;
                            }
                            ?>
                            <h3><?=$contador_niveles;?></h3>
                            <p>Niveles registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-bookshelf"></i></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/niveles" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>



                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $contador_grados = 0;
                            foreach ($grados as $grado){
                                $contador_grados = $contador_grados + 1;
                            }
                            ?>
                            <h3><?=$contador_grados;?></h3>
                            <p>Grados registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-bar-chart-steps"></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/grados" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php
                            $contador_materias = 0;
                            foreach ($materias as $materia){
                                $contador_materias = $contador_materias + 1;
                            }
                            ?>
                            <h3><?=$contador_materias;?></h3>
                            <p>Materias registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-book-half"></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/materias" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dafaut">
                        <div class="inner">
                            <?php
                            $contador_administrativos = 0;
                            foreach ($administrativos as $administrativo){
                                $contador_administrativos = $contador_administrativos + 1;
                            }
                            ?>
                            <h3><?=$contador_administrativos;?></h3>
                            <p>administrativos registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas" ><i class="bi bi-person-lines-fill"></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/administrativos" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <?php
                            $contador_adocentes = 0;
                            foreach ($docentes as $docente){
                                $contador_adocentes = $contador_adocentes + 1;
                            }
                            ?>
                            <h3><?=$contador_adocentes;?></h3>
                            <p>docentes</p>
                        </div>
                        <div class="icon">
                            <i class="fas" style="color: deeppink;"><i class="bi bi-person-video"></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/administrativos" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $contador_adocentes = 0;
                            foreach ($docentes as $docente){
                                $contador_adocentes = $contador_adocentes + 1;
                            }
                            ?>
                            <h3><?=$contador_adocentes;?></h3>
                            <p>estudiantes</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="bi bi-person-bounding-box"></i></i>
                        </div>
                        <a href="<?=APP_URL;?>/admin/estudiantes" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                



            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include (__DIR__ . '/../layout/parte2.php');
include (__DIR__ . '/../layout/mensajes.php');
?>

