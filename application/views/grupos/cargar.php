<div class="row" id="milanesa">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Carga de grupo</h4>
                <?php if (empty($empresas)) : ?>
                    <div class="alert alert-danger"> <i class="mdi mdi-bus"></i> ¡No hay ninguna empresa en el complejo! ¡No puedes cargar grupo!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div> <?php else : ?>
                    <h6 class="card-subtitle m-b-20 text-muted">Los siguientes grupos se encuentran actualmente en el complejo </h6>
                    <form class="floating-labels m-t-40 row" action="<?php echo base_url() ?>grupos/main/guardar" method="post" id="jsearch" name="jsearch" novalidate>



                        <div class="form-group m-b-40 col-md-6 m-t-20">
                            <div class="controls">
                                <label for="empresa">Empresa</label>
                                <select style="height: 60px;" name="empresa" id="empresa" class="form-control" autocomplete="off" required data-validation-required-message="¡Este campo es obligatorio!">
                                    <option value=""></option>
                                    <?php foreach ($empresas as $empresa) : ?> {
                                        <option value="<?php echo $empresa->id ?>"><?php echo $empresa->nombre; ?></option>
                                        } <?php endforeach; ?>
                                </select>
                            </div>
                            <span class="bar"></span>
                            <?php if ($this->session->flashdata("errorEmpresa")) : ?>

                                <div class="alert alert-danger"> <i class="ti-user"></i>
                                    <?php echo $this->session->flashdata("errorEmpresa") ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                </div>


                            <?php endif; ?>
                        </div>

                        <div class="form-group m-b-40 col-md-6 m-t-20">
                            <div class="controls">
                                <label for="coordinador">Coordinador</label>
                                <select style="height: 60px;" name="coordinador" id="coordinador" class="form-control" required data-validation-required-message="¡Este campo es obligatorio!">

                                </select>
                            </div>
                            <span class="bar"></span>
                            <?php if ($this->session->flashdata("errorCoordinador")) : ?>

                                <div class="alert alert-danger"> <i class="ti-user"></i>
                                    <?php echo $this->session->flashdata("errorCoordinador") ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                </div>


                            <?php endif; ?>
                        </div>

                        <div class="form-group m-b-40 col-md-4 m-t-20">
                            <input id="fecha" name="fecha" type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                            <label for="fecha"></label>
                            <span class="help-block"><small>La fecha del ingreso del grupo se establece automaticamente.</small></span>
                        </div>

                        <div class="form-group m-b-40 col-md-4 m-t-20">
                            <input id="hora_salida" name="hora_salida" type="time" class="form-control">
                            <span class="bar"></span>
                            <label for="hora_salida"></label>
                            <span class="help-block"><small>Hora de salida del grupo.</small></span>
                        </div>


                        <div class="form-group m-b-40 col-md-3 m-t-20">
                            <input id="dieta" name="dieta" type="text" autocomplete="off" class="form-control" minlength="6">
                            <span class="bar"></span>
                            <label for="dieta">Dietas especiales</label>
                            <span class="help-block"><small>Rellar si hay dietas especiales.</small></span>
                        </div>


                        <div class="form-group m-b-40 col-md-3 m-t-20">
                            <div class="controls">
                                <input id="cantidad_egresados" name="cantidad_egresados" type="number" class="form-control" min="1" required data-validation-required-message="¡Sin egresados no hay grupo!">
                                <span class="bar"></span>
                                <label for="cantidad_egresados">Egresados</label>
                                <span class="help-block"><small>Cantidad de egresados</small></span>
                            </div>
                        </div>

                        <div class="form-group m-b-40 col-md-3 m-t-20">
                            <input id="cantidad_acompanantes" name="cantidad_acompanantes" type="number" class="form-control" min="0">
                            <span class="bar"></span>
                            <label for="cantidad_acompanantes">Acompañantes</label>
                            <span class="help-block"><small>Cantidad de acompañantes</small></span>
                        </div>

                        <div class="form-group m-b-40 col-md-3 m-t-20">
                            <input id="cantidad_choferes" name="cantidad_choferes" type="number" class="form-control" min="0">
                            <span class="bar"></span>
                            <label for="cantidad_choferes">Choferes</label>
                            <span class="help-block"><small>Cantidad de choferes</small></span>
                        </div>

                        <div class="form-group m-b-40 col-md-3 m-t-20">
                            <div class="controls">
                                <input id="cantidad_coordinadores" name="cantidad_coordinadores" type="number" class="form-control" min="1" required data-validation-required-message="¡No existe grupo sin cordinador!">
                                <span class="bar"></span>
                                <label for="cantidad_coordinadores">Coordinadores</label>
                                <span class="help-block"><small>Cantidad de coordinadores</small></span>
                            </div>
                        </div>

                        <div class="form-group m-b-40 col-md-12 m-t-20">
                            <textarea class="form-control" rows="4" name="descripcion" id="descripcion"></textarea>
                            <span class="bar"></span>
                            <label for="descripcion">Otros datos</label>
                            <span class="help-block"><small>De ser necesario, ingrese otros datos relevantes a tener en cuenta </small></span>
                        </div>


                        <button class="btn btn-outline-success waves-effect waves-light" type="submit"><span class="btn-label"><i class="fa fa-check"></i></span>Cargar</button>
                    </form>
                <?php endif; ?>


            </div>
        </div>


    </div>
</div>


<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script language="javascript">
    //selects 
    $(document).ready(function() {

        $("#empresa").change(function() {
            $("#empresa option:selected").each(function() {
                id_empresa = $('#empresa').val();

                $.post("<?php echo base_url() ?>grupos/main/getCordinadoresDependiente", {
                    id_empresa: id_empresa

                }, function(data) {
                    $("#coordinador").html(data);

                });
            });
        });

    });


    // LLEVAR A INCLUDE CUANDO SE LIMPIE EL FOOTER
</script>