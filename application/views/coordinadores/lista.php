<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Gestion de coordinadores</h4>

        </span> <span class="float-right"> <?php if ($permisosA->insertar == 1) : ?> <button type="button" class="btn waves-effect waves-light btn-outline-success" data-toggle="modal" data-target="#add-coordinador"><i class="fa fa-plus"></i></button> <?php endif; ?> </span>

        <div class="table-responsive">
          <div class="table-responsive m-t-40">
            <table id="example23" class="table m-t-30 table-hover no-wrap contact-list" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Empresa</th>
                  <th>Nombre</th>
                  <th>DNI</th>
                  <th>Foto</th>
                  <th>opciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nº</th>
                  <th>Nombre</th>
                  <th>Empresa</th>
                  <th>DNI</th>
                  <th>Foto</th>
                  <th>opciones</th>
                </tr>
              </tfoot>
              <tbody>

                <?php if (!empty($coordinadores)) : ?>
                  <?php foreach ($coordinadores as $coordinador) : ?>
                    <tr>
                      <td><?php echo $coordinador->id; ?></td>

                      <td>&nbsp;<span class="fa fa-circle text-<?php if ($coordinador->activo == 1) {
                                                                                              echo 'success';
                                                                                            } else {
                                                                                              echo 'danger';
                                                                                            }; ?> m-r-10"></span> <?php echo $coordinador->nombre; ?> </td>
                      <td><?php echo $coordinador->empresa; ?></td>
                      <td><?php echo $coordinador->dni; ?></td>
                      <td>

                        <a class="btn default btn-outline image-popup-vertical-fit" href="<?php echo base_url() ?>assets/images/users/<?php echo $coordinador->imagen ?>"><img src="<?php echo base_url() ?>assets/images/users/<?php echo $coordinador->imagen ?>" alt="empleados" height="35" width="35" class="img-circle" />
                      </td>
                      <td>
                        <?php if ($permisosA->actualizar == 1) : ?>
                          <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline editcoordinador" id="<?php echo $coordinador->id; ?>"><i class="ti-slice" aria-hidden="true"></i></button>
                        <?php endif; ?>
                        <?php if ($permisosA->borrar == 1) : ?>
                          <a type="button" onclick='return confirmarCoordinador(<?php echo $coordinador->id; ?>);' class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
                        <?php endif; ?>
                        <?php if ($permisosA->actualizar == 1) : ?>
                          <a type="button" href="<?php echo base_url() ?>coordinadores/main/coments/<?php echo $coordinador->id; ?>" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"><i class="ti-comment-alt" aria-hidden="true"></i></a>
                        <?php endif; ?>
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
  </div>
</div>


<!-- ============================================================== -->
<!-- Contenido - Cuerpo - Empleados  (listado) -->
<!-- ============================================================== -->


<!--includes / modales / A-M / -->
<?php include("application/views/coordinadores/cargar.php"); ?>
<?php include("application/views/coordinadores/editar.php"); ?>
<!--fin includes-->




<!-- ============================================================== -->
<!-- Fin contenido -->
<!-- ============================================================== -->
<!-- ============================================================== -->