<style>
    .asd {
        max-height: 250px !important;
    }
</style>

<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <?php foreach ($empleado as $empleado) : ?>
                <div class="card-body">




                    <center class="m-t-30">



                        <div class="row el-element-overlay">

                            <div class="card" style="height: 100%;padding:10%;">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="<?php echo base_url() ?>/assets/images/empleados/<?php echo $empleado->imagen ?>" class="img-circle asd" />

                                        <div class="el-overlay scrl-dwn">
                                            <ul class="el-info">

                                                <?php
                                                echo form_open_multipart('empleados/main/cambiarFoto', array('name' => 'guardar', 'class' => 'form-horizontal'));
                                                ?>
                                                <form class="form-horizontal form-material" autocomplete="off" action="<?php echo base_url(); ?>empleados/main/cambiarFoto" method="post">
                                                <?php if($permisosA->actualizar==1):?> 
                                                    <div class="fileupload btn btn-success waves-effect waves-light" style="margin-top:50%;" type="button"><span class="btn-label"><i class="fa fa-camera"></i></span>cambiar
                                                        <input type="file" class="upload" name="userimage" onchange="this.form.submit()">

                                                    </div>
                                                    <?php endif;?>  
                                                <?php if($permisosA->borrar==1):?>    <button type="submit" class="btn btn-danger waves-effect waves-light active" style="margin-top:50%;" onclick="this.form.submit()">
                                                        <span class="btn-label"><i class="fa fa-ban"></i></span>Quitar
                                                    </button>   <?php endif;?>  
                                                </form>
                                                <?php echo form_close(); ?>

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <h4 class="card-title m-t-10"><?php echo $empleado->nombre ?></h4>
                        <h6 class="card-subtitle"><?php echo $this->session->userdata("username") ?></h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-cake-variant"></i>
                                    <font class="font-medium"><?php echo $empleado->edad ?></font>
                                </a></div>
                            <div class="col-6"><a href="javascript:void(0)" class="link"><i class="mdi mdi-bulletin-board"></i>
                                    <font class="font-medium"><?php echo $empleado->dni ?></font>
                                </a></div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row text-center justify-content-md-center">
                        <div class="col-6"><a href="javascript:void(0)" class="link"> <small class="text-muted p-t-30 db">Telefono</small>
                                <h6><?php echo $empleado->telefono ?></h6>
                            </a></div>
                        <div class="col-6"><a href="javascript:void(0)" class="link"> <small class="text-muted p-t-30 db">Direccion</small>
                                <h6><?php echo $empleado->direccion ?></h6>
                            </a></div>
                    </div>



                </div>
        </div>
    </div>

    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">

                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Opciones</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">

                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="card-body">
                    <form class="form-horizontal form-material" action="<?php echo base_url() ?>usuarios_perfil/main/updatePerfil" method="post" novalidate>
                            <input type="text" hidden name="id" for="id" value="<?php echo $empleado->id ?>" <?php echo $empleado->id ?> class="form-control form-control-line">
                            <div class="form-group">
                                <label for="nombre" class="col-md-12">Nombre Completo</label>
                                <div class="col-md-12">
                                    <div class="controls">
                                        <input type="text" value="<?php echo $empleado->nombre ?>" class="form-control form-control-line" name="nombre" id="nombre" data-validation-regex-regex="^[a-zA-Z ]*$" required data-validation-required-message="¡El nombre es obligatorio!">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="col-md-12">Telefono</label>
                                <div class="col-md-12">
                                    <input type="number" value="<?php echo $empleado->telefono ?>" class="form-control form-control-line" name="telefono" id="telefono">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="direccion" class="col-md-12">Direccion</label>
                                <div class="col-md-12">
                                    <input type="direccion" value="<?php echo $empleado->direccion ?>" class="form-control form-control-line" name="direccion" id="direccion">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dni" class="col-md-12">DNI</label>
                                <div class="col-md-12">
                                    <input type="number" value="<?php echo $empleado->dni ?>" class="form-control form-control-line" name="dni" id="dni">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edad" class="col-md-12">Edad</label>
                                <div class="col-md-12">
                                    <input type="number" value="<?php echo $empleado->edad ?>" class="form-control form-control-line" name="edad" id="edad">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Actualizar Perfil</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>