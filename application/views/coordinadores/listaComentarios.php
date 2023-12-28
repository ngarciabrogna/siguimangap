<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <span class="float-left">
          <h4 class="card-title">Gestion de comentarios</h4>
        </span> <span class="float-right"> <button type="button" class="btn waves-effect waves-light btn-outline-success comentarioCarga" id="<?php echo $coordinador->id;?>"><i class="fa fa-plus"></i></button> </span>
        <div class="table-responsive">
        <div class="table-responsive m-t-40">
        <table id="example23" class="table m-t-30 table-hover no-wrap contact-list" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Nº</th>
                <th>Comentario</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
              <th>Nº</th>
                <th>Comentario</th>
                <th>Fecha</th>
              </tr>
            </tfoot>
            <tbody>

              <?php if (!empty($comentarios)) : ?>
                <?php foreach ($comentarios as $comentario) : ?>
                  <tr>
                  <td><?php echo $comentario->id; ?></td>
                    <td>  <textarea id="form10" name="comentario" class="md-textarea form-control" rows="5" disabled><?php echo $comentario->descripcion; ?></textarea></td>
                    <td><?php echo $comentario->fecha; ?></td>

                   
                    <td>
                      <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline editComentario" id="<?php echo $comentario->id;?>"><i class="ti-slice" aria-hidden="true"></i></button>
                      <a type="button" onclick='return confirmarComentario(<?php echo $comentario->id; ?>);'  class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
                     

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
<?php include("application/views/coordinadores/cargarComentario.php"); ?>
<?php include("application/views/coordinadores/editarComentario.php"); ?>