<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Tabla paquetes</h4>
        </span> <span class="float-right">  </span>
        <div class="table-responsive">
        <div class="table-responsive m-t-40">
        <form action="<?php echo base_url() ?>reportes/main/tabla8" method="post">
        <input type="date" name="fecha1">
        <input type="date" name="fecha2">
        <button type="submit" name="save" value="" class="btn btn-success waves-effect">Filtrar</button>
        </form>
        <a href="<?php echo base_url() ?>reportes/main/tabla8" class="btn btn-warning waves-effect">Quitar filtro</a>

        <table id="example23" class="table m-t-30 table-hover no-wrap contact-list" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Paquete</th>
                <th>Descripcion</th>
                <th>Cantidad de reservas</th>
                <th>Cantidad de pasajeros</th>

              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Paquete</th>
                <th>Descripcion</th>
                <th>Cantidad de reservas</th>
                <th>Cantidad de pasajeros</th>

              </tr>
            </tfoot>
            <tbody>

              <?php if (!empty($paquetes)) : ?>
                <?php foreach ($paquetes as $paquete) : ?>
                
                  <tr>
                    <td><?php echo $paquete->paquete; ?></td>
                    <td><?php echo $paquete->desc; ?></td>
                    <td><?php echo $paquete->reserva; ?></td>
                    <td><?php echo $paquete->pasajeros; ?></td>

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
