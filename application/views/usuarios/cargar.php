<!-- <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div> -->


<div id="add-empleados" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cargar Nuevo Empleado | SiquimanGAP</h4>
                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal form-material" autocomplete="off" action="<?php echo base_url() ?>usuarios/main/guardar" method="post" novalidate>
                    
                    <div class="col-md-12 m-b-20">
                        <div class="controls">
                            <label for="empleado"></label>
                            <div class="controls">
                                <select name="empleado" id="empleado" class="form-control" required data-validation-required-message="¡Elija un empleado!">
                                    <option value="">Selecionar empleado...</option>
                                    <?php foreach ($empleados as $empleado) : ?> {
                                        <option value="<?php echo $empleado->id ?>"><?php echo $empleado->nombre; ?></option>
                                        } <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 m-b-20">

                        <div class="form-group">
                            <div class="controls">
                                <label for="rol"></label>
                                <select name="rol" id="rol" class="form-control" required data-validation-required-message="¡Rol obligatorio!">
                                    <option value="">Selecionar rol...</option>
                                    <?php foreach ($roles as $rol) : ?> {
                                        <option value="<?php echo $rol->id ?>"><?php echo $rol->nombre; ?></option>
                                        } <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 m-b-20">
                        <div class="form-group">
                            <div class="controls">
                                <input id="username" name="username" type="text" placeholder="Nombre de usuario" autocomplete="off" value="" class="form-control" required data-validation-required-message="Nombre de usuario requerido" maxlength="25" minlength="4">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 m-b-20">
                        <div class="form-group">
                            <div class="controls">
                                <input id="password" name="password" type="password" placeholder="Contraseña" autocomplete="off" value="" class="form-control" required data-validation-required-message="Campo obligatorio" maxlength="25" minlength="4">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 m-b-20">
                        <div class="form-group">
                            <div class="controls">
                                <input type="password" name="password2" data-validation-match-match="password" placeholder="Repetir contraseña" class="form-control" required data-validation-required-message="Campo obligatorio" maxlength="25" minlength="4">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success waves-effect">Guardar</button>
                </div>
        </div>
        </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>