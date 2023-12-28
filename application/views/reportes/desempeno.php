<body>
    

<div class="row">
<div class="col-md-12">

<span class="float-right"> <a href="<?php echo base_url(); ?>reportes/main/tabla1" class="btn btn-block btn-outline-success" type="button"><strong> reporte en tabla</strong> </a> </span>
</div>
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Grafico reservas completadas</h3>

                <div class="box-tools pull-right">
<select name="year1" id="year1" class="from-control">
 <?php foreach( $years as $year):?>
<option value="<?php echo $year->year;?>"><?php echo $year->year;?></option>

 <?php endforeach;?>

</select>

                </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                    <div   id="grafico" ></div>
                  
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