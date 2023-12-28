<div id="add-actividad" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cargar Nueva Actividad | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" action="<?php echo base_url() ?>actividades/main/guardar" method="post">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" autofocus autocomplete="off"> </div>
                        <div class="col-md-12 m-b-20">
                            <input id="descripcion" name="descripcion" type="text" placeholder="descripcion" class="form-control" autocomplete="off"></div>

                  

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success waves-effect">Guardar</button>

            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>