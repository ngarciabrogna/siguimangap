<div id="add-rol" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Añadir rol | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" action="<?php echo base_url() ?>permisos/main/guardarRol" method="post" novalidate>
                    <div class="form-group">

                        <div class="col-md-12 m-b-20">
                            <div class="controls">
                                <input type="text" class="form-control" id="addrol" name="addrol" type="text" placeholder="Rol" autofocus required data-validation-required-message="¡Este dato es obligatorio!">
                            </div>
                        </div>
                        <div class="col-md-12 m-b-20">
                        <div class="controls">
                            <input type="text" class="form-control" id="adddescripcion" name="adddescripcion" type="text" placeholder="Descripcion" autocomplete="off" required data-validation-required-message="¡Este dato es obligatorio!">
                        </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success waves-effect">Guardar</button>

                    </div>
                </form>
                <?php
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>