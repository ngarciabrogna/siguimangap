<body>
    

<div class="row">
    <div class="col-md-12">
    <span class="float-right"> <a href="<?php echo base_url(); ?>reportes/main/tabla2" class="btn btn-block btn-outline-success" type="button"><strong> reporte en tabla</strong> </a> </span>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Grafico reservas canceladas</h3>

                <div class="box-tools pull-right">
<select name="yearCanceladas" id="yearCanceladas" class="from-control">
 <?php foreach( $yearsCancel as $yc):?>
<option value="<?php echo $yc->year;?>"><?php echo $yc->year;?></option>

 <?php endforeach;?>

</select>

                </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                    <div id="graficoCanceladas" width="175" height="60"></div>
                  
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- ./box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

</body>