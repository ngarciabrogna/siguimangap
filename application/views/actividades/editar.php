 <!-- modal editador-->

 <div id="edit-actividad" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myModalLabel">Editar Actividad | SiquimanGAP</h4>
                 <button type="button" class="close " data-dismiss="modal" aria-hidden="true">×</button>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal form-material" action="<?php echo base_url() ?>actividades/main/actualizar" method="post">
                     <input id="idActividad" name="idActividad" type="hidden" class="form-control">
                     <div class="form-group">
                         <div class="col-md-12 m-b-20">
                             <input type="text" class="form-control" id="nombreEdit" name="nombreEdit" type="text" placeholder="Nombre" autofocus autocomplete="off"> </div>
                         <div class="col-md-12 m-b-20">
                         <input type="text" class="form-control" id="descripcionEdit" name="descripcionEdit" type="text" placeholder="Nombre" autofocus autocomplete="off"> </div>
                      
                        

                     

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">Cancelar</button>
                 <button type="submit" class="btn btn-success waves-effect">Guardar</button>
             </div>
             </form>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <!-- fin modal editador-->