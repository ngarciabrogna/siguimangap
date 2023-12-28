<div id="add-permiso" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cargar Nuevos permisos | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-material" action="<?php echo base_url() ?>permisos/main/guardar" method="post" novalidate>
                    <div class="form-group">


                        <div class="form-group">
                        <div class="controls">
                            <select name="rol" id="rol" class="form-control" required data-validation-required-message="¡Este dato es obligatorio!">
                                <option value="">Selecionar rol...</option>
                                <?php foreach ($roles as $rol) : ?> {
                                    <option value="<?php echo $rol->id ?>"><?php echo $rol->nombre; ?></option>
                                    } <?php endforeach; ?>
                            </select>
                        </div>
                        </div>


                        <div class="form-group">
                        <div class="controls">
                            <select name="menu" id="menu" class="form-control" required data-validation-required-message="¡Este dato es obligatorio!">
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
                                <input type="radio" id="leer" name="leer" value="1" checked="checked"> si
                                <label for="leer"></label>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="leer1" name="leer" value="0"> no
                                <label for="leer1"></label>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Insertar:</label>
                            &nbsp;
                            <label class="radio-inline">
                                <input type="radio" id="insertar" name="insertar" value="1" checked="checked"> si
                                <label for="insertar"></label>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="insertar1" name="insertar" value="0"> no
                                <label for="insertar1"></label>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Actualizar:</label>
                            &nbsp;
                            <label class="radio-inline">
                                <input type="radio" id="actualizar" name="actualizar" value="1" checked="checked"> si
                                <label for="actualizar"></label>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="actualizar1" name="actualizar" value="0"> no
                                <label for="actualizar1"></label>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Eliminar:</label>
                            &nbsp;
                            <label class="radio-inline">
                                <input type="radio" id="borrar" name="borrar" value="1" checked="checked"> si
                                <label for="borrar"></label>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="borrar1" name="borrar" value="0"> no
                                <label for="borrar1"></label>
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