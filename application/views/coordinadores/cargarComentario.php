<div id="comentarioCarga" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Comentar desempeño | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal form-material" action="<?php echo base_url() ?>coordinadores/main/guardarComent" method="post" novalidate>
                    <div class="form-group">

                        <div class="col-md-12 m-b-20">
                            <input type="hidden" name="coordinadorCarga" id="coordinadorCarga" value="">
                        </div>
                        <div class="md-form">
                        <div class="controls">
                            <label for="">Comentario para el coordinador</label>

                            <textarea id="form10" name="comentarioCarga" class="md-textarea form-control" rows="5" required data-validation-required-message="¡No se puede introducir un comentario vacio!"  maxlength="400"> </textarea>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="" value="" class="btn btn-success waves-effect">Finalizar</button>

                        </div>
                    </div>
                </form>

             
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div> <!-- fin modal editador-->
</div>