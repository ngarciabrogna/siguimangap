<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Tabla pasajeros</h4>
        </span> <span class="float-right">  </span>
        <div class="table-responsive">
        <div class="table-responsive m-t-40">
        <form action="<?php echo base_url() ?>reportes/main/tabla3" method="post">
        <input type="date" name="fecha1">
        <input type="date" name="fecha2">
        <button type="submit" name="save" value="" class="btn btn-success waves-effect">Filtrar</button>
        </form>
        <a href="<?php echo base_url() ?>reportes/main/tabla3" class="btn btn-warning waves-effect">Quitar filtro</a>

        <table id="example23" class="table m-t-30 table-hover no-wrap contact-list" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nº</th>
                <th>Empresa</th>
                <th>Coordinador</th>
                <th>Cantidad de pasajeros</th>
                <th>hora de salida</th>
                <th>fecha</th>

              </tr>
            </thead>
            <tfoot>
              <tr>
              <th>Nº</th>
                <th>Empresa</th>
                <th>Coordinador</th>
                <th>Cantidad de pasajeros</th>
                <th>hora de salida</th>
                <th>fecha</th>

              </tr>
            </tfoot>
            <tbody>

              <?php if (!empty($pasajeros)) : ?>
                <?php foreach ($pasajeros as $pasajero) : ?>
                
                  <tr>
                    <td><?php echo $pasajero->id; ?></td>
                    <td><?php echo $pasajero->empresa; ?></td>
                    <td><?php echo $pasajero->coordinador; ?></td>
                    <td><?php echo $pasajero->total_personas; ?></td>
                    <td><?php echo $pasajero->hora_salida; ?></td>
                    <td><?php echo $pasajero->fecha; ?></td>
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
