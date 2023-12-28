<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Tabla de empresas</h4>
        </span> <span class="float-right">  </span>
        <div class="table-responsive">
        <div class="table-responsive m-t-40">
        <form action="<?php echo base_url() ?>reportes/main/tabla4" method="post">
        <input type="date" name="fecha1">
        <input type="date" name="fecha2">
        <button type="submit" name="save" value="" class="btn btn-success waves-effect">Filtrar</button>
        </form>
        <a href="<?php echo base_url() ?>reportes/main/tabla4" class="btn btn-warning waves-effect">Quitar filtro</a>

        <table id="example23" class="table m-t-30 table-hover no-wrap contact-list" cellspacing="0" width="100%">
            <thead>
              <tr>

                <th>Empresa</th>
                <th>Cantidad de grupos</th>
                <th>Cantidad de pasajeros</th>

              </tr>
            </thead>
            <tfoot>
              <tr>

                <th>Empresa</th>
                <th>Cantidad de grupos</th>
                <th>Cantidad de pasajeros</th>

              </tr>
            </tfoot>
            <tbody>

              <?php if (!empty($empresas)) : ?>
                <?php foreach ($empresas as $empresa) : ?>
                
                  <tr>
                    <td><?php echo $empresa->empresa; ?></td>
                    <td><?php echo $empresa->grupo; ?></td>
                    <td><?php echo $empresa->personas; ?></td>
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
