<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />
<!--required here!!! no borrar-->
<!-- ============================================================== -->
<!-- inicio Page Content -->
<!-- ============================================================== -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title text-center">Tiempo de actividades - HOY</h4>
                <div class="table-responsive m-t-20">
                    <table id="dash" class=" display table stylish-table">
                        <thead>

                            <tr>
                                <th>Grupo</th>
                                <th>Empresa</th>
                                <th>Actividad</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Salida</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th>Grupo</th>
                                <th>Empresa</th>
                                <th>Actividad</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Salida</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if (!empty($actividades)) :  ?>
                                <?php foreach ($actividades as $actividad) : ?>
                                    <?php if (isset($actividad->inicio)) : ?>

                                        <tr>
                                            <td><?php echo $actividad->coordinador ?></td>
                                            <td><?php echo $actividad->empresa ?></span></td>
                                            <td><span class="label label-light-info"> <?php echo $actividad->actividad ?></span></td>
                                            <td><span class="label label-light-success"> <?php echo $actividad->inicio ?></span></td>
                                            <td><span class="label label-light-danger"> <?php if (isset($actividad->fin)) {
                                                                                            echo $actividad->fin;
                                                                                        } else {
                                                                                            echo "sin terminar";
                                                                                        }  ?> </span></td>
                                            <td><span class="label label-light-warning"><?php echo $actividad->hora ?></span></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <button class="pull-right btn btn-sm btn-rounded btn-success" data-toggle="modal" data-target="#myModal">Agregar</button>


                <h4 class="card-title text-center">To do list</h4>

                <!-- ============================================================== -->
                <!-- To do list widgets -->
                <!-- ============================================================== -->
                <div class="to-do-widget m-t-20">
                    <!-- .modal for add task -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Agregar Tarea</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url() ?>main/cargar_tarea" method="post" novalidate autocomplete="off">
                                        <div class="form-group">
                                            <label for="nombre">Nombre de la tarea</label>
                                            <div class="controls">
                                                <input type="text" id="nombre" name="nombre" autofocus class="form-control" placeholder="Ingrese tarea pendiente.." required data-validation-required-message="¡Escribi algo!" minlength="10">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="fecha">Fecha Limite</label>
                                            <div id="datepicker-inline">
                                                <div class="controls">
                                                    <input type="date" id="fecha" name="fecha" class="form-control" placeholder="Ingrese fecha limite.." required data-validation-required-message="¡La fecha limite es obligatoria!">
                                                </div>
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-success">Cargar</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->


                    <?php if (!empty($tareas)) :  ?>
                        <?php foreach ($tareas as $tarea) : ?>

                            <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">

                                <?php
                                $fecha_actual = strtotime(date("d-m-Y", time()));
                                $fecha_entrada = strtotime(date($tarea->fecha, time()));

                                $estado = 0;
                                ($tarea->estado == 1 ?  $estado = "checked" : '');
                                $done = 0;
                                ($tarea->estado == 1 ?  $done = "task-done" : '');
                                $id = $tarea->id;

                                if ($fecha_actual == $fecha_entrada) {
                                    $vencimiento = "<span class='label label-warning'>Vence hoy</span>";
                                } elseif ($fecha_actual > $fecha_entrada) {
                                    $vencimiento = "<span class='label label-danger'>Vencido</span>";
                                } else {
                                    $vencimiento = "<span></span>";
                                }
                                if ($tarea->estado == 1) {
                                    $vencimiento = "<span class='label label-success' style='background-color:lightgreen' >Completado</span>";
                                } else {
                                }
                                ?>

                                <li class="list-group-item" data-role="task">

                                    <form action="<?php echo base_url() ?>main/update_tarea" method="post">

                                        <div class="checkbox checkbox-info">

                                            <input for="id<?php echo $id ?>" id="id<?php echo $id ?>" hidden value="<?php echo $id ?> ">
                                            <input for="estadodelid<?php echo $id ?>" hidden id="estadodelid<?php echo $id ?>" value="<?php echo intval($tarea->estado); ?>">





                                            <input <?php if ($tarea->estado == 1) {
                                                        echo 'disabled';
                                                    } ?> type="checkbox" id="input<?php echo $tarea->id ?>" <?php echo $estado; ?> name="input<?php echo $tarea->id ?>  " onclick="updateTarea($('#id<?php echo $id ?>').val(), $('#estadodelid<?php echo $id ?>').val()); return false; ">

                                            <label for="input<?php echo $tarea->id ?>" class="<?php echo $done; ?>"> <span><?php echo $tarea->nombre; ?></span></label><br>



                                            <div class=""> <span class="label label-light-info">Fecha limite: <?php echo date('d-m-Y', strtotime($tarea->fecha)); ?></span> <?php echo $vencimiento; ?></div>
                                            <div>

                                                <hr>

                                            </div>
                                </li>



                            <?php endforeach; ?>
                        <?php endif; ?>



                        <a type="button" onclick='return confirmarToDo();' class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"> <span class="label label-danger"> <strong>ELIMINAR TODO </strong> </h2> <i class="ti-close" aria-hidden="true"></i></span></a>


                            </ul>
                            <!-- Resultado: <span id="resultado"></span> -->
                            <!-- div de prueba del retorno del json -->
                </div>
            </div>

        </div>
    </div> <!-- FIN "TO DO LIST" -->

    <!-- inicio clima-->

    <?php include("application/controllers/api/Clima.php"); ?>
    <!-- llamada al backend de api del clima-->


    <div class="col-lg-5 col-md-5">
        <div class="card">
            <img class="" src="<?php echo base_url(); ?>/assets/images/background/weatherbg.jpg" alt="Card image cap">
            <div class="card-img-overlay" style="height:110px;">
                <h3 class="card-title text-white m-b-0 dl"><?php echo $data->name; ?></h3>
                <!-- <small class="card-text text-white font-light">Sunday 15 march</small>-->
            </div>
            <div class="card-body weather-small">
                <div class="row">
                    <div class="col-8 b-r align-self-center">
                        <div class="d-flex">
                            <div class="display-6 text-info"><img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" /></div>
                            <div class="m-l-15">
                                <h2 class="font-light text-info m-b-0"><?php echo $data->main->temp_max; ?>&deg;C</h2>
                                <div> <?php echo ucwords($data->weather[0]->description); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <h2 class="font-light m-b-0"><?php echo $data->main->temp_min; ?>&deg;C</h2>
                        <!--   <small>Tonight</small>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin clima-->
</div>











<script>

</script>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!--  El filtro de la tabla anda solamente con esta version de Jquery , anda a saber por que.-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
    //Filtro empresa o grupo para el dashboard de tiempos de actividades
    $(document).ready(function() {
        $('#dash').DataTable({
            initComplete: function() {
                this.api().columns([0, 1]).every(function() {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });
    });
</script>
<!-- -------------------------------------------------------------------------------------- -->
<!-- ============================================================== -->