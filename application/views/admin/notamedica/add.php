<!-- Content Wrapper. Contains page content -->
<style type="text/css">
    
  textarea{
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.button{
  background-color: #f44336;
  border: none;
  color: white;
  padding: 7px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px; 
}

</style>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nota Medica
        <small>Nueva</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                             </div>
                        <?php endif;?>
                        <?php if($this->session->flashdata("exito")):?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("exito"); ?></p>
                             </div>
                        <?php endif;?>
                        
                        <form action="" method="POST">

                            <table class="table table-striped">
                              <thead>
                                <tr>
                                   <div  class="form-group">
                                        <label for="expediente">NO. EXPEDIENTE DEL PACIENTE:</label>
                                        
                                        <input type="nummber" id="no_exp" name="no_exp" required>
                                    
                                        <button type="button" class="btn btn-info btn-buscarpac" value="">
                                            <span class="fa fa-search"></span>
                                        </button>

                                    </div>
                                </tr>
                               </thead>      
                            </table>

                            <center><img class="img-responsive" src="<?php echo base_url();?>assets/template/dist/img/patient.png" width="100" height="50"></center>

                            <input type="hidden" value="" name="id_sig" id="id_sig">
                            <input type="hidden" value="" name="id_pac" id="id_pac">
                            <input type="hidden" value="" name="exp" id="exp">

                                
                            <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="expediente">Nombre:</label>
                                        <input type="text" class="form-control" id="nombrepx" name="no_exp" style=" width:300px;height:30px" value="" readonly>
                                    </div>

                                    <div  class="form-group" align="center"> 
                                        <label for="curp">Apellido Paterno:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px"  id="ape_pat" name="ape_pat" value="" readonly>
                                    </div> 
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="curp">Apellido Materno:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="ape_mat" name="ape_mat" value="" readonly>
                                    </div> 
                                         
                                  </div>
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                       <label for="expediente">Peso:</label>
                                        <input type="number" class="form-control" style=" width:300px;height:30px" id="peso" name="peso" value="" readonly>
                                    </div>
                                    <div  class="form-group" align="center"> 
                                       <label for="estatura">Estatura:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px"  id="estatura" name="estatura" value="" readonly>
                                    </div> 
                                    <div  class="form-group" align="center"> 
                                       <label for="temperatura">Temperatura:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="temperatura" name="temperatura" value="" readonly>
                                    </div> 
                                         
                                  </div>
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="imc">IMC:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="imc" name="imc" value="" readonly>
                                    </div> 
                                    <div  class="form-group" align="center"> 
                                        <label for="fc">FC:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="fc" name="fc" value="" readonly>
                                    </div> 
                                         
                                  </div>
                                  
                              </div>
                            </div>

                        <table class="table table-striped">
                                <thead>
                                    <th scope="col">
                                    </th>
                                </thead>
                        </table><br>

                        <center><img class="img-responsive" src="<?php echo base_url();?>assets/template/dist/img/medical-report.png" width="100" height="50"></center>



                        <div class="box-body">
                                <div class="row">
                                  <div class="col-md-3">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="cat_diagnostico">DIAGNOSTICO:</label><br>
                                        <select class="form-control" style=" width:300px;height:30px" name="cat_diagnostico" id="cat_diagnostico" required>
                                          <option value=""> Seleccione una opción </option>
                                            <?php foreach($cat_diagnostico as $cat_diagnostico):?>

                                                <option value="<?php echo $cat_diagnostico->id_diag;?>"> <?php echo $cat_diagnostico->desdiag;?> </option>
                                            
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                  </div>

                                  <div class="col-md-3">    
                                    <div  class="form-group" align="center"> 
                                        <label for="dosis">OBSERVACIÓN:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="observacion" name="observacion" required>
                                    </div>  
                                  </div>

                                  <div class="col-md-3">    
                                    <div  class="form-group" align="center"> 
                                        <label for="dosis">ETAPA:</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="etapa" name="etapa" required>
                                    </div>  
                                  </div>

                                  <div class="col-md-3">   
                                    <div  class="form-group" align="left">
                                        <label for="curp">Cobertura:</label><br>
                                        <input type="radio" name="cobertura" value="Coberturado" required>Coberturado<br>
                                        <input type="radio" name="cobertura" value="No coberturado" required>No Coberturado<br>
                                        <input type="radio" name="cobertura" value="Por definir" required>Por definir<br>
                                    </div> 
                                  </div>

                                  
                      
                              </div>
                          </div>

                          <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="cat_diagnostico">ESTADO DE LA ENFERMEDAD:</label><br>
                                        <select class="form-control" style=" width:300px;height:30px" name="estado_enfermedad" id="estado_enfermedad" disabled>
                                        <option value="">Seleccione una opción</option>
                                        <option value="recurrencia"> Recurrencia </option>
                                        <option value="progresion"> Progresión </option>
                                        <option value="sin_evidencia"> Sin evidencia de enfermedad </option>
                                        <option value="persistencia"> Persistencia </option>
                                        <option value="diagnostico_inicial"> Diagnostico Oncológico Inicial </option>
                                        </select>
                                    </div>
                                  </div>

                                  <div class="col-md-4">    
                                    <div  class="form-group" align="center"> 
                                        <label for="dosis">ETAPA:</label>
                                        <input type="number" class="form-control" style=" width:300px;height:30px" id="etapa_enfermedad" name="etapa_enfermedad" readonly>
                                    </div>  
                                  </div>

                                  <div class="col-md-4">   
                                    <div  class="form-group" align="left">
                                        <label id="tiempo_libre">Tiempo libre de enfermedad</label>
                                        <input type="text" class="form-control" style=" width:300px;height:30px" id="tiempo_libre_enfermedad" name="tiempo_libre_enfermedad" readonly>
                                        
                                    </div> 
                                  </div>

                                  
                      
                              </div>
                          </div>
                          

                          <div class="box-body">
                            <div class="row">
                                  <div class="col-md-12">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="antecedentes">ANTECEDENTES HEREDO FAMILIARES:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="antecedentesheredados" name="antecedentesheredados" required></textarea>
                                    </div>
                                  
                                         
                                  </div>
                              </div><br>
                            <div class="row">
                                  <div class="col-md-12">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="antecedentes">ANTECEDENTES PERSONALES NO PATOLOGICOS:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="antecedentesno" name="antecedentesno" required></textarea>
                                    </div>
                                  
                                         
                                  </div>
                              </div><br>
                                <div class="row">
                                  <div class="col-md-12">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="antecedentes">ANTECEDENTES PERSONALES PATOLOGICOS:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="antecedentes" name="antecedentes" required></textarea>
                                    </div>
                                  
                                         
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-md-12">      
                                    <div  class="form-group" align="center"> 
                                        <label for="patologicos">ANTECEDENTES DE IMPORTANCIA PARA EL PADECIMIENTO ACTUAL:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="patologicos" name="patologicos" required></textarea>
                                    </div>     
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">      
                                    <div  class="form-group" align="center"> 
                                        <label for="evolucion">EVOLUCIÓN:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="evolucion" name="evolucion" required></textarea>
                                    </div> 
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="evolucion">EXPLORACIÓN FISICA:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="exploracion" name="exploracion" required></textarea>
                                    </div>    
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12"> 
                                    <div  class="form-group" align="center"> 
                                        <label for="laboratorios">LABORATORIOS:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="laboratorios" name="laboratorios" required></textarea>
                                    </div>  
                                  </div>
                              </div><br>


                          <div class="form-group">

                            <h3>
                              ESTUDIOS DE IMAGEN
                              <div class='btn btn-success' id="btnNuevoT" onclick="funcNuevoE()">
                                Nuevo
                              </div>
                            </h3>

                            <table class='table table-bordered table-hover' id="tablaEstudios">
                              <tr>
                                <th>Estudios</th>
                                <th>Opciones</th>
                              </tr>
                              <tr>
                                <td><input type="text" class="form-control" name="estudios[]"></td>
                                <td class="text-center">
                                  <input type="button" class="borrar button" value="Eliminar">
                                </td>
                              </tr>

                            </table> 
                          </div>

                          <br>
                          <br>

                              

                          <div class="form-group">
                            <h3>
                              HISTORIAL DE TRATAMIENTO
                              <div class='btn btn-success' id="btnNuevoT" onclick="funcNuevoT()">
                                Nuevo
                              </div>
                            </h3>

                            <table class='table table-bordered table-hover' id="tablaTratamientos">
                              <tr>
                                <th>Tratamientos</th>
                                <th>Opciones</th>
                              </tr>
                              <tr>
                                <td><input type="text" class="form-control" name="tratamientos[]"></td>
                                <td class="text-center">
                                  <input type="button" class="borrar button" value="Eliminar">
                                </td>
                              </tr>

                            </table> 
                          </div>

                          <br>

                              <div class="row">
                                  <div class="col-md-12">    
                                    <div  class="form-group" align="center"> 
                                        <label for="toxicidad">REPORTE DE HISTOPATOLOGÍA:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="histopatologia" name="histopatologia" required></textarea>
                                    </div> 
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">    
                                    <div  class="form-group" align="center"> 
                                        <label for="toxicidad">TOXICIDAD:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="toxicidad" name="toxicidad" required></textarea>
                                    </div> 
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="sintomas">SINTOMAS:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="sintomas" name="sintomas" required></textarea>
                                    </div>
                                  
                                         
                                  </div>
                              </div><br>
                              <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="plan">PLAN:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="plan" name="plan" required></textarea>
                                    </div>  
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="plan">PRONOSTICO:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="pronostico" name="pronostico" required></textarea>
                                    </div>  
                                  </div>
                              </div><br>

                              <div class="row">
                                  <div class="col-md-12">
                                    <div  class="form-group" align="center"> 
                                        <label for="plan">ANALISIS:</label>
                                        <textarea class="form-control" style="background-color:#FBFBFB;border:solid 1.5px #8199FF;" id="analisis" name="analisis" required></textarea>
                                    </div>  
                                  </div>
                              </div><br>

                          </div>


                        <?php if(!empty($this->session->userdata("id_med"))):?>
                          <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div  class="form-group" align="right">

                                        <button type="submit" class="btn btn-success" onclick=this.form.action="<?php echo base_url();?>mantenimiento/notamedica/onlystore">
                                            <i class="fa fa-save"></i> GUARDAR
                                        </button>
                                        
                                        <!--<input type="submit" class="btn btn-success" name="enviar1" value="GUARDAR" onclick=this.form.action="<?php echo base_url();?>mantenimiento/notamedica/store">-->
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                    <div  class="form-group" align="center">
                                        <button type="submit" class="btn btn-success" onclick=this.form.action="<?php echo base_url();?>mantenimiento/notamedica/storeandprint">
                                            <i class="fa fa-print"></i> GUARDAR E IMPRIMIR
                                        </button>
                                    </div>
                                  </div>



                                  <div class="col-md-4">  
                                    <div  class="form-group" align="left">
                                        <button type="submit" class="btn btn-success" onclick=this.form.action="<?php echo base_url();?>mantenimiento/notamedica/store">
                                            <i class="fa fa-arrow-right"></i> GUARDAR Y RECETAR
                                        </button>
                                    </div>
                                  </div>
                              </div>
                          </div>

                          <?php endif;?>

                          <?php if(empty($this->session->userdata("id_med"))):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i>¡NO ES MEDICO!, Si lo es registre sus datos en el apartado de medicos, hasta el momento se deshabilitaran los botones para GUARDAR INFORMACIÓN</p>
                             </div>
                        <?php endif;?>
                         
                          
                         

                          

                          
                        
                        <!--<input type="submit" name="enviar2" value="enviar2" onclick=this.form.action="mailto:pepito@juanito.com">
                          
                          <center>
                            <div class="btn-group">
                                <br>
                                <button type="submit" class="btn btn-success btn-flat">SIGUIENTE</button>
                            </div>
                        </center>-->

                                                            
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
<script type="text/javascript">

    $(document).ready(function()
    {

      $("#estado_enfermedad").change(function(){
        $("#estado_enfermedad option:selected").each(function(){
            estado_enfermedad = $(this).val();
            if(estado_enfermedad=="recurrencia"){
              document.getElementById('tiempo_libre').innerHTML= 'Tiempo libre de enfermedad';
              $("#etapa_enfermedad").removeAttr("readonly");
              $("#tiempo_libre_enfermedad").removeAttr("readonly");

              $("#etapa_enfermedad").attr("required","required");
              $("#tiempo_libre_enfermedad").attr("required","required");
            }else if(estado_enfermedad=="progresion"){
              document.getElementById('tiempo_libre').innerHTML= 'Tiempo libre de progresión';
              $("#etapa_enfermedad").removeAttr("readonly");
              $("#tiempo_libre_enfermedad").removeAttr("readonly");

              $("#etapa_enfermedad").attr("required","required");
              $("#tiempo_libre_enfermedad").attr("required","required");
            }else{
              $("#etapa_enfermedad").val( '' );
              $("#tiempo_libre_enfermedad").val( '' );


              $("#etapa_enfermedad").attr("readonly","readonly");
              $("#tiempo_libre_enfermedad").attr("readonly","readonly");
            }
        });
      });

    });


  $(document).on('click', '.borrar', function (event){
    event.preventDefault();
    $(this).closest('tr').remove();
  });


  function funcNuevoT()
  {
    $("#tablaTratamientos")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','tratamientos[]')
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
              $('<input>').attr('type', 'button').addClass('button borrar').attr('value','Eliminar')
            )
        )

    );
  }

  function funcNuevoE()
  {
    $("#tablaEstudios")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
              $('<input>').attr('type', 'text').addClass('form-control').attr('name','estudios[]')
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
              $('<input>').attr('type', 'button').addClass('borrar button').attr('value','Eliminar')
            )
        )

    );
  }



</script>

<script>
  function getcurp(){
    var id = $("#curp").val();
    $.ajax({
            url: base_url + "mantenimiento/paciente/searchpacbycurp/" + id,
            type:"POST",

        }).done( function( info ) {

            var paciente = JSON.parse( info );

            if(!$.isArray(paciente.paciente) ||  !paciente.paciente.length){
                //si esta vacio

            }else{
                swal({
                    title: 'HAY PACIENTES CON ESA CURP REGISTRADOS',
                    text: "Si omite esta alerta no podra guardar ni recuperar lo escrito",
                    type: 'error',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Cerrar'
                }); 
            }


        });

  }

</script>