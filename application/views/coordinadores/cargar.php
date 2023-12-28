<?php
echo form_open_multipart('coordinadores/main/guardar', array('name' => 'guardar', 'class' => 'form-horizontal' , 'novalidate' => 'novalidate'));
?>



<div id="add-coordinador" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cargar Nuevo Coordinador | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal form-material" action="<?php echo base_url() ?>planilla_coordinadores/main/guardar" method="post" novalidate>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <div class="controls">
                                <label for="empresa"></label>
                                <select name="empresa" id="empresa" class="form-control" autocomplete="off" required data-validation-required-message="¡Este campo es obligatorio!">
                                    <option value="">Selecionar empresa...</option>
                                    <?php foreach ($empresas as $empresa) : ?> {
                                        <option value="<?php echo $empresa->id ?>"><?php echo $empresa->nombre; ?></option>
                                        } <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                    </div>
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
                            <input id="dni" name="dni" type="number" placeholder="DNI" maxlength="8" class="form-control" autocomplete="off" >                   
                                 </div>
                        </div>
                    </div>

                    <div class="col-md-12 m-b-20">
                        <div class="fileupload btn btn-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-camera"></i></span>Elegir imagen
                            <input type="file" class="upload" name="userimage">
                        </div>
                    </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="save" value="save employee" class="btn btn-success waves-effect">Guardar</button>

            </div>
            </form <?php
                    echo form_close();
                    ?>>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div> <!-- fin modal editador-->
</div>