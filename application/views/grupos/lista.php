<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Gestion de grupos</h4>
        </span> 
        <span class="float-right"> <?php if($permisosA->insertar==1):?> <a type="button" class="btn waves-effect waves-light btn-outline-success" href="<?php echo base_url() ?>planilla_grupos/main/cargar"><i class="fa fa-plus"></i></a><?php endif;?> </span>

        <div class="table-responsive">
          <div class="table-responsive m-t-40">
            <table id="example23" class="table m-t-30 table-hover no-wrap contact-list" cellspacing="0" width="100%">
            <thead>  
            <tr>
                <th>Nº</th>
                <th>Coordinador</th>
                <th>Empresa</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>descripcion</th>
                <th>opciones</th>
              </tr>
            </thead>
              <tfoot>
              
                <tr>
                <th>Nº</th>
                <th>Coordinador</th>
                <th>Empresa</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>descripcion</th>
                <th>opciones</th>
                </tr>
              </tfoot>
              <tbody>
                        
                <?php if (!empty($grupos)) : ?>
                  <?php foreach ($grupos as $grupo) : ?>
                    <tr>
                      <td><?php echo $grupo->id; ?></td>
                      <td><?php echo $grupo->coordinador; ?></td>
                      <td><?php echo $grupo->empresa; ?></td>
                      <td><?php echo $grupo->fecha; ?></td>
                      <td><?php echo $grupo->total_personas; ?></td>
                      <td><?php echo $grupo->descripcion; ?></td>
                     
                      <td>

                      <?php if($permisosA->borrar==1):?>
                        <a type="button" onclick='return confirmarGrupo(<?php echo $grupo->id;?>);' class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
<?php endif;?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
