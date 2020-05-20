<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo base_url();?>assets/template/dist/img/medicine.png">

    <title>CIAPO | CIUDAD SALUD</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/dist/css/select2.min.css">


    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  
  
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables.net-bs/css/dataTables.bootstrap.min.css">
    
    <!-- DataTables Export--> 
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables-export/css/buttons.dataTables.min.css">
  
<!--
en esta seccion se elimino los js que estaban de más
-->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/skins/_all-skins.min.css"> 



</head>
<body class="hold-transition skin-green sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->


            <a href="<?php echo base_url();?>dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>C</b>S</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>CIUDAD SALUD</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url()?>assets/template/dist/img/admin-with-cogwheels.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $this->session->userdata("nombre")?> <?php echo $this->session->userdata("ape_pat")?></span>
                            </a>
                            <ul class="dropdown-menu">
                                
                                <li class="user-header">
                                    <img src="<?php echo base_url()?>assets/template/dist/img/admin-with-cogwheels.png" class="img-circle" alt="User Image">

                                    <p>
                                      <?php echo $this->session->userdata("nombre")?>

                                      <small><?php echo $this->session->userdata("ape_pat")?></small>
                                    </p>
                                  </li>

                                  <!-- Menu Footer-->
                                  <li class="user-footer">

                                    <div class="pull-right">
                                        <button type="button" class="btn btn-danger"><a href="<?php echo base_url(); ?>auth/logout">Cerrar Sesión</a></button>
                                    </div>
                                  </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>