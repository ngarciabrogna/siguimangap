
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        


        <div class="row page-titles" >
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0"><?php echo $this->uri->segment(1, 'Dashboard')?></h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url()?><?php echo $this->uri->segment(1)?>"><?php echo '<i>'. $this->uri->segment(1)?> </i></a></li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">


                    <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                        <div class="chart-text m-r-10">
                            <div class="chart-text m-r-10">

                                <h4 class="m-t-0 text-info float-right" id="cho" aria-expanded="false"></h4><i class="mdi mdi-bus"></i>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                        <div class="chart-text m-r-10">
                            <div class="chart-text m-r-10">

                                <h4 class="m-t-0 text-info float-right" id="coor" aria-expanded="false"> </h4><i class="mdi mdi-account-multiple"></i>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                        <div class="chart-text m-r-10">
                            <div class="chart-text m-r-10">

                                <h4 class="m-t-0 text-info float-right" id="eya" aria-expanded="false"></h4>
                                <i class="mdi mdi-face"></i>
                            </div>
                        </div>
                    </div>
                    <div class="date">
                        <span id="weekDay" class="weekDay"></span>,
                        <span id="day" class="day"></span> de
                        <span id="month" class="month"></span>,
                        <span id="year" class="year"></span> &nbsp;
                    </div>
                    <div class="clock">
                        <span id="hours" class="hours"></span>:<span id="minutes" class="minutes"></span><!--:  dos puntos -->

                        <span  id="seconds" class="seconds"></span> 
                    </div>


                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->

        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->