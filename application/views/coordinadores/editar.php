

<!-- modal editador-->

<div id="edit-coordinador" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Editar Coordinador | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">  
            <form class="form-horizontal form-material" action="<?php echo base_url() ?>coordinadores/main/actualizar" method="post" novalidate>
                    <input id="idCoordinador" name="idCoordinador" type="hidden" class="form-control">
                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <div class="controls">
                                <label for="empresa"></label>
                                <select name="empresa" id="empresaEdit" class="form-control" autocomplete="off" required data-validation-required-message="¡Este campo es obligatorio!">
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
                                <input type="text" class="form-control" id="nombreEdit" name="nombreEdit" type="text" placeholder="Nombre" autocomplete="off" data-validation-regex-regex="^[a-zA-Z ]*$" autofocus required data-validation-required-message="Coloque un nombre" maxlength="45" minlength="3">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12 m-b-20">
                            <div class="controls">
                            <input id="dniEdit" name="dniEdit" type="number" placeholder="DNI" maxlength="8" class="form-control" autocomplete="off" >                   
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
   
    </div>  <!-- fin modal editador-->