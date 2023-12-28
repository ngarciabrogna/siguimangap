


<div id="edit-usuario" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Editar Usuario | SiquimanGAP</h4>
                 <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
             </div>
             <div class="modal-body">
             <form class="form-horizontal form-material" action="<?php echo base_url() ?>usuarios/main/actualizar" method="post">
                    <input id="idUsuario" name="idUsuario" type="hidden" class="form-control">
                    <div class="col-md-12 m-b-20">
                            <div class="controls">
                                <label for="empleado"></label>
                                <div class="controls">
                                    <select name="editempleado" id="editempleado" class="form-control"  required data-validation-required-message="¡Elija un empleado!">
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
                                    <select name="rolEdit" id="rolEdit" class="form-control" required data-validation-required-message="¡Rol obligatorio!">
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
                                    <input id="usernameEdit" name="usernameEdit" type="text" placeholder="Nombre de usuario" autocomplete="off" value="" class="form-control" required data-validation-required-message="Nombre de usuario requerido" maxlength="25" minlength="4">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <div class="form-group">
                                <div class="controls">
                                    <input id="passwordEdit" name="passwordEdit" type="password" placeholder="Contraseña" autocomplete="off" value="" class="form-control" required data-validation-required-message="Campo obligatorio" minlength="5">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="password" id="password2" value="" name="password2" data-validation-match-match="passwordEdit" placeholder="Repetir contraseña" class="form-control" required data-validation-required-message="Campo obligatorio"  minlength="5">
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