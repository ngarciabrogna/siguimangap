<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Tabla reportes canceladas</h4>
        </span> <span class="float-right">  </span>
        <div class="table-responsive">
        <div class="table-responsive m-t-40">
        <form action="<?php echo base_url() ?>reportes/main/tabla2" method="post">
        <input type="date" name="fecha1">
        <input type="date" name="fecha2">
        <button type="submit" name="save" value="" class="btn btn-success waves-effect">Filtrar</button>
        </form>
        <a href="<?php echo base_url() ?>reportes/main/tabla2" class="btn btn-warning waves-effect">Quitar filtro</a>

        <table id="example23" class="table m-t-30 table-hover no-wrap contact-list" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nº</th>
                <th>Empresa</th>
                <th>Paquete</th>
                <th>Fecha original</th>
                <th>Cantidad de pasajeros</th>

              </tr>
            </thead>
            <tfoot>
              <tr>
              <th>Nº</th>
                <th>Empresa</th>
                <th>Paquete</th>
                <th>Fecha original</th>
                <th>Cantidad de pasajeros</th>

              </tr>
            </tfoot>
            <tbody>

              <?php if (!empty($reservasCanceladas)) : ?>
                <?php foreach ($reservasCanceladas as $reserva) : ?>
                
                  <tr>
                    <td><?php echo $reserva->id; ?></td>
                    <td><?php echo $reserva->empresa; ?></td>
                    <td><?php echo $reserva->paquete; ?></td>
                    <td><?php echo $reserva->fecha; ?></td>
                    <td><?php echo $reserva->cantidad; ?></td>
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
