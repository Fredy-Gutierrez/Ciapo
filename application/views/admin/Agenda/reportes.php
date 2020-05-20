
<body>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
            Agenda
            <small>REPORTES</small>
            </h1>
            <meta charset="utf-8">
        </section>
        <section class="content">
            <?php if($this->session->flashdata("exitoreport")):?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("exitoreport"); ?></p>
                </div>
            <?php endif;?>

            <div class="col-md-12">
                <div class="box box-info box-solid">
                <div class="box-header with-border"></div>
                <div class="row"> 
                <div class="box-body">
                    <?php 
                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            
                        $fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));
                        $dia=$fechaa->format("d");
                        $hora=$fechaa->format("H");
                        $minutos=$fechaa->format("i");
                    ?>
                    <center><img src="<?php echo base_url();?>/assets/template/dist/img/curriculum.png" /></center>
                    <center><h3 class="col-md-12" style="color:#2eafff"><?php echo "Fecha Actual: ".$dia."/".$meses[date('n')-1]. "/".date('Y');?></h3></center>
                    
                </div>    
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success box-solid">
                <div class="row"> 
                <div class="box-body">
                    <!-- Main content -->
                    <form action="<?php echo base_url();?>mantenimiento/agenda/consulta_Reporte_dia" method="POST">
                        <div class="col-md-12">
                            <label>Generar Reporte De Un Dia</label>
                            <div class="input-group">
                                <input class="form-control" style="border-color:green;"  type="date" name="fechareport" id="fechareport" required>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-success">Generar</button>
                                </div>
                            </div>
                            <label style="color:green; " ><small>*Seleccione la fecha del reporte</small></label>
                        </div>
                    </form>
                    
                </div>    
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success box-solid">
                <div class="row"> 
                <div class="box-body">
                    <form action="<?php echo base_url();?>mantenimiento/agenda/consulta_Reporte_Mes" method="POST">
                        <div class="col-md-12">
                            <label>Generar Reporte Mensual</label>
                            <div class="input-group">
                                <input class="form-control" style="border-color:green;"  type="date" name="fechareport" id="fechareport" required>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-success">Generar</button>
                                </div>
                            </div>
                            <label style="color:green; "><small>*Seleccione la fecha del reporte</small></label>
                        </div>
                    </form>
                </div>    
                </div>
                </div>
            </div>
           
        </section>
    </div>
</body>


