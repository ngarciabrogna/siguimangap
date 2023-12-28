
 <div id="edit-empresa" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Editar Empresa | SiquimanGAP</h4>
                 <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
             </div>
             <div class="modal-body">
             <form class="form-horizontal form-material" action="<?php echo base_url() ?>empresas/main/actualizar" method="post" novalidate>
                    <input id="idEmpresa" name="idEmpresa" type="hidden" class="form-control">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <div class="controls">
                                <input type="text" class="form-control" id="nombreEdit" name="nombreEdit" type="text" placeholder="Nombre" autofocus autocomplete="off" required data-validation-regex-regex="^[a-zA-Z ]*$" data-validation-required-message="¡El nombre de empresa es obligatorio!">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <div class="controls">
                                <input id="cuitEdit" name="cuitEdit" type="text" placeholder="CUIT" class="form-control" autocomplete="off" minlength="8">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <div class="controls">
                                <input id="telefonoEdit" name="telefonoEdit" type="text" placeholder="Telefono" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <div class="controls">
                                <input id="razonEdit" name="razonEdit" type="text" placeholder="Razon social" class="form-control" autocomplete="off">
                            </div>
                        </div>
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
 <!-- fin modal editador-->