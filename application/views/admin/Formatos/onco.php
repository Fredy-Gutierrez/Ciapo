
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        CONSENTIMIENTO CON LEYENDA ONCO
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="table-responsive col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                             </div>
                        <?php endif;?>


                        
                        <form action="<?php echo base_url();?>mantenimiento/Formatos/storeonco" method="POST">

                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  
                                  <th scope="col">
                                    <div class="form-group">
                                    <label for="expediente">NO. EXPEDIENTE:</label>
                                    <input type="nummber"    id="no_exp" name="no_exp" required>
                                     <button type="button" class="btn btn-info btn-buscarpac2" value="">
                                       <span class="fa fa-search">
                                         
                                       </span>
                                     </button>
                                     
                                    </div>
                                  </th>
                                 
                                
                                 

                                </tr>
                              </thead>
                            </table>

                            <input type="hidden" value="" name="id_pac" id="id_pac">
                            <input type="hidden" value="" name="exp" id="exp"> 

                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="expediente">Nombre:</label>
                                        <input type="nummber" class="form-control" id="nombrepx" name="nombrepx" style=" width:300px;height:30px" value="" readonly>
                                    </div>

                                    <div  class="form-group" align="center"> 
                                        <label for="curp">Apellido Paterno:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px"  id="ape_pat" name="ape_pat" value="" readonly>
                                    </div> 
                                         
                                  </div>
                                  <div class="col-md-4">

                                    <div  class="form-group" align="center"> 
                                        <label for="curp">Apellido Materno:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="ape_mat" name="ape_mat" value="" readonly>
                                    </div> 
                                            
                                    <div  class="form-group" align="center"> 
                                       <label for="expediente">Fecha de nacimiento:</label>
                                        <input type="nummber" class="form-control" style=" width:300px;height:30px" id="fecha" name="fecha" value="" readonly>
                                    </div>
                                    
                                         
                                  </div>

                                   <div class="col-md-4">

                                    <div  class="form-group" align="center"> 
                                       <label for="estatura">Sexo:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px"  id="sexo" name="sexo" value="" readonly>
                                    </div> 
                                    <div  class="form-group" align="center"> 
                                       <label for="temperatura">Diagnostico:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="diagnostico" name="diagnostico" value="" readonly>
                                    </div>
                                   </div>      
                                </div>

                                 <table class="table table-striped">
                                <thead>
                                    <th scope="col">
                                    </th>
                                    </thead>
                                </table><br>

                            <div class="box-body">
                                <div class="row">
                                      <div class="col-md-1">
                                                
                                        <div  class="form-group" align="center"> 
                                            <label for="curp">PROCEDIMIENTO</label><br>
                                            <input type="radio" name="procedimiento" value="efectiva" required>Elecitiva<br>
                                            <input type="radio" name="procedimiento" value="urgencia" required>Urgencia<br>
                                        </div>
                                    </div>
                                </div><br>

                                <div class="row">
                                  <div class="col-md-12">    
                                    <div  class="form-group" align="center">
                                        <label for="patologicos">DIAGNOSTICO PREVIO:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF;" id="diagnostico" name="diagnostico" required></textarea>
                                    </div>
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">    
                                    <div  class="form-group" align="center">
                                        <label for="laboratorios">PROCEDIMIENTO DE INTERVENCIÓN:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF;" id="intervencion" name="intervencion" required></textarea>
                                    </div>
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">    
                                    <div  class="form-group" align="center">
                                        <label for="evolucion">BENEFICIOS:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF;" id="beneficios" name="beneficios" required></textarea>
                                    </div>
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">    
                                    <div  class="form-group" align="center">
                                        <label for="toxicidad">NOMBRE DEL TUTOR O RESPONSABLE:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF;" id="tutor" name="tutor" required></textarea>
                                    </div>
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">    
                                    <div  class="form-group" align="center">
                                        <label for="plan">NOMBRE DEL TESTIGO 1:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF;" id="testigo1" name="testigo1" required></textarea>
                                    </div>
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">    
                                    <div  class="form-group" align="center">
                                        <label for="indicaciones">NOMBRE DEL TESTIGO 2:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;resize:none;border:solid 1.5px #8199FF;" id="testigo2" name="testigo2" required></textarea>
                                    </div>
                                  </div>
                              </div><br>

                            </div>

                            <center>
                              <div class="btn-group">
                                    <button type="submit" class="btn btn-success btn-flat">GENERAR PDF</button>
                              </div>
                            </center>
                                
                        </form>

                        <br>

                       
                        
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
