<div id="edit-permiso" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Editar permisos | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" action="<?php echo base_url() ?>permisos/main/actualizar" method="post">
                    <div class="form-group">

                        <input type="hidden" name="idPermiso" id="idPermiso">
                        <div class="form-group">
                        <div class="controls">
                            <select name="editrol" id="editrol" class="form-control" required data-validation-required-message="¡Este dato es obligatorio!">
                                <option value="">Selecionar rol...</option>
                                <?php foreach ($roles as $rol) : ?> {
                                    <option value="<?php echo $rol->id ?>"><?php echo $rol->nombre; ?></option>
                                    } <?php endforeach; ?>
                            </select>
                        </div>
                        </div>


                        <div class="form-group">
                        <div class="controls">
                            <select name="editmenu" id="editmenu" class="form-control" required data-validation-required-message="¡Este dato es obligatorio!">
                                <option value="">Selecionar menu...</option>
                                <?php foreach ($menus as $menu) : ?> {
                                    <option value="<?php echo $menu->id ?>"><?php echo $menu->nombre; ?></option>
                                    } <?php endforeach; ?>
                            </select>
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Leer:</label>
                            &nbsp;
                            <label class="radio-inline">
                                <input type="radio" id="editleer" name="editleer" value="1"> si
                                <label for="editleer"></label>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="editleer1" name="editleer" value="0"> no
                                <label for="editleer1"></label>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Insertar:</label>
                            &nbsp;
                            <label class="radio-inline">
                                <input type="radio" id="editinsertar" name="editinsertar" value="1"> si
                                <label for="editinsertar"></label>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="editinsertar1" name="editinsertar" value="0"> no
                                <label for="editinsertar1"></label>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Actualizar:</label>
                            &nbsp;
                            <label class="radio-inline">
                                <input type="radio" id="editactualizar" name="editactualizar" value="1"> si
                                <label for="editactualizar"></label>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="editactualizar1" name="editactualizar" value="0"> no
                                <label for="editactualizar1"></label>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Eliminar:</label>
                            &nbsp;
                            <label class="radio-inline">
                                <input type="radio" id="editborrar" name="editborrar" value="1"> si
                                <label for="editborrar"></label>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="editborrar1" name="editborrar" value="0"> no
                                <label for="editborrar1"></label>
                            </label>
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