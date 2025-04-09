<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/estudiantes/listado_de_estudiantes.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Listado de estudiantes</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">estudiantes registrados</h3>
                            <div class="card-tools">
                                <a href="../inscripciones/create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo estudiantes</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Apellidos y nombres</center></th>
                                    <th><center>ci</center></th>
                                    <th><center>fecha de nacimiento</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Celular</center></th>
                                    <th><center>Nivel</center></th>
                                    <th><center>Turno</center></th>
                                    <th><center>grado</center></th>
                                    <th><center>Estado</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_estudiantes = 0;
                                foreach ($estudiantes as $estudiante){
                                    $id_estudiante = $estudiante['id_estudiante'];
                                    $contador_estudiantes = $contador_estudiantes +1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_estudiantes;?></td>
                                        <td><?=$estudiante['apellidos']." ". $estudiante['nombres'];?></td>
                                        <td><?=$estudiante['ci'];?></td>
                                        <td><?=$estudiante['fecha_nacimiento'];?></td>
                                        <td style="text-align: center;"><?=$estudiante['email'];?></td>
                                        <td><?=$estudiante['celular'];?></td>
                                        <td><?=$estudiante['nivel'];?></td>
                                        <td><?=$estudiante['turno'];?></td>
                                        <td><?=$estudiante['curso']." - ".$estudiante['paralelo'];?></td>

                                        <td>
                                            <?php
                                            if($estudiante['estado'] == "1") echo "activo";
                                            else echo "INACTIVO";
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="show.php?id=<?=$id_estudiante;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                <a href="edit.php?id=<?=$id_estudiante;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                           <!--     <form action="<?=APP_URL;?>/app/controllers/usuarios/delete.php" onclick="preguntar<?=$id_estudiante;?>(event)" method="post" id="miFormulario<?=$id_estudiante;?>">
                                                    <input type="text" name="id_usuario" value="<?=$id_estudiante;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar<?=$id_estudiante;?>(event) {
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
                                                                var form = $('#miFormulario<?=$id_estudiante;?>');
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Estudiantes",
                "infoFiltered": "(Filtrado de _MAX_ total Estudiantes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Estudiantes",
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