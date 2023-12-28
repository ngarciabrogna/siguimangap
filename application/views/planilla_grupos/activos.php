<div class="row el-element-overlay">
    <div class="col-md-12">

        <span class="float-left"> <?php if($permisosA->insertar==1):?> <a type="button" class="btn waves-effect waves-light btn-outline-success" href="<?php echo base_url() ?>planilla_grupos/main/cargar"><i class="fa fa-plus"></i></a> <?php endif;?> </span>
        <span class="float-right"> <a href="<?php echo base_url(); ?>grupos/main" class="btn btn-block btn-outline-success" type="button"><strong> Todos los grupos</strong> </a> </span>
    </div>
    <div class="col-md-12">
        <h4 class="card-title">Grupos Activos</h4>

        <?php if (empty($grupos)) : ?>
            <div class="alert alert-danger"> <i class="ti-user"></i> En este momento no hay grupos activos en el complejo!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div> <?php else : ?>
            <h6 class="card-subtitle m-b-20 text-muted">Los siguientes grupos se encuentran actualmente en el complejo </h6>

        <?php endif; ?>
    </div>
</div>

<div class="row">
    <?php if (!empty($grupos)) :  ?>
        <?php foreach ($grupos as $grupo) : ?>
            <?php

            $dieta = $grupo->dieta_especial;
            if (empty($dieta)) {
                $dieta = '<b style= color:green;>' . ' sin dietas especiales' . '</b>';
            } else {
                $dieta = $grupo->dieta_especial;
            }

            $descripcion =  $grupo->descripcion;
            if (empty($descripcion)) {
                $descripcion = '<i style= color:grey;>' . 'sin datos extras' . '</i>';
            } else {
                $descripcion =  $grupo->descripcion;
            }



            ?>
            <div class="col-lg-6 col-xlg-4 col-md-5">
                <!-- Column -->
                <div class="card">
                    <img class="card-img-top" height="120px" src="<?php echo base_url(); ?>assets/images/empresas/<?php echo $grupo->fondo ?>" alt="<?php echo $grupo->empresa; ?>" style="max-height: 150px;">
                    <div class="card-body little-profile text-center">
                        <div class="pro-img"><img src="<?php echo base_url(); ?>assets/images/users/<?php echo $grupo->foto ?>" alt="<?php echo $grupo->coordinador; ?>"></div>
                        <h3 class="m-b-0"><?php echo $grupo->coordinador; ?> </h3>
                        <p><?php echo $grupo->empresa; ?></p>
                        <p><?php echo "'" . $descripcion . "'" ?></p>
                        <p><abbr title="Dietas especiales">Dietas: </abbr> <?php echo $dieta ?></p>
                        <a href="<?php echo base_url(); ?>/planilla_actividades/main" class="m-t-10 waves-effect waves-dark btn btn-success btn-md btn-rounded" style="border-radius:0;">Asignar Actividad</a>
                        <?php if($permisosA->borrar==1):?><button id="<?php echo $grupo->id; ?>" class="m-t-10 waves-effect waves-dark btn btn-dark btn-sm btn-rounded comentario" style="border-radius:0;">Liberar Grupo</button> <?php endif;?>

                        <div class="row text-center m-t-20">
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light"><?php echo $grupo->cantidad_egresados; ?>&nbsp;&nbsp;<i class="mdi mdi-face"></i></h3><small>Egresados </small>
                            </div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light"><?php echo $grupo->cantidad_acompanantes; ?>&nbsp;&nbsp;<i class="mdi mdi-human-male-female"></i></h3><small>Acompañantes</small>
                            </div>
                            <div class="col-lg-4 col-md-4 m-t-20">
                                <h3 class="m-b-0 font-light"><?php echo $grupo->cantidad_coordinadores; ?>&nbsp;&nbsp;<i class="mdi mdi-emoticon-cool"></i></h3><small>Coordinadores</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->

            </div>

        <?php endforeach; ?>
    <?php endif; ?>




</div> <!--  R O W -->
<?php include("application/views/planilla_grupos/comentario.php"); ?>