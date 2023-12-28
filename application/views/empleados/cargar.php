<?php
echo form_open_multipart('empleados/main/guardar', array('name' => 'guardar', 'class' => 'form-horizontal',  'novalidate' => 'novalidate'));
?>

<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cargar Nuevo Empleado | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" action="<?php echo base_url() ?>empleados/main/guardar" method="post" autocomplete="off" novalidate>

                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <div class="controls">
                                <input type="text" class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" autocomplete="off" data-validation-regex-regex="^[a-zA-Z ]*$" autofocus required data-validation-required-message="Coloque un nombre" maxlength="45" minlength="3">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 m-b-20">

                            <div class="controls">
                                <input id="dni" name="dni" type="number" placeholder="DNI" maxlength="8" class="form-control" autocomplete="off" required data-validation-required-message="¡Este campo es obligatorio!">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">

                            <div class="col-md-12 m-b-20">
                                <input id="telefono" name="telefono" type="number" placeholder="Telefono" class="form-control" autocomplete="off" required data-validation-required-message="¡Este campo es obligatorio!">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <div class="col-md-12 m-b-20">
                                <input id="direccion" name="direccion" type="text" placeholder="Direccion" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="controls">
                            <div class="col-md-12 m-b-20">
                                <input id="edad" name="edad" type="number" placeholder="edad" class="form-control" autocomplete="off" required maxlength="2" data-validation-required-message="¡Este campo es obligatorio!">
                            </div>

                        </div>
                    </div>

           
            <div class="col-md-12 m-b-20">
                <div class="fileupload btn btn-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-camera"></i></span>Subir imagen</button>
                    <input type="file" class="upload" name="userimage">
                </div>


            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success waves-effect">Guardar</button>

        </div>
        </form>
        <?php echo form_close(); ?>
    
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>