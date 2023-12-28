<!-- ============================================================== -->
<!-- Contenido - Cuerpo - Empleados  (listado) -->
<!-- ============================================================== -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Gestion de empleados</h4>
        </span> <span class="float-right"> <?php if($permisosA->insertar==1):?><button type="button" class="btn waves-effect waves-light btn-outline-success" data-toggle="modal" data-target="#add-contact"><i class="fa fa-plus"></i></button> <?php endif;?></span>

        <div class="table-responsive m-t-40">
        <table id="example23" class="table m-t-30 table-hover no-wrap contact-list" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Dni</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Edad</th>
                
                <th>Opciones</th>
              </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Dni</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Edad</th>
                
                <th>opciones</th>
              </tr>
            </tfoot>
            <tbody>
            
              <?php if (!empty($empleados)) : ?>
                <?php foreach ($empleados as $empleado) : ?>
                  <tr>
                    <td><?php echo $empleado->id; ?></td>
                    <td>
                    <a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo base_url() ?>assets/images/empleados/<?php echo $empleado->imagen ?>"><img src="<?php echo base_url() ?>assets/images/empleados/<?php echo $empleado->imagen ?>"  alt="empleados" class="img-circle" height="35" width="35" /><?php echo  $empleado->nombre; ?></a>
                    </td>
                    <td><?php echo $empleado->dni; ?></td>
                    <td><?php echo $empleado->telefono; ?></td>
                    <td><?php echo $empleado->direccion; ?></td>
                    <td><?php echo $empleado->edad; ?></td>
                    <td>
                    <?php if($permisosA->actualizar==1):?>
                      <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline editarrowbtn" id="<?php echo $empleado->id ?>"><i class="ti-slice" aria-hidden="true"></i></button>
                      <?php endif;?>
                      <?php if($permisosA->borrar==1):?>
                      <a type="button" onclick='confirmar(<?php echo $empleado->id; ?>);'  class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
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
<?php include("application/views/empleados/editar.php"); ?>
<?php include("application/views/empleados/cargar.php"); ?>


<!--fin includes-->




<!-- ============================================================== -->
<!-- Fin contenido -->
<!-- ============================================================== -->
<!-- ============================================================== -->