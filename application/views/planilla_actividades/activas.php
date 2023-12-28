
<div class="row">
    <div class="col-12">
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Gestion De Actividades </h4>

                <h6 class="card-subtitle">Se presentan los grupos que se encuentran actualmente en el complejo</h6>
                <div class="tablesaw-bar mode-columntoggle" style="position: relative; z-index: 200;">
                    <div class="tablesaw-columntoggle-btnwrap tablesaw-advance">
                        <div class="dialog-table-coltoggle tablesaw-columntoggle-popup" id="table-5050-popup">

                            <div class="btn-group"><label><input type="checkbox" checked="">Karting</label><label><input type="checkbox" checked="">Cuadriciclo</label><label><input type="checkbox" checked="">
                                    Supervivencia
                                </label><label><input type="checkbox" checked="">Cachirulos</label><label><input type="checkbox" checked="">Areneros</label><label><input type="checkbox" checked="">Pileta</label><label><input type="checkbox" checked="">Futbol</label><label><input type="checkbox" checked="">Volley</label></div>
                        </div>
                    </div>
                </div>
                <table class="tablesaw table-striped table-hover table-bordered table tablesaw-columntoggle" data-tablesaw-mode="columntoggle" id="table-5050">
                    <thead>
                        <tr>
                            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist" class="tablesaw-priority-1">GRUPO</th>
                            <?php if (!empty($actividades)) :  ?>
                                <?php foreach ($actividades as $actividad) : ?>
                                 
                                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="<?php echo $actividad->id; ?>" class="tablesaw-priority-<?php echo $actividad->id; ?>"><?php echo $actividad->nombre ?></th>


                                <?php endforeach; ?>
                            <?php endif; ?>

                        </tr>

                    <tbody>
                        <tr>
                            </thead>
                            <?php if (!empty($actividades_activar)) :  ?>
                         

                                <?php foreach ($actividades_activar as $activa) : ?>
                                    <!-- aca hacemos un for each para los cordi con su gtrupos -->

                                    <td class="title">
                                        <a>
                                            <span style="color:black"> <b><?php echo $activa->coordinador ?></b>
                                                <i style="color: rgb(0, 192, 10);" class="fa fa-male"></i>
                                            </span>
                                            <span> <i> <?php echo $activa->empresa ?></i>
                                                <i style="color: rgb(14, 78, 252);" class="fa fa-flag"></i>
                                            </span>

                                            <span class="float-right"> <?php echo date('H:i',strtotime($activa->hora)); ?>

                                   
                                                <i style="color: rgb(252, 81, 14);" class="fa fa-clock-o"> </i>
                                            </span>
                                        </a>
                                    </td>

                                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="1" class="tablesaw-priority-1">
                                        <form name="Karting" action="<?php echo base_url() ?>planilla_actividades/main/cambiarEstadoActividadKarting" method="post">
                                            <button name="Karting" <?php if($permisosA->actualizar==0):?> disabled <?php endif;?>class="label btn btn-sm  waves-effect" type="submit"  style="background-color: <?php if ($activa->id_estado_karting == 1) : echo "black";
                                                                                                                                                    elseif ($activa->id_estado_karting == 2) : echo "#b22222";
                                                                                                                                                    elseif ($activa->id_estado_karting == 3) : echo "#f5c71a";
                                                                                                                                                    else : echo "#228b22";
                                                                                                                                                    endif; ?>;">
                                                <?php if ($activa->id_estado_karting == 1) : echo "NO";
                                                elseif ($activa->id_estado_karting == 2) : echo "Falta";
                                                elseif ($activa->id_estado_karting == 3) : echo "Actual";
                                                else : echo "Hecha";
                                                endif; ?>

                                               
                                             

                                                
                                                <input type="hidden" name="id" value="<?php echo $activa->id_estado_karting ?>"> 
                                                <input type="hidden" name="id_grupo" value="<?php echo $activa->id_grupo;?>" >
                                                <input type="hidden" name="idActividad" value="<?php echo $activa->id ?>"> 
                                                
                                               
                                                <!-- para que vea en cual de las act. updatear-->
                                        </form>
                                        
                                    </th>

                                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2">
                                        <form name="Cuadri" action="<?php echo base_url() ?>planilla_actividades/main/cambiarEstadoActividadCuadri" method="post">
                                            <button name="Cuadri"<?php if($permisosA->actualizar==0):?> disabled <?php endif;?> class="label btn btn-sm  waves-effect" type="submit" style="background-color: <?php if ($activa->id_estado_cuadri == 1) : echo "black";
                                                                                                                                                    elseif ($activa->id_estado_cuadri == 2) : echo "#b22222";
                                                                                                                                                    elseif ($activa->id_estado_cuadri == 3) : echo "#f5c71a";
                                                                                                                                                    else : echo "#228b22";
                                                                                                                                                    endif; ?>;">
                                                <?php if ($activa->id_estado_cuadri == 1) : echo "NO";
                                                elseif ($activa->id_estado_cuadri == 2) : echo "Falta";
                                                elseif ($activa->id_estado_cuadri == 3) : echo "Actual";
                                                else : echo "Hecha";
                                                endif; ?>


                                                <input type="hidden" name="id" value="<?php echo $activa->id_estado_cuadri ?>"> <!-- en que estado esta la actividad, recordando que los datos vienen pivotea2-->
                                                <input type="hidden" name="id_grupo" value="<?php echo $activa->id_grupo;?>" >
                                                <input type="hidden" name="idActividad" value="<?php echo $activa->id ?>"> <!-- para que vea en cual de las act. updatear-->
                                             
                                        </form>
                                        
                                    </th>

                                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="3" class="tablesaw-priority-3">
                                        <form name="Super" action="<?php echo base_url() ?>planilla_actividades/main/cambiarEstadoActividadSuper" method="post">
                                            <button name="Super" <?php if($permisosA->actualizar==0):?> disabled <?php endif;?>class="label btn btn-sm  waves-effect" type="submit" style="background-color: <?php if ($activa->id_estado_super == 1) : echo "black";
                                                                                                                                                    elseif ($activa->id_estado_super == 2) : echo "#b22222";
                                                                                                                                                    elseif ($activa->id_estado_super == 3) : echo "#f5c71a";
                                                                                                                                                    else : echo "#228b22";
                                                                                                                                                    endif; ?>;">
                                                <?php if ($activa->id_estado_super == 1) : echo "NO";
                                                elseif ($activa->id_estado_super == 2) : echo "Falta";
                                                elseif ($activa->id_estado_super == 3) : echo "Actual";
                                                else : echo "Hecha";
                                                endif; ?>


                                                <input type="hidden" name="id" value="<?php echo $activa->id_estado_super ?>"> <!-- en que estado esta la actividad, recordando que los datos vienen pivotea2-->
                                                <input type="hidden" name="id_grupo" value="<?php echo $activa->id_grupo;?>" >
                                                <input type="hidden" name="idActividad" value="<?php echo $activa->id ?>"> <!-- para que vea en cual de las act. updatear-->
                                        </form>
                                        
                                    </th>

                                    
                                   
                                    
                                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="4" class="tablesaw-priority-4">
                                        <form name="Cachi" action="<?php echo base_url() ?>planilla_actividades/main/cambiarEstadoActividadCachi" method="post">
                                            <button name="Cachi" <?php if($permisosA->actualizar==0):?> disabled <?php endif;?>class="label btn btn-sm  waves-effect" type="submit" style="background-color: <?php if ($activa->id_estado_cachi == 1) : echo "black";
                                                                                                                                                    elseif ($activa->id_estado_cachi == 2) : echo "#b22222";
                                                                                                                                                    elseif ($activa->id_estado_cachi == 3) : echo "#f5c71a";
                                                                                                                                                    else : echo "#228b22";
                                                                                                                                                    endif; ?>;">
                                                <?php if ($activa->id_estado_cachi == 1) : echo "NO";
                                                elseif ($activa->id_estado_cachi == 2) : echo "Falta";
                                                elseif ($activa->id_estado_cachi == 3) : echo "Actual";
                                                else : echo "Hecha";
                                                endif; ?>


                                                <input type="hidden" name="id" value="<?php echo $activa->id_estado_cachi ?>"> <!-- en que estado esta la actividad, recordando que los datos vienen pivotea2-->
                                                <input type="hidden" name="id_grupo" value="<?php echo $activa->id_grupo;?>" >
                                                <input type="hidden" name="idActividad" value="<?php echo $activa->id ?>"> <!-- para que vea en cual de las act. updatear-->
                                        </form>
                                        
                                    </th>
                                 
                                                                     
                                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="5" class="tablesaw-priority-5">
                                        <form name="Buggy" action="<?php echo base_url() ?>planilla_actividades/main/cambiarEstadoActividadBuggy" method="post">
                                            <button name="Buggy"<?php if($permisosA->actualizar==0):?> disabled <?php endif;?> class="label btn btn-sm  waves-effect" type="submit" style="background-color: <?php if ($activa->id_estado_buggy == 1) : echo "black";
                                                                                                                                                    elseif ($activa->id_estado_buggy == 2) : echo "#b22222";
                                                                                                                                                    elseif ($activa->id_estado_buggy == 3) : echo "#f5c71a";
                                                                                                                                                    else : echo "#228b22";
                                                                                                                                                    endif; ?>;">
                                                <?php if ($activa->id_estado_buggy == 1) : echo "NO";
                                                elseif ($activa->id_estado_buggy == 2) : echo "Falta";
                                                elseif ($activa->id_estado_buggy == 3) : echo "Actual";
                                                else : echo "Hecha";
                                                endif; ?>


                                                <input type="hidden" name="id" value="<?php echo $activa->id_estado_buggy ?>"> <!-- en que estado esta la actividad, recordando que los datos vienen pivotea2-->
                                                <input type="hidden" name="id_grupo" value="<?php echo $activa->id_grupo;?>" >
                                                <input type="hidden" name="idActividad" value="<?php echo $activa->id ?>"> <!-- para que vea en cual de las act. updatear-->
                                        </form>
                                        
                                    </th>
                             
                                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="6" class="tablesaw-priority-6">
                                        <form name="Pile" action="<?php echo base_url() ?>planilla_actividades/main/cambiarEstadoActividadPile" method="post">
                                            <button name="Pile"<?php if($permisosA->actualizar==0):?> disabled <?php endif;?> class="label btn btn-sm  waves-effect" type="submit" style="background-color: <?php if ($activa->id_estado_pile == 1) : echo "black";
                                                                                                                                                    elseif ($activa->id_estado_pile == 2) : echo "#b22222";
                                                                                                                                                    elseif ($activa->id_estado_pile == 3) : echo "#f5c71a";
                                                                                                                                                    else : echo "#228b22";
                                                                                                                                                    endif; ?>;">
                                                <?php if ($activa->id_estado_pile == 1) : echo "NO";
                                                elseif ($activa->id_estado_pile == 2) : echo "Falta";
                                                elseif ($activa->id_estado_pile == 3) : echo "Actual";
                                                else : echo "Hecha";
                                                endif; ?>


                                                <input type="hidden" name="id" value="<?php echo $activa->id_estado_pile ?>"> <!-- en que estado esta la actividad, recordando que los datos vienen pivotea2-->
                                                <input type="hidden" name="id_grupo" value="<?php echo $activa->id_grupo;?>" >
                                                <input type="hidden" name="idActividad" value="<?php echo $activa->id ?>"> <!-- para que vea en cual de las act. updatear-->
                                        </form>
                                        
                                    </th>
                               
                                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="7" class="tablesaw-priority-7">
                                        <form name="Futbol" action="<?php echo base_url() ?>planilla_actividades/main/cambiarEstadoActividadFutbol" method="post">
                                            <button name="Futbol"<?php if($permisosA->actualizar==0):?> disabled <?php endif;?> class="label btn btn-sm  waves-effect" type="submit" style="background-color: <?php if ($activa->id_estado_futbol == 1) : echo "black";
                                                                                                                                                    elseif ($activa->id_estado_futbol == 2) : echo "#b22222";
                                                                                                                                                    elseif ($activa->id_estado_futbol == 3) : echo "#f5c71a";
                                                                                                                                                    else : echo "#228b22";
                                                                                                                                                    endif; ?>;">
                                                <?php if ($activa->id_estado_futbol == 1) : echo "NO";
                                                elseif ($activa->id_estado_futbol == 2) : echo "Falta";
                                                elseif ($activa->id_estado_futbol == 3) : echo "Actual";
                                                else : echo "Hecha";
                                                endif; ?>


                                                <input type="hidden" name="id" value="<?php echo $activa->id_estado_futbol ?>"> <!-- en que estado esta la actividad, recordando que los datos vienen pivotea2-->
                                                <input type="hidden" name="id_grupo" value="<?php echo $activa->id_grupo;?>" >
                                                <input type="hidden" name="idActividad" value="<?php echo $activa->id ?>"> <!-- para que vea en cual de las act. updatear-->
                                        </form>
                                        
                                    </th>
                                   
                                    <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="8" class="tablesaw-priority-8">
                                        <form name="Volley" action="<?php echo base_url() ?>planilla_actividades/main/cambiarEstadoActividadVolley" method="post">
                                            <button name="Volley"<?php if($permisosA->actualizar==0):?> disabled <?php endif;?> class="label btn btn-sm  waves-effect" type="submit" style="background-color: <?php if ($activa->id_estado_volley == 1) : echo "black";
                                                                                                                                                    elseif ($activa->id_estado_volley == 2) : echo "#b22222";
                                                                                                                                                    elseif ($activa->id_estado_volley == 3) : echo "#f5c71a";
                                                                                                                                                    else : echo "#228b22";
                                                                                                                                                    endif; ?>;">
                                                <?php if ($activa->id_estado_volley == 1) : echo "NO";
                                                elseif ($activa->id_estado_volley == 2) : echo "Falta";
                                                elseif ($activa->id_estado_volley == 3) : echo "Actual";
                                                else : echo "Hecha";
                                                endif; ?>


                                                <input type="hidden" name="id" value="<?php echo $activa->id_estado_volley ?>"> <!-- en que estado esta la actividad, recordando que los datos vienen pivotea2-->
                                                <input type="hidden" name="id_grupo" value="<?php echo $activa->id_grupo;?>" >
                                                <input type="hidden" name="idActividad" value="<?php echo $activa->id ?>"> <!-- para que vea en cual de las act. updatear-->
                                        </form>
                                        
                                    </th>

                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>