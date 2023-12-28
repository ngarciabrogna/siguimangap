
<div class="row">
  <div class="col-12">

    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Gestion de permisos</h4>
        </span> <span class="float-right"><?php if($permisosA->insertar==1):?> <button type="button" style="margin:5px;" class="btn waves-effect waves-light btn-outline-success" data-toggle="modal" data-target="#add-permiso">Añadir permiso</button> <?php endif;?> </span>
     
        </span> <span class="float-right"> <?php if($permisosA->insertar==1):?> <button type="button" style="margin:5px;" class="btn waves-effect waves-light btn-outline-success" data-toggle="modal" data-target="#add-rol">Añadir rol</button> <?php endif;?></span>

        <div class="table-responsive m-t-40">
          <table id="example23" class="table display table-bordered table-striped">
            <thead>
              <tr>
              <th>Nº</th>
                <th>Menu</th>
                <th>Rol</th>
                <th>Leer</th>
                <th>Insertar</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
              <th>Nº</th>
                <th>Menu</th>
                <th>Rol</th>
                <th>Leer</th>
                <th>Insertar</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
                <th>Opciones</th>
              </tr>
            </tfoot>
            <tbody>

            <?php if (!empty($permisos)) : ?>
                <?php foreach ($permisos as $permiso) : ?>
                
                  <tr>

                    <td><?php echo $permiso->id; ?></td>
                    <td><?php echo $permiso->menu; ?></td>
                    <td><?php echo $permiso->rol; ?></td>
                    <td>
                    <?php if($permiso->leer==0):?>
                    <span class="ti-na"></span>
                    <?php else:?>
                        <span class="ti-check"></span>
                     <?php endif;?>
             
                     </td>
                     <td>
                    <?php if($permiso->insertar==0):?>
                    <span class="ti-na"></span>
                    <?php else:?>
                        <span class="ti-check"></span>
                     <?php endif;?>
             
                     </td>
                     <td>
                    <?php if($permiso->actualizar==0):?>
                    <span class="ti-na"></span>
                    <?php else:?>
                        <span class="ti-check"></span>
                     <?php endif;?>
             
                     </td>
                     <td>
                    <?php if($permiso->borrar==0):?>
                    <span class="ti-na"></span>
                    <?php else:?>
                        <span class="ti-check"></span>
                     <?php endif;?>
             
                     </td>
                                                                                                                                
                     <td>      
                             <?php if($permisosA->actualizar==1):?>
                      <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline editarPermisos" id="<?php echo $permiso->id ?>"><i class="ti-slice"   aria-hidden="true"></i></button>
                      <?php endif;?>
                      <?php if($permisosA->borrar==1):?>
                      <a  onclick='return confirmarPermiso(<?php echo $permiso->id;?>);'  class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
                      <?php endif;?>
                    </td>                                                               
                  <?php endforeach; ?>
                <?php endif; ?>
                  </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div> <!-- CIERRE  -->

<!--includes / modales / A-M / -->
<?php include("application/views/permisos/cargar.php"); ?>
<?php include("application/views/permisos/editar.php"); ?>
<?php include("application/views/permisos/cargarRol.php"); ?>

<!--fin includes-->




<!-- ============================================================== -->
<!-- Fin contenido -->
<!-- ============================================================== -->
<!-- ============================================================== -->