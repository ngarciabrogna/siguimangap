<div class="card">
    <form action="<?php echo base_url() ?>empresas/main/activar" method="POST">
        <div class="card-body">
            <h4 class="card-title">Empresas Activas</h4>

            <h6 class="card-title"> <small>Marque o desmarque para activar o desactivar </small> </h6>
            <div class="row demo-swtich">
                <?php if (!empty($empresas)) : ?>
                    <?php foreach ($empresas as $empresa) : ?>
                        <?php for ($i = 0; $i < count($empresas); $i++) ?>

                        <div class="col-sm-3">
                            <div class="demo-switch-title"><?php echo $empresa->nombre ?></div>
                            <div class="switch">

                                <label>
                                    <input type="checkbox" name="check_list[<?php $i ?>]" id="check_list[<?php $i ?>]" <?php if ($empresa->activo == 1) : ?> checked="" disabled <?php endif;   ?> value="<?php echo $empresa->id ?>"><span class="lever switch-col-light-green"></span>
                                </label>

                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>

        <div class="card-footer">

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8 float-left">
                        <div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button><i class="ti-bus"></i> ¡Cuidado! No cargues una empresa que no esta o deberas desactivar todas para borrarla

                            
                        </div>
                    </div>
                    <div class="col-md-4 float-right">
                        <div class="btn-group float-left">
                            <button type="submit" class="btn waves-effect waves-light btn-success" name="submit" value="Enviar"><i class="fa fa-check"> Activar</i> </button>

                        </div>

                        <div class="btn-group float-right">

                            <button type="button" onclick='return confirmarActiva();' class="btn waves-effect waves-light btn-danger"><i class="fa fa-trash"> Desmarcar todas</i> </button>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </form>
</div>