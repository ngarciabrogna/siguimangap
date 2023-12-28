<!-- ============================================================== -->
<!-- Contenido - Cuerpo - Empleados  (lista y alta) -->
<!-- ============================================================== -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Gestion de usuarios</h4>
        </span> <span class="float-right"> <?php if($permisosA->insertar==1):?><button type="button" class="btn waves-effect waves-light btn-outline-success" data-toggle="modal" data-target="#add-empleados"><i class="fa fa-plus"></i></button> <?php endif;?></span>

        <div class="table-responsive m-t-40">
          <table id="myTable" class="table m-t-30 table-hover no-wrap contact-list">
            <thead>
              <tr>
                <th>Nº</th>
                <th>Empleado</th>
                <th>Rol</th>
                <th>Usuario</th>
                <th>opciones</th>
              </tr>
            </thead>
            <tbody>

              <?php if (!empty($usuarios)) : ?>
                <?php foreach ($usuarios as $usuario) : ?>
                
                  <tr>

                    <td><?php echo $usuario->id; ?></td>
                    <td><?php echo $usuario->empleado; ?></td>
                    <td><?php echo $usuario->rol; ?></td>
                    <td><?php echo $usuario->username; ?></td>                                                                                                                 
                    <td>   


                   <?php if($permisosA->actualizar==1):?> 
                      <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline editarUsuarios" id="<?php echo $usuario->id ?>"><i class="ti-slice"   aria-hidden="true"></i></button>
                    <?php endif;?>
                      <?php if($permisosA->borrar==1):?> 
                      <a  onclick='return confirmarUsuario(<?php echo $usuario->id;?>);'  class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
                      <?php endif;?>
                    </td>
                  <?php endforeach; ?>
                <?php endif; ?>
                  </tr>
            </tbody>
            <tfoot>
            
                                                   
                                           
    
   </tfoot>
          </table>
          <?php include("application/views/usuarios/cargar.php"); ?>  
        </div>
      </div>

    </div>
  </div>
</div> <!-- CIERRE  -->


<!--includesss de modales-->

<?php include("application/views/usuarios/editar.php"); ?>






<!--fin includes-->




<!-- ============================================================== -->
<!-- Fin contenido -->
<!-- ============================================================== -->
<!-- ============================================================== -->