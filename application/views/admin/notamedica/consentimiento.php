
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        HOJA DE CONSENTIMIENTO
        <small>Nota Medica</small>
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


                        
                        <form action="<?php echo base_url();?>mantenimiento/notamedica/pdfconsentimiento" method="POST">
                            
                            <input type="hidden" value="<?php if(!empty($paciente)){echo $paciente;}?>" name="id_pac">
                            <input type="hidden" value="<?php if(!empty($medico)){echo $medico;}?>" name="id_med">

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
                                    <button type="submit" class="btn btn-success btn-flat">CREAR HOJA DE CONSENTIMIENTO</button>
                              </div>
                            </center>
                                
                        </form>

                        <br>

                        <form action="<?php echo base_url();?>mantenimiento/notamedica/medicamentos" method="POST">
                          <input type="hidden" value="<?php if(!empty($paciente)){echo $paciente;}?>" name="id_pac">
                        	<input type="hidden" value="<?php if(!empty($expediente)){echo $expediente;}?>" name="no_exp">
                        	<input type="hidden" value="<?php if(!empty($medico)){echo $medico;}?>" name="id_med">
                        	<input type="hidden" value="<?php if(!empty($nota)){echo $nota;}?>" name="id_nota">
                          <input type="hidden" id="idnotap" name="idnotap" value="<?php echo $notap; ?>" >

                        	<div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">CONTINUAR A RECETAR</button>
                            </div>

                        </form>
                        
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
