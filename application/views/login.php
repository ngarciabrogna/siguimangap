<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
  <title>SiquimanGAP | Complejo Siquiman Estudiantil </title>
  <!-- Bootstrap Core CSS -->
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- You can change the theme colors from here -->
  <link href="assets/css/colors/default-dark.css" id="theme" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css 
(( el iconito que spamea al cargar, animado. ))
-->
  
  <!-- ============================================================== -->
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
  </div>
  <!-- ============================================================== -->
  <!-- Contenedor principal - en pages.scss -->
  <!-- ============================================================== -->
  <section id="wrapper" class="login-register login-sidebar" style="background-image:url(assets/images/background/login-register.jpg);">
    <div class="login-box card">
      <div class="card-body">
        <form class="form-horizontal form-material" id="loginform" action="<?php echo base_url(); ?>login/login" method="post" autocomplete="off">
          <a href="javascript:void(0)" class="text-center db"><img src="assets/images/logo.png" width="272" height="172" alt="SiquimanGAP" /></a>




          <div class="form-group m-t-40">
            <div class="col-xs-12">
              <input type="text" id="username" class="form-control" placeholder="usuario" name="username" required autofocus> <!-- autofocus apunta ahi-->
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input type="password" id="password" class="form-control" placeholder="contraseña" name="password" required>
            </div>
          </div>
         <!-- <div class="form-group">
            <div class="col-md-12">
              <div class="checkbox checkbox-primary pull-left p-t-0">
                <input id="checkbox-signup" type="checkbox">
                <label for="checkbox-signup"> Recordarme </label>
              </div>
              
            </div>
          </div> -->
          <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
              <button class="btn btn-dark btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
            </div>
          </div>
         
          <?php if ($this->session->flashdata("error")) : ?>
        <div class="alert alert-danger">
          <p><?php echo $this->session->flashdata("error") ?></p>
        </div>
      <?php else: ?>
      <div class="alert alert-warning">
          <i>Esta es una version <b>DEMO</b>, deplegada con autorizacion de la gerencia de <b>COMPLEJO SIQUIMAN.</b>
Algunos modulos y/o funcionalidades pueden no estar presentes, funcionar correctamente o estar desactivadas por peticion del cliente.
</i>
        </div>
        <?php endif; ?>
      <p class="mt-5 mb-3 text-muted">&copy; @Siquimanestudiantil | 1987 - <?php $year = date("Y"); echo $year; ?> by Nicolas Garcia Brogna & Gonzalo Ianotti for devitystudio.</p>
       
        </form>  <!-- fin formulario -->

      </div>
    </div>
  </section>
  <!-- ============================================================== -->
  <!-- fin Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="assets/js/jquery.slimscroll.js"></script>
  <!--Wave Effects -->
  <script src="assets/js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="assets/js/sidebarmenu.js"></script>
  <!--stickey kit -->
  <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
  <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
  <!--Custom JavaScript -->
  <script src="assets/js/custom.min.js"></script>
  <!-- ============================================================== -->
  <!-- Style switcher -->
  <!-- ============================================================== -->
  <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>



</html>