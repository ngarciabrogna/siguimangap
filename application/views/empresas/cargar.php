<?php
echo form_open_multipart('empresas/main/guardar', array('name' => 'guardar', 'class' => 'form-horizontal' , 'novalidate' => 'novalidate'));
?>


<div id="add-empresa" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cargar Nueva Empresa | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal form-material" action="<?php echo base_url() ?>empresas/main/guardar" method="post">

<div class="form-group">
    <div class="col-md-12 m-b-20">
        <div class="controls">
            <input type="text" class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" autofocus autocomplete="off" data-validation-regex-regex="^[a-zA-Z ]*$" required data-validation-required-message="¡El nombre de empresa es obligatorio!">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12 m-b-20">
        <div class="controls">
            <input id="cuit" name="cuit" type="number" placeholder="CUIT" class="form-control" autocomplete="off" minlength="8">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12 m-b-20">
        <div class="controls">
            <input id="telefono" name="telefono" type="number" placeholder="Telefono" class="form-control" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12 m-b-20">
        <div class="controls">
            <input id="razon_social" name="razon_social" type="text" placeholder="Razon social" class="form-control" autocomplete="off">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12 m-b-20">

        <div class="fileupload btn btn-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-camera"></i></span>Elegir imagen
            <input type="file" class="upload" name="userimage">
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">Cancelar</button>
<button type="submit" class="btn btn-success waves-effect">Guardar</button>

</div>
</form>
            <?php
            echo form_close();
            ?>>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>