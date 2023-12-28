<?php
echo form_open_multipart('employee/addemployee', array('name' => 'addemployee', 'class' => 'form-horizontal'));
?>
<div class="form-group">
    <label class="control-label col-sm-4" for="pwd">Profile:</label>

    <div class="col-sm-8">
        <input type="file" class="" id="profile" name="userimage">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-primary pull-right" name="save" value="Save Employee" />
    </div>
</div>
<?php
echo form_close();
?>


<?php
echo form_open_multipart('employee/addemployee', array('name' => 'addemployee', 'class' => 'form-horizontal'));
?>



<div id="add-coordinador" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cargar Nuevo Coordinador | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" action="<?php echo base_url() ?>coordinadores/main/guardar" method="post">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <label for="empresa"></label>
                            <select name="empresa" id="empresa" class="form-control">
                                <option value="">Selecionar empresa...</option>
                                <?php foreach ($empresas as $empresa) : ?> {
                                    <option value="<?php echo $empresa->id ?>"><?php echo $empresa->nombre; ?></option>
                                    } <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control" autofocus></div>
                        <div class="col-md-12 m-b-20">
                            <input id="dni" name="dni" type="text" placeholder="DNI" class="form-control">
                        </div>

                        <div class="col-sm-8">
        <input type="file" class="" id="profile" name="userimage">
    </div>

                    <!--    <div class="col-md-12 m-b-20">
                            <div class="fileupload btn btn-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-camera"></i></span>Elegir imagen</button>
                                <input type="file" class="upload"> </div>
                            <button type="button" class="btn btn-success float-right" data-toggle="button" aria-pressed="false">
                                <i class="ti-settings text" aria-hidden="true"></i>
                                <span class="text">Subir</span>
                                <i class="ti-check text-active" aria-hidden="true"></i>
                                <span class="text-active">Hecho</span>
                            </button>
                        </div> -->
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="save" value="save employee" class="btn btn-success waves-effect">Guardar</button>

                    </div>
                </form>
                <!-- carga imagen-->


            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>