<style>
    .asd2 {
        height: 50px !important;
    }
</style>
<?php

$ci = &get_instance();
$ci->load->model("Empleado_model");

$idemp = $this->session->userdata("id_empleado");
$data2 = $ci->Empleado_model->getEmpleado($idemp);





?>
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" style="overflow: visible;">
    <!-- Sidebar scroll-->
    <div class="slimScrollDiv" style="position: relative; overflow: visible; width: auto; height: 100%;">
        <div class="scroll-sidebar" style="overflow: visible hidden; width: auto; height: 100%;">
            <!-- User profile -->
            <!-- User profile -->
 

 
            <?php foreach ($data2 as $empleado) : ?>
            
                <div class="user-profile" style="background: url(<?php echo base_url() ?>assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img "> <img class="asd2" src="<?php echo base_url() ?>assets/images/empleados/<?php echo $empleado->imagen; ?>" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text">

                        <a href="" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><span class="hidden-xs"><?php echo $this->session->userdata("username") ?></span></a>

                        <div class="dropdown-menu animated flipInY">
                            <a  href="<?php echo base_url() ?>usuarios_perfil" class="dropdown-item"><i class="ti-user"></i> Perfil</a>

                            <div class="dropdown-divider"></div> <a href="<?php echo base_url() ?>login/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Salir</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- End User profile text-->
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li> <a class=" waves-effect waves-dark" href="<?php echo base_url() ?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a> </li>
                    <li class="nav-devider"></li> <!-- Divisor-->
                    <li>

                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-nut"></i><span class="hide-menu"> Gestion</span></a>

                        <ul aria-expanded="false" class="collapse">
                            <li>
                                <a class="" href="<?php echo base_url() ?>empleados" aria-expanded="false"> <i class="mdi mdi-worker"></i> Empleados</a>
                            </li>
                            <li>
                                <a class="" href="<?php echo base_url() ?>usuarios" aria-expanded="false"> <i class="mdi mdi-account-key"></i> Usuarios</a>
                            </li>
                            <li>
                                <a class="" href="<?php echo base_url() ?>permisos" aria-expanded="false"> <i class="mdi mdi-book"></i> Permisos</a>
                            </li>
                            <li>
                                <a class="" href="<?php echo base_url() ?>empresas" aria-expanded="false"> <i class="mdi mdi-bus"></i> Empresas</a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-devider"></li> <!-- Divisor-->
                    <li>
                        <a class=" waves-effect waves-dark" href="<?php echo base_url() ?>reservas" aria-expanded="false"><i class="mdi mdi-calendar-multiple"></i><span class="hide-menu"> Reservas</span></a>
                    </li>
                    <li class="nav-devider"></li>
                    <li>

                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-note-multiple-outline"></i><span class="hide-menu"> Reportes</span></a>
                        <ul aria-expanded="false" class="collapse">

                            <li><a href="#" class="has-arrow">Reservas Concretadas</a>
                                <ul aria-expanded="false" class="collapse">

                                    <li><a href="<?php echo base_url(); ?>reportes/main/empresasConcretas">Por empresa</a></li>

                                    <li><a href="<?php echo base_url(); ?>reportes/main">Mensuales</a></li>
                                    <li><a href="<?php echo base_url(); ?>reportes/main/indexAnio">Anuales</a></li>

                                </ul>
                            </li>

                            <li><a href="#" class="has-arrow">Reservas Cancel.</a>
                                <ul aria-expanded="false" class="collapse">

                                    <li><a href="<?php echo base_url(); ?>reportes/main/empresasCanceladas">Por empresa</a></li>

                                    <li><a href="<?php echo base_url(); ?>reportes/main/canceladas">Mensuales</a></li>
                                    <li><a href="<?php echo base_url(); ?>reportes/main/canceladasAnio">Anuales</a></li>

                                </ul>
                            </li>
                            <li><a href="#" class="has-arrow">Pasajeros</a>
                                <ul aria-expanded="false" class="collapse">

                                    <li><a href="<?php echo base_url(); ?>reportes/main/empresas">Por empresa</a></li>
                                    <li><a href="<?php echo base_url(); ?>reportes/main/pasajeros">Mensuales</a></li>
                                    <li><a href="<?php echo base_url(); ?>reportes/main/pasajerosAnio">Anuales</a></li>

                                </ul>
                            </li>

                            <li><a href="#" class="has-arrow">Cant. grupos</a>
                                <ul aria-expanded="false" class="collapse">

                                    <li><a href="<?php echo base_url(); ?>reportes/main/coordinadoresGrupos">Por coordinador</a></li>

                                    <li><a href="<?php echo base_url(); ?>reportes/main/empresasGrupos">Por Empresa</a></li>

                                </ul>

                            </li>
                            <li><a href="<?php echo base_url(); ?>reportes/main/paquete">Paquetes</a>

                            </li>




                            <!--  <li>
                            <a class="has-arrow" href="#" aria-expanded="false">ASD</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">ASD HIJO</a></li>

                            </ul>
                        </li> -->
                            <!-- nieto -->

                        </ul>
                    </li>
                    <li class="nav-devider"></li> <!-- Divisor-->
                    <li><a> <span class="hide-menu"> PLANILLA </span></a> </li>
                    <li class="nav-devider"></li> <!-- Divisor-->
                    <li>
                        <a class="waves-effect waves-dark" href="<?php echo base_url() ?>empresas/main/activas" aria-expanded="false"><i class="mdi mdi mdi-bus"></i><span class="hide-menu"> EMPRESAS</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="<?php echo base_url() ?>planilla_coordinadores" aria-expanded="false"><i class="mdi mdi-human-handsup"></i><span class="hide-menu"> COORDINADORES</span></a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="<?php echo base_url() ?>planilla_grupos" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"> GRUPOS</span></a>
                    </li>

                    <li>
                        <a class="waves-effect waves-dark" href="<?php echo base_url() ?>planilla_actividades" aria-expanded="false"><i class="mdi mdi-car"></i><span class="hide-menu"> ACTIVIDADES</span></a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
        <!-- Bottom points-->
        <div class="sidebar-footer">



            <!-- item-->
            <a href="https://mail.google.com" class="link" data-toggle="tooltip" target="_blank" title="Ir a gmail"><i class="mdi mdi-gmail"></i></a>
            <!-- item-->
            <a href="" class="link" data-toggle="tooltip"></i></a>
            <!-- item-->
            <a href="<?php echo base_url() ?>login/logout" class="link" data-toggle="tooltip" title="Salir"><i class="mdi mdi-power"></i></a>
        </div>
        <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->