<div id="comentario" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Liberar grupo | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" action="<?php echo base_url() ?>planilla_grupos/main/comentario" method="post">
                    <div class="form-group">


                        <div class="col-md-12 m-b-20">
                            <input type="hidden" id="grupo" name="grupo1" value="">
                        </div>
                        <div class="col-md-12 m-b-20">
                            <input type="hidden" name="coordinador1" id="coordinador" value="">
                        </div>
                        <div class="md-form">
                        <div class="controls">
                            <label for="">Comentario para el coordinador(opcional)</label>

                            <textarea id="form10" name="comentario" class="md-textarea form-control" rows="5" maxlength="400"></textarea>
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