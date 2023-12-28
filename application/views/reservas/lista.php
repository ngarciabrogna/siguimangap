<!-- ============================================================== -->
<!-- Cuerpo de la pagina de esta seccion -->
<!-- ============================================================== -->
<div class="row">

  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div id="calendar1"></div>
      </div>
    </div>
  </div>
</div>
<!--MODAL -->
<div class="modal none-border" id="my-event">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><strong>Add Event</strong></h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
        <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- ADD categoria  -->
<div class="modal fade none-border" id="add-new-event">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><strong>Add</strong> a category</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="row">
            <div class="col-md-6">
              <label class="control-label">Category Name</label>
              <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
            </div>
            <div class="col-md-6">
              <label class="control-label">Choose Category Color</label>
              <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                <option value="success">Success</option>
                <option value="danger">Danger</option>
                <option value="info">Info</option>
                <option value="primary">Primary</option>
                <option value="warning">Warning</option>
                <option value="inverse">Inverse</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->
<!-- ============================================================== -->
<!-- Fin contenido -->
<!-- ============================================================== -->


<!-- QUE HAGO CON ESTO LO BORRO O LO DEJO GONZALO EL TREMENDO?????????????? Display Our Calendar -->

<!-- NOSE MONO ESPERA  -->




<div class="modal fade" id="modalEventos">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detalles reserva</h4>
      </div>
      <div class="modal-body" id="modeloReservas">
        <form action="<?php echo base_url() ?>reservas/main/update" method="post">

          <div class="col-md-12">
            <input id="idReserva" name="idReserva" type="hidden" class="form-control">
          </div>

          <div class="col-md-12">
            <select id="empresa" name="empresa" class="form-control">
              <?php foreach ($empresas as $empresa) : ?>
                <option value="<?php echo $empresa->nombre ?>"><?php echo $empresa->nombre ?></option>
              <?php endforeach; ?>
            </select>

          </div>


          <br>
          <div class="col-md-12">

            <select id="paquete" name="paquete" class="form-control">

              <?php foreach ($paquetes as $paquete) : ?>
                <option value="<?php echo $paquete->nombre ?>"><?php echo $paquete->nombre; ?></option>
              <?php endforeach; ?>
            </select>

          </div>


          <br>
          <div class="col-md-12">
            <input id="fecha" name="fecha" type="text" class="form-control" readonly>
          </div><br>
          <div class="col-md-12">
            <input id="pasajeros" name="pasajeros" type="text" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
      <div class="col-md-12">
      <?php if($permisosA->actualizar==1):?>  <button type="submit"  style="float: left;" class="btn btn-warning pull-right">actualizar</button> <?php endif;?> 
        </form>
       
          
       
        <button type="button" class="btn btn-primary pull-left"  style="float: left;" data-dismiss="modal">Cerrar</button>

        <input id="idR" name="idR" type="hidden" class="form-control">
          <?php if($permisosA->borrar==1):?> <button type="submit" onclick='return confirmarReserva();' class="btn btn-danger pull-right">Cancelar Reserva</button><?php endif;?>
            </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="agregarEvento">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Agregar reserva</h4>
      </div>
      <div class="modal-body" id="agregarReservas">
        <form action="<?php echo base_url() ?>reservas/main/guardar" method="post">
          <div class="col-md-12">

            <select name="empresa1" id="empresa1" class="form-control">
              <option value="">Selecionar empresa...</option>
              <?php foreach ($empresas as $empresa) : ?>
                <option value="<?php echo $empresa->id ?>"><?php echo $empresa->nombre; ?></option>
              <?php endforeach; ?>
            </select>
          </div>


          <br>
          <div class="col-md-12">
            <select name="paquete1" id="paquete1" class="form-control">
              <option value="">Selecionar paquete....</option>
              <?php foreach ($paquetes as $paquete) : ?>
                <option value="<?php echo $paquete->id ?>"><?php echo $paquete->nombre; ?></option>
              <?php endforeach; ?>
            </select> </div>


          <br>
          <div class="col-md-12">
            <input id="ffecha" name="ffecha" type="text" class="form-control" readonly>
          </div><br>
          <div class="col-md-12">
            <input id="pasajeross" name="pasajeross" type="text" placeholder="cantidad de pasajeros" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
      <?php if($permisosA->insertar==1):?>  <button type="submit" class="btn btn-success pull-left">Agregar</button> <?php endif;?>
        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cerrar</button>
        </form>                                                  
      </div>
    </div>
  </div>
</div>