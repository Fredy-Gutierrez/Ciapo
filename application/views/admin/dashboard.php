
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                PAGINA DE INICIO <?php //echo $this->session->userdata("id_med");?>
                <small>BIENVENIDO</small>
                </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Inicio</li>
            </ol>

            </section>
            <!-- Main content -->
            <section class="content">

                <div class="row">

                   
                <?php if ($this->session->userdata("rol")=="Trabajo Social" || $this->session->userdata("rol")=="Enfermeria de Consulta Externa" || $this->session->userdata("rol")=="Medico" || $this->session->userdata("rol")=="Gastos Catastroficos" || $this->session->userdata("rol")=="Administrador") {?>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><a href="<?php echo base_url();?>mantenimiento/paciente"><i class="fa fa-users"></i></a></span> 
                        <div class="info-box-content"> 
                            <span class="info-box-text">CATALAGO</span> 
                            <span class="info-box-number"><h3>Pacientes</h3></span>
                        </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div> 

                <?php } ?>

                <?php if ($this->session->userdata("rol")=="Enfermeria de Consulta Externa" || $this->session->userdata("rol")=="Administrador") {?>
                  <!-- /.col -->
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-aqua"><a href="<?php echo base_url();?>mantenimiento/signosvita/add"><i class="fa fa-user-md"></i></a></span>
                      <div class="info-box-content">
                        <span class="info-box-text">TOMA</span>
                        <span class="info-box-number"><h3>Signos Vitales</h3></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                <?php } ?>
                  <!-- /.col -->
                <?php if ($this->session->userdata("rol")=="Medico"|| $this->session->userdata("rol")=="Gastos Catastroficos" || $this->session->userdata("rol")=="Enfermeria de Quimioterapia Ambulatoria/Piso" || $this->session->userdata("rol")=="Farmacia Hospitalaria" || $this->session->userdata("rol")=="Administrador") {?>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-lime"><a href="<?php echo base_url();?>mantenimiento/notamedica"><i class="fa fa-hospital-o"></i></a></span>
                      <div class="info-box-content">
                        <span class="info-box-text">CONSULTAS</span>
                        <span class="info-box-number"><h3>Notas Medicas</h3></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                <?php } ?>

                <?php if ($this->session->userdata("rol")=="Medico"|| $this->session->userdata("rol")=="Gastos Catastroficos" || $this->session->userdata("rol")=="Enfermeria de Quimioterapia Ambulatoria/Piso" || $this->session->userdata("rol")=="Farmacia Hospitalaria" || $this->session->userdata("rol")=="Administrador") {?>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-red"><a href="<?php echo base_url();?>mantenimiento/gasto_catastroficos"><i class="fa fa-medkit"></i></a></span>
                      <div class="info-box-content">
                        <span class="info-box-text">VALIDACIÓN</span>
                        <span class="info-box-number"><h4>RECETA ONCOLÓGICA</h4></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                <?php } ?>
                  
                </div>

                <div class="row">
                  <?php if ($this->session->userdata("rol")=="Medico"|| $this->session->userdata("rol")=="Gastos Catastroficos" || $this->session->userdata("rol")=="Enfermeria de Quimioterapia Ambulatoria/Piso" || $this->session->userdata("rol")=="Farmacia Hospitalaria" || $this->session->userdata("rol")=="Administrador") {?>
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-gray"><a href="<?php echo base_url(); ?>mantenimiento/agenda"><i class="fa fa-calendar"></i></a></span> 
                        <div class="info-box-content"> 
                            <span class="info-box-text">QUIMIOTERAPIA</span> 
                            <span class="info-box-number"><h3>Agenda</h3></span>
                        </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <?php } ?> 

                  <!-- /.col -->
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="bg-orange info-box-icon"><a href="<?php echo base_url(); ?>mantenimiento/medicos"><i class="fa fa-stethoscope"></i></a></span>
                      <div class="info-box-content">
                        <span class="info-box-text">CATALAGO</span>
                        <span class="info-box-number"><h3>Médicos</h3></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  
                </div>

                <!-- Default box -->
                <div class="table-responsive">
                <img class="img-responsive" src="<?php echo base_url();?>assets/template/dist/img/logo-login.jpg" width="1275" height="800">
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
