
<!-- ============================================================== -->
<!-- Contenido - Cuerpo - Empleados  (listado) -->
<!-- ============================================================== -->
<div class="row">
  <div class="col-12">

    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Gestion de empresas</h4>
        </span> <span class="float-right"> <?php if($permisosA->insertar==1):?> <button type="button" class="btn waves-effect waves-light btn-outline-success" data-toggle="modal" data-target="#add-empresa"><i class="fa fa-plus"></i></button><?php endif;?> </span>

        <div class="table-responsive m-t-40">
          <table id="example23" class="table display table-bordered table-striped">
            <thead>
              <tr>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Cuit</th>
                <th>Telefono</th>
                <th>Razon social</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Cuit</th>
                <th>Telefono</th>
                <th>Razon social</th>
                <th>Opciones</th>
              </tr>
            </tfoot>
            <tbody>

              <?php if (!empty($empresas)) : ?>
                <?php foreach ($empresas as $empresa) : ?>
                  <tr>
                    <td><?php echo $empresa->id; ?> </td> 
                    <td>&nbsp; <span class="fa fa-circle text-<?php if ($empresa->activo == 1){echo 'success'; }else { echo 'danger';}; ?> m-r-10"></span><?php echo $empresa->nombre; ?></td>
                    <td><?php echo $empresa->cuit; ?></td>
                    <td><?php echo $empresa->telefono; ?></td>
                    <td><?php echo $empresa->razon_social; ?></td>
                    <td>
                    <?php if($permisosA->actualizar==1):?>
                      <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline editEmpresa" id="<?php echo $empresa->id ?>"><i class="ti-slice" aria-hidden="true"></i></button>
                      <?php endif;?>
                      <?php if($permisosA->borrar==1):?>
                      <a type="button" onclick='return confirmarEmpresa(<?php echo $empresa->id;?>);'  class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
                      <?php endif;?>
                      <?php if($permisosA->borrar==1):?>
                      <a type="button" <?php if ($empresa->activo == 0) echo 'hidden' ?> onclick='return confirmarEmpresaLiberar(<?php echo $empresa->id;?>);'  class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-archive" aria-hidden="true"></i></a>
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
<?php include("application/views/empresas/cargar.php"); ?>
<?php include("application/views/empresas/editar.php"); ?>

<!--fin includes-->




<!-- ============================================================== -->
<!-- Fin contenido -->
<!-- ============================================================== -->
<!-- ============================================================== -->