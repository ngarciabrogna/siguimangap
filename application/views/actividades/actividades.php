<!-- ============================================================== -->
<!-- Contenido - Cuerpo - Empleados  (listado) -->
<!-- ============================================================== -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Gestion de empleados</h4>
        </span> <span class="float-right"> <button type="button" class="btn waves-effect waves-light btn-outline-success" data-toggle="modal" data-target="#add-actividad"><i class="fa fa-plus"></i></button> </span>

          <div class="table-responsive m-t-40">
        <table id="example23" class="table m-t-30 table-hover no-wrap contact-list" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Opciones</th>
              </tr>
            </tfoot>
            <tbody>

              <?php if (!empty($actividades)) : ?>
                <?php foreach ($actividades as $actividad) : ?>
                  <tr>

                    <td><?php echo $actividad->id; ?></td>
                    <td><?php echo $actividad->nombre; ?></td>
                    <td><?php echo $actividad->descripcion; ?></td>                        
                    <td>
                      <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline editActividad" id="<?php echo $actividad->id;?>"><i class="ti-slice" aria-hidden="true"></i></button>
                      <a type="button" onclick='return confirmar();' href="<?php echo base_url() ?>actividades/main/eliminar/<?php echo $actividad->id; ?>" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
                    </td>
                  <?php endforeach; ?>
                <?php endif; ?>
                  </tr>
            </tbody>
          </table>
          <?php include("application/views/actividades/cargar.php"); ?>
        </div>
      </div>

    </div>
  </div>
</div> <!-- CIERRE  -->

<!--includes / modales / A-M / -->


<?php include("application/views/actividades/editar.php"); ?>
<!--fin includes-->




<!-- ============================================================== -->
<!-- Fin contenido -->
<!-- ============================================================== -->
<!-- ============================================================== -->