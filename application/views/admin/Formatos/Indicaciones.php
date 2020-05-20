<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        INDICACIONES
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
                        
                        <form action="<?php echo base_url();?>mantenimiento/Formatos/storeindi" method="POST">

                            <!-- ESTE SERIA ID_CATEGORIA -->
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

                           <div class="form-group">
                                    <label for="ced">TIPO DE INDICACIÓN:</label>
                                    
                                    <select name="tipo">
                                      <option value="INTERNAMIENTO">INTERNAMIENTO</option>
                                      <option value="TRANSFUSION">TRANSFUSION</option>
                                      <option value="PROCEDIMIENTO">PROCEDIMIENTO</option>
                                    </select>
                                    </div>

                          <table class="table table-striped">
                              <thead >
                                <div class="box-body">

                                <div class="row">
                                  <div class="col-md-12">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="antecedentes">DIETA:</label>
                                        <textarea class="form-control" cols="40" rows="3" style="resize:none;" id="dieta" name="dieta" required></textarea>
                                    </div>
                                  
                                         
                                  </div>
                              </div><br>

                                <div class="row">
                                  <div class="col-md-12">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="antecedentes">SOLUCIONES:</label>
                                        <textarea class="form-control" cols="40" rows="3" style="resize:none;" id="soluciones" name="soluciones" required></textarea>
                                    </div>
                                  
                                         
                                  </div>
                              </div><br>

                                <div class="row">
                                  <div class="col-md-12">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="antecedentes">MEDICAMENTOS:</label>
                                        <textarea class="form-control" cols="40" rows="3" style="resize:none;" id="medicamentos" name="medicamentos" required></textarea>
                                    </div>
                                  
                                         
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="antecedentes">ESTUDIOS DE GABINETE Y LABORATORIO:</label>
                                        <textarea class="form-control" cols="40" rows="3" style="resize:none;" id="estudios" name="estudios" required></textarea>
                                    </div>
                                  
                                         
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="antecedentes">CUIDADOS:</label>
                                        <textarea class="form-control" cols="40" rows="3" style="resize:none;" id="cuidados" name="cuidados" required></textarea>
                                    </div>
                                  
                                         
                                  </div>
                              </div><br>
                              </div>
                            </thead>
                           </table>
                          <br/>
                          <div class="form-group">
                                <center><button type="submit" class="btn btn-success btn-flat">GENERAR PDF</button></center>
                            </div>
                            
                        </form><!-- termina-->

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>