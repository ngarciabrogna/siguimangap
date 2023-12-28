<div class="row el-element-overlay">
    <div class="col-md-12">

        <span class="float-left"> <?php if($permisosA->insertar==1):?><button type="button" class="btn waves-effect waves-light btn-outline-success" data-toggle="modal" data-target="#add-coordinador2"><i class="fa fa-plus"></i></button> <?php endif;?></span>
        <span class="float-right"> <a href="<?php echo base_url(); ?>coordinadores/main" class="btn btn-block btn-outline-success" type="button"><strong> Todos los coordinadores</strong> </a> </span>
    </div>
    <div class="col-md-12">
        <h4 class="card-title">Coordinadores Activos</h4>

        <?php if (empty($coordinadores)) : ?>
            <div class="alert alert-danger"> <i class="ti-user"></i> En este momento no hay coordinadores en el complejo!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div> <?php else : ?>
            <h6 class="card-subtitle m-b-20 text-muted">Los siguientes coordinadores se encuentran actualmente en el complejo </h6>

        <?php endif; ?>
    </div>


    <?php if (!empty($coordinadores)) :  ?>
        <?php foreach ($coordinadores as $coordinador) : ?>

            <div class="col-lg-3 col-md-6" style="margin-top: 2%;">
            <div class="card"  style="padding:15%;height: 100%;">
                    <div class="el-card-item" >
                        <div class="el-card-avatar el-overlay-1" > <a href="#"><img src="<?php echo base_url() ?>assets/images/users/<?php echo $coordinador->imagen ?>" class="img-bordered" style="" alt="<?php echo $coordinador->nombre; ?>" /></a>
                            <div class="el-overlay">
                                <ul class="el-info">
                                    <li><?php if($permisosA->actualizar==1):?> <a class="btn default btn-outline editcoordinador" id="<?php echo $coordinador->id; ?>"><i class="icon icon-pencil "></i></a> <?php endif;?></li>
                                   
                                </ul>
                                
                            </div>
                        </div>
                        <div class="el-card-content" >
                            <h3 class="box-title"> <?php echo $coordinador->nombre; ?></h3> <small><?php echo $coordinador->empresa; ?></small>
                            <br>
                        </div>
                    </div>

                </div>

            </div>

            
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php include("application/views/planilla_coordinadores/cargar.php"); ?>
<?php include("application/views/coordinadores/editar.php"); ?>