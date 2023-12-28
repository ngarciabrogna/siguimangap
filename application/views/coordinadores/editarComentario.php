

<!-- modal editador-->

<div id="edit-comentario" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Editar Comentario | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">  
            <form class="form-horizontal form-material" action="<?php echo base_url() ?>coordinadores/main/actualizarComentario" method="post" novalidate>
                    <input id="idcomentario" name="idcomentario" type="hidden" class="form-control">
                    <div class="form-group">
                  
                            <div class="col-md-12 m-b-20">
                            <div class="controls">
                                <textarea id="comentarioEdit" name="comentarioEdit"  class="md-textarea form-control" rows="5" required data-validation-required-message="¡No se puede introducir un comentario vacio!" minlength="5" maxlength="400"></textarea>
                                </div>
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
   
    </div>  <!-- fin modal editador-->