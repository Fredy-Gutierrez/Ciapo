<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        FORMATO DE AUTORIZACIÓN PARA PAGO DE PERTUZUMAB
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
                        
                        <form action="<?php echo base_url();?>mantenimiento/Formatos/storepertu" method="POST">

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
                                </table>
            <h1><small>Datos Clinicos</small></h1>
            <table border=0 width="100%">
              <tbody>
                <tr>
                  <th></th>
                  <th>SI</th>
                  <th>NO</th>
                  <th></th>
                  <th></th>
                  <th>SI</th>
                  <th>NO</th>
                </tr>
                <tr>
                  <th><label>Paciente con menopausia </label></th>
                  <th><input type="radio" value="1" name="1" required/></th>
                  <th>&nbsp;<input type="radio" value="2" name="1" required/></th>
                  <th><label >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></th>
                  <th><label>Tumor mayor a 2 cm*</label></th>
                  <th><input type="radio" value="1" name="7" required/></th>
                  <th>&nbsp;<input type="radio" value="2" name="7" required/></th>
                </tr>
                <tr>
                  <th><label>Adenopatía axilar positiva*</label></th>
                  <th><input type="radio" value="1" name="2" required/></th>
                  <th>&nbsp;<input type="radio" value="2" name="2" required/></th>
                  <th></th>
                  <th><label>Insuficiencia Renal</label></th>
                  <th><input type="radio" value="1" name="8" required/></th>
                  <th>&nbsp;<input type="radio" value="2" name="8" required/></th>
                </tr>
                <tr>
                  <th><label>Insuficiencia Hepática</label></th>
                  <th><input type="radio" value="1" name="3" required/></th>
                  <th>&nbsp;<input type="radio" value="2" name="3" required/></th>
                  <th></th>
                  <th><label>Cáncer de mama metastásico*</label></th>
                  <th><input type="radio" value="1" name="9" required/></th>
                  <th>&nbsp;<input type="radio" value="2" name="9" required/></th>
                </tr>
                <tr>
                  <th><label>Recurrencia o Etapa IV*</label></th>
                  <th><input type="radio" value="1" name="4" required/></th>
                  <th>&nbsp;<input type="radio" value="2" name="4" required/></th>
                  <th></th>
                  <th><label>Sobre-expresión o amplificación <br/>de Her 2+, confirmado por IHQ</label></th>
                  <th><input type="radio" value="1" name="10" required/></th>
                  <th>&nbsp;<input type="radio" value="2" name="10" required/></th>
                </tr>
                <tr>
                  <th><label>Receptores estrogénicos postivos</label></th>
                  <th><input type="radio" value="1" name="5" required/></th>
                  <th>&nbsp;<input type="radio" value="2" name="5" required/></th>
                  <th></th>
                  <th><label>Comprobación mediante biopsia</label></th>
                  <th><input type="radio" value="1" name="11" required/></th>
                  <th>&nbsp;<input type="radio" value="2" name="11" required/></th>
                </tr>
              </tbody>
            </table>
            <br>
            <label for="estatura">FEVI Basal:</label>
            <input type="number" id="fevi" name="fevi" value="" required>&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="estatura">Número de ganglios:</label>
            <input type="number" id="ganglios" name="ganglios" value="" required><br>
            <br>
            <div class="row">
              <div class="col-md-12">
                                            
                <div  class="form-group" align="left"> 
                   <label for="antecedentes">Fase de atención: </label>
                   <input cols="40" class="form-control" type="text" style="resize:none;" id="fase" name="fase" required></input>
                </div>
                <div  class="form-group" align="left"> 
                   <label for="antecedentes">Unidad Médica:</label>
                    <input cols="40" class="form-control" type="text" style="resize:none;" id="unidad" name="unidad" required></input>
                   
                </div>
                <div  class="form-group" align="left"> 
                   <label for="antecedentes">Servicio tratante: </label>
                   <input cols="40" class="form-control" type="text" style="resize:none;" id="servicio" name="servicio" required></input>
                   
                </div>
                                  
              </div>
             </div>
             <div class="row">
              <div class="col-md-12">
                                            
                <div  class="form-group" align="center"> 
                   <label for="antecedentes">Órganos afectados:</label>
                   <textarea class="form-control" cols="40" rows="2" style="resize:none;" id="organos" name="organos" required></textarea>
                </div>
                                  
              </div>

             <table class="table table-striped">
               <thead>
                  <th scope="col"></th>
               </thead>
             </table>

             <h1><small>Régimen de tratamiento</small></h1>
              <table border=0 width="50%">
              <tbody>
                <tr>
                  <th></th>
                  <th>SI</th>
                  <th>NO</th>
                </tr>
                <tr>
                  <td><label>Terapia neoadyuvante</label></td>
                  <td><input type="radio" value="1" name="12" required/></td>
                  <td>&nbsp;<input type="radio" value="2" name="12" required/></td>
                </tr>
                <tr>
                   <td><label>Antecedente de uso<br>previo de Trastuzumab</label></td>
                  <td><input type="radio" value="1" name="13" required/></td>
                  <td>&nbsp;<input type="radio" value="2" name="13" required/></td>
                </tr>
              </tbody>
            </table>

              <table border=0 width="100%">
              <tbody>
                <br>
                <tr>
                  <td><label><input type="checkbox" id="monoterapia" name="monoterapia" value="1"> Monoterapia</label></td>
                  <td><label><input type="checkbox" id="monoterapia" name="trata" value="1"> Tratamiento por recaída de cáncer metastásico con quimiterapia previa</label></td>
                </tr>
                <tr>
                  <td><label><input type="checkbox" id="monoterapia" name="combinacion" value="1"> Combinación</label></td>
                  <td><label><input type="checkbox" id="monoterapia" name="aroma" value="1"> Con inhibidor de aromatasa</label></td>
                </tr>
                <tr>
                  <td><label><input type="checkbox" id="monoterapia" name="taxano" value="1">Con un taxano </label></td>
                  <td><label><input type="checkbox" id="monoterapia" name="platinos" value="1">Con taxano y platinos </label></td>
                </tr>
                <tr>
                  <td><label><input type="checkbox" id="monoterapia" name="ciclo" value="1">Con antraciclina, ciclofosfamida y taxano </label></td>
                  <td><label><input type="checkbox" id="monoterapia" name="anticuerpo" value="1">Con otro anticuerpo monoclonal (trastuzumab)</label></td>
                </tr>
              </tbody>
            </table>
            <br><br>
             <div class="row">
              <div class="col-md-12">
                                            
                <div  class="form-group" align="center"> 
                   <label for="antecedentes">Justificación clínica de administración (a ser llenada por el médico tratante):</label>
                   <textarea class="form-control" cols="40" rows="2" style="resize:none;" id="justificacion" name="justificacion" required></textarea>
                </div>
                                  
              </div>
             </div>
                            
                          </table>
                          <br/>
                          <div class="form-group">
                                <center><button type="submit" name="enviar" value="enviar" class="btn btn-success btn-flat">GENERAR PDF</button></center>
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