<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');


include ('../../app/controllers/docentes/listado_de_docentes.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');
include ('../../app/controllers/grados/listado_de_grados.php');
include ('../../app/controllers/materias/listado_de_materias.php');



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado del personal docentes asignado a las materia</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">docentes asignados</h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_asignacion">
                            <i class="bi bi-plus-square"></i> asignar materia
                             </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombres del docente</center></th>
                                    <th><center>Rol</center></th>
                                    <th><center>ci</center></th>
                                    <th><center>fecha de nacimiento</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Estado</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_docentes = 0;
                                foreach ($docentes as $docente){
                                    $id_docente = $docente['id_docente'];
                                    $contador_docentes = $contador_docentes +1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_docentes;?></td>
                                        <td><?=$docente['nombres']." ". $docente['apellidos'];?></td>
                                        <td><?=$docente['nombre_rol'];?></td>
                                        <td><?=$docente['ci'];?></td>
                                        <td style="text-align: center;"><?=$docente['fecha_nacimiento'];?></td>
                                        <td><?=$docente['email'];?></td>
                                        <td>
                                            <?php
                                            if($docente['estado'] == "1") echo "activo";
                                            else echo "INACTIVO";
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="show.php?id=<?=$id_docente;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                <a href="edit.php?id=<?=$id_docente;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                           <!--     <form action="<?=APP_URL;?>/app/controllers/usuarios/delete.php" onclick="preguntar<?=$id_docente;?>(event)" method="post" id="miFormulario<?=$id_docente;?>">
                                                    <input type="text" name="id_usuario" value="<?=$id_docente;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar<?=$id_docente;?>(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: 'Eliminar registro',
                                                            text: '¿Desea eliminar este registro?',
                                                            icon: 'question',
                                                            showDenyButton: true,
                                                            confirmButtonText: 'Eliminar',
                                                            confirmButtonColor: '#a5161d',
                                                            denyButtonColor: '#270a0a',
                                                            denyButtonText: 'Cancelar',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                var form = $('#miFormulario<?=$id_docente;?>');
                                                                form.submit();
                                                            }
                                                        });
                                                    }
                                                </script> -->
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
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

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ docentes",
                "infoEmpty": "Mostrando 0 a 0 de 0 docentes",
                "infoFiltered": "(Filtrado de _MAX_ total docentes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ docentes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>


<!-- Modal -->
<div class="modal fade" id="modal_asignacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">asignacions de materias</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="<?=APP_URL;?>/app/controllers/docentes/create_asignaciones.php" method="post"> <div class="row"></div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">docentes</label>
                    <select name="id_docente" id="" class="form-control">
                        <?php
                         foreach ($docentes as $docente){
                            $id_docentes = $docente['id_docente']; ?>
                            <option value="<?=$id_docente;?>"><?=$docente['apellidos']." ".$docente['nombres'];?></option>
                           <?php  
                         }
                        ?>
                        </select> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">nivel</label>
                    <select name="id_nivel" id="" class="form-control">
                        <?php
                         foreach ($niveles as $nivele){
                            $id_nivel = $nivele['id_nivel']; ?>
                            <option value="<?=$id_nivel;?>"><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
                           <?php  
                         }
                        ?>
                        </select> 
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">grados</label>
                    <select name="id_grado" id="" class="form-control">
                        <?php
                         foreach ($grados as $grado){
                            $id_grado = $grado['id_grado']; ?>
                            <option value="<?=$id_grado;?>"><?=$grado['curso']." - paralelo ".$grado['paralelo'];?></option>
                           <?php  
                         }
                        ?>
                    </select>    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">materias</label>
                    <select name="id_materia" id="" class="form-control">
                        <?php
                         foreach ($materias as $materia){
                            $id_materia = $materia['id_materia']; ?>
                            <option value="<?=$id_materia;?>"><?=$materia['nombre_materia'];?></option>
                           <?php  
                         }
                        ?>
                    </select>    
                </div>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
        <button type="submit" class="btn btn-primary">registrar</button>       
    </div>
    </form> 
        </div>
      </div>
   
    </form> 
    </div>
  </div>
</div>