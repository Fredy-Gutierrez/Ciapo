        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">NAVEGADOR</li>
                    <li>
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>CATALOGOS</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if ($this->session->userdata("rol")=="Trabajo Social" || $this->session->userdata("rol")=="Enfermeria de Consulta Externa" || $this->session->userdata("rol")=="Medico" || $this->session->userdata("rol")=="Gastos Catastroficos" || $this->session->userdata("rol")=="Administrador") {?>
                            
                            <li>
                                <a href="<?php echo base_url();?>mantenimiento/paciente"><i class="fa fa-circle-o"></i> Pacientes</a>
                            </li>

                            <?php } ?>
                            
                             

                            <li><a href="<?php echo base_url(); ?>mantenimiento/medicos"><i class="fa fa-circle-o"></i> Médicos</a>
                            </li>

                            

                            <li><a href="<?php echo base_url(); ?>mantenimiento/empleados"><i class="fa fa-circle-o"></i> Empleados</a></li>

                            <li><a href="<?php echo base_url();?>mantenimiento/medicamentos"><i class="fa fa-circle-o"></i> Medicamentos</a></li>

                            <li><a href="<?php echo base_url(); ?>mantenimiento/servicios"><i class="fa fa-circle-o"></i> Servicios</a></li>

                            <li><a href="<?php echo base_url(); ?>mantenimiento/camas"><i class="fa fa-circle-o"></i> Camas</a></li>

                            <li><a href="<?php echo base_url(); ?>mantenimiento/sangre"><i class="fa fa-circle-o"></i> Tipos de Sangre</a></li>

                            <li><a href="<?php echo base_url(); ?>mantenimiento/niveles"><i class="fa fa-circle-o"></i> Niveles Socio-Economicos</a></li>

                            <li><a href="#"><i class="fa fa-circle-o"></i> Discapacidades</a></li>
                            <?php /*echo base_url();va despues de cerrar la etiqueta php mantenimiento/categorias2*/?>


                            <li><a href="<?php echo base_url(); ?>mantenimiento/religion"><i class="fa fa-circle-o"></i> Religión</a></li>

                           <li><a href="<?php echo base_url(); ?>mantenimiento/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>

                            

                            
                            
                            <li><a href="<?php echo base_url(); ?>mantenimiento/especialidades"><i class="fa fa-circle-o"></i> Especialidades</a></li>

                            <!--<li><a href="<?php echo base_url(); ?>mantenimiento/estados"><i class="fa fa-circle-o"></i> Estados</a></li>-->

                            <li><a href="<?php echo base_url();?>mantenimiento/procedimiento"><i class="fa fa-circle-o"></i> Procedimiento</a></li>
                            <!--<li><a href="<?php echo base_url();?>mantenimiento/procedimientoinac"><i class="fa fa-circle-o"></i> Procedimientos Inactivos</a></li>-->
                            <li><a href="<?php echo base_url();?>mantenimiento/diagnostico"><i class="fa fa-circle-o"></i> Diagnosticos</a></li>
                            <!--<li><a href="<?php echo base_url();?>mantenimiento/diagnosticoinac"><i class="fa fa-circle-o"></i> Diagnosticos Inactivos</a></li>-->

                        </ul>
                    </li>
                    


                    <li class="treeview">
                            <a href="#">

                            
                            <i class="fa  fa-heartbeat "></i> <span>Enfermeria-Signos Vitales</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>


                            
                        </a>
                        <?php if ($this->session->userdata("rol")=="Enfermeria de Consulta Externa" || $this->session->userdata("rol")=="Administrador") {?>
                        <ul class="treeview-menu"> 
                            <li><a href="<?php echo base_url(); ?>mantenimiento/signosvita/add"><i class="fa fa-circle-o"></i>Tomar Signos Vitales</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/signosvita/index"><i class="fa fa-circle-o"></i> Consultar Tabla</a></li>
                        </ul>
                        <?php } ?>

                    </li>


                    <li>
                        <?php if ($this->session->userdata("rol")=="Medico"|| $this->session->userdata("rol")=="Gastos Catastroficos" || $this->session->userdata("rol")=="Enfermeria de Quimioterapia Ambulatoria/Piso" || $this->session->userdata("rol")=="Farmacia Hospitalaria" || $this->session->userdata("rol")=="Administrador") {?>
                        
                        <a href="<?php echo base_url(); ?>mantenimiento/notamedica">
                            <i class="fa fa-book"></i> <span>CONSULTA-MEDICO</span>
                        </a>
                        
                        <?php } ?>

                    </li>

                    <li>
                        <?php if ($this->session->userdata("rol")=="Medico"|| $this->session->userdata("rol")=="Gastos Catastroficos" || $this->session->userdata("rol")=="Enfermeria de Quimioterapia Ambulatoria/Piso" || $this->session->userdata("rol")=="Farmacia Hospitalaria" || $this->session->userdata("rol")=="Administrador") {?>
                        
                        <a href="<?php echo base_url();?>mantenimiento/gasto_catastroficos"><i class="fa fa-book"></i>RECETA ONCOLÓGICA</a>
                        
                        <?php } ?>

                    </li>
                    
                    
                   

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-stethoscope"></i> <span>QUIMIOTERAPIA</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if ($this->session->userdata("rol")=="Medico"|| $this->session->userdata("rol")=="Gastos Catastroficos" || $this->session->userdata("rol")=="Enfermeria de Quimioterapia Ambulatoria/Piso" || $this->session->userdata("rol")=="Farmacia Hospitalaria" || $this->session->userdata("rol")=="Administrador") {?>

                            <li><a href="<?php echo base_url(); ?>mantenimiento/agenda"><i class="fa fa-calendar"></i> Agenda</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/agenda/reports"><i class="fa fa-file"></i> Reportes</a></li>

                            <?php } ?>
                            <!--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Usuarios</a></li>-->
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-plus-square"></i> <span>FARMACIA</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <?php if ($this->session->userdata("rol")=="Medico"|| $this->session->userdata("rol")=="Gastos Catastroficos" || $this->session->userdata("rol")=="Enfermeria de Quimioterapia Ambulatoria/Piso" || $this->session->userdata("rol")=="Farmacia Hospitalaria" || $this->session->userdata("rol")=="Administrador") {?>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/farmacia"><i class="fa fa-calendar"></i> Agenda</a></li>
                            <?php } ?>
                            <!--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Usuarios</a></li>-->
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-book"></i> <span>FORMATOS</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>

                                <?php if ($this->session->userdata("rol")=="Medico"|| $this->session->userdata("rol")=="Gastos Catastroficos" || $this->session->userdata("rol")=="Administrador") {?>

                                <a href="<?php echo base_url();?>mantenimiento/Formatos/laboratorio"><i class="fa fa-circle-o"></i> SOLICITUD LABORATORIO</a>

                                <a href="<?php echo base_url();?>mantenimiento/Formatos/Imageneologia"><i class="fa fa-circle-o"></i>SERVICIO IMAGENEOLOGIA</a>

                                 <a href="<?php echo base_url();?>mantenimiento/Formatos/Subrogado"><i class="fa fa-circle-o"></i> SERVICIO SUBROGADO</a>

                                 <a href="<?php echo base_url();?>mantenimiento/Formatos/Interconsulta"><i class="fa fa-circle-o"></i> INTERCONSULTA</a>

                                <a href="<?php echo base_url();?>mantenimiento/Formatos/Anatomia"><i class="fa fa-circle-o"></i>ANATOMIA PATOLOGICA</a>

                                <a href="<?php echo base_url();?>mantenimiento/Formatos/Electro"><i class="fa fa-circle-o"></i>ELECTRODIAGNOSTICO</a>

                                <a href="<?php echo base_url();?>mantenimiento/Formatos/Hospitalaria"><i class="fa fa-circle-o"></i>RECETA HOSPITALARIA</a>

                                <a href="<?php echo base_url();?>mantenimiento/Formatos/Indicaciones"><i class="fa fa-circle-o"></i>INDICACIONES</a>

                                <a href="<?php echo base_url();?>mantenimiento/Formatos/Pertu"><i class="fa fa-circle-o"></i>PAGO DE PERTUZUMAB</a>

                                <a href="<?php echo base_url();?>mantenimiento/Formatos/Lapa"><i class="fa fa-circle-o"></i>PAGO DE LAPATINIB</a>

                                <a href="<?php echo base_url();?>mantenimiento/Formatos/Cetu"><i class="fa fa-circle-o"></i>AUTORIZACIÓN CETUXIMAB</a>

                                <a href="<?php echo base_url();?>mantenimiento/Formatos/Onco"><i class="fa fa-circle-o"></i>CONSENTIMIENTO ONCO</a>

                                <a href="<?php echo base_url();?>mantenimiento/Formatos/general"><i class="fa fa-circle-o"></i>CONSENTIMIENTO<br> GENERAL</a>

                                <?php } ?>
                            </li>
                        </ul>
                    </li>

                    <!--
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Tipo Documentos</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                        </ul>
                    </li>-->
                </ul>
                
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->