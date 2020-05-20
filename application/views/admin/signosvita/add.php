
<style type="text/css">
  input[data-readonly] {
    pointer-events: none;
  }
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <h1>
        Toma De Signos Vitales
        <small>Nuevo</small>
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
                        <?php if($this->session->flashdata("exitos")):?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("exitos"); ?></p>
                             </div>
                        <?php endif;?>
                       <form action="<?php echo base_url();?>mantenimiento/signosvita/store" method="POST" name="sig">
                        
                                <table class="table table-striped">

                                 <tr>
                                <th>
                                <div  class="form-group" align="center"> 
                                    <label for="no_exp" >No.Expediente</label>
                                    <input type="nummber"  id="no_exp" name="no_exp"   required> 
                                    <button type="button" class="btn btn-info" value="" onclick="buscar()">
                                       <span class="fa fa-search">
                                         
                                       </span>
                                     </button>

                                </div>
                                </th>
                                </tr>


                                </table>

                        <input type="hidden"   id="id_pac" name="id_pac" value="" required>

                        <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">

                                            
                                    <div  class="form-group"> 
                                        <label for="peso">Nombre:</label>
                                        <input type="nummber" id="nombrepx" name="nombrepx" value="" readonly required>
                                    </div>
                                         
                                  </div>
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group"> 
                                        <label for="apellido">Apellido paterno:</label>
                                        <input type="nummber" id="ape_pat" name="ape_pat" value="" readonly required>
                                    </div>
                                         
                                  </div>
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group"> 
                                        <label for="ape_mate">Apellido materno:</label>
                                        <input type="nummber" id="ape_mat" name="ape_mat" value="" readonly required>
                                    </div>
                                         
                                  </div>
                              </div>
                          </div><br>

                             <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="peso">Peso (KG)</label>
                                        <input type="float" min="1" step="1" class="form-control" id="peso" name="peso" style=" width:300px;height:30px" onchange="cal()"  required>
                                    </div>

                                    <div  class="form-group" align="center"> 
                                        <label for="estatura">Estatura (CM)</label>
                                        <input type="float" min="1" step="1" class="form-control" id="estatura" name="estatura" style=" width:300px;height:30px" onchange="cal()" required>
                                    </div> 
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="imc">IMC </label>
                                        <input type="float" min="1" step="1" class="form-control" id="imc" name="imc" style=" width:300px;height:30px"  readonly required>
                                    </div> 
                                         
                                  </div>


                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="temperatura">Temperatura (°C)</label>
                                        <input type="float" min="1" step="1" class="form-control" id="temperatura" name="temperatura" style=" width:300px;height:30px" required>
                                    </div> 

                                    <div  class="form-group" align="center"> 
                                     <label for="fc">Frecuencia Cardiaca (fc)</label>
                                     <input type="text" min="1" step="1" class="form-control" id="fc" name="fc" style=" width:300px;height:30px" required>
                                    </div>  
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="fr">Frecuencia Respiratoria (fr)</label>
                                        <input type="text" min="1" step="1" class="form-control" id="fr" name="fr" style=" width:300px;height:30px" required>
                                    </div>  
                                         
                                  </div>

                                  <div class="col-md-4">
                                            
                                    <div  class="form-group" align="center"> 
                                        <label for="ta">Tensiòn Arterial (ta)</label>
                                        <input type="text" min="1" step="1" class="form-control" id="ta" name="ta" style=" width:300px;height:30px" required>
                                    </div>

                                      
                                         
                                  </div>
                                          <!-- /.col -->
                                </div>
                            </div>

                                <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group" align="center">
                                        <label for="curp">Paciente Agendado:</label><br>
                                        <input type="radio" name="agendado" value="si" required> Si<br>
                                        <input type="radio" name="agendado" value="no" required> No<br>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div  class="form-group" align="center"> 
                                            <label for="ta">Derecho Habiencia</label>
                                            <input type="text" class="form-control readonly" id="derecho_habiencia" name="derecho_habiencia" style=" width:300px;height:30px" required data-readonly>
                                        </div>
                                  </div>
                                  <div class="col-md-4">
                                        <div  class="form-group" align="center"> 
                                            <label for="ta">Número de folio de hoja de pago de consulta</label>
                                            <input type="text"  class="form-control" id="pago_consulta" name="pago_consulta" style=" width:300px;height:30px" required>
                                        </div>
                                  </div>
                                </div>
                              </div>

                                <div class="box-body">
                                <div class="row">
                                  <div class="col-md-4">
                                      <div  class="form-group" align="center"> 
                                        <label for="ta">Turno de trabajo:</label>
                                        <select name="turno" id="turno" class="form-control" style=" width:300px;height:30px">
                                        
                                              <option value="Matutino"> Matutino </option>
                                              <option value="Vespertino"> Vespertino </option>
                                              <option value="Fin de Semana"> Fin de Semana </option>
                                          
                                        </select>
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div  class="form-group" align="center"> 
                                        <label for="ta">Hora de cita agendada:</label>
                                        <input type="time" name="hora" class="form-control" style=" width:300px;height:30px" required>
                                    </div>
                                  </div>

                                  <div class="col-md-4">
                                        <div  class="form-group" align="center"> 
                                            <label for="ta">Folio de curación</label>
                                            <input type="text"  class="form-control" id="folio_curacion" name="folio_curacion" style=" width:300px;height:30px" required>
                                        </div>
                                  </div>
                                  
                                  
                                </div>
                              </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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
<!--<?php

    $r= $_POST['peso'];
    $p= $_POST['esatura'];

    $s= $r + $p;
    echo $s;

?>-->
<script>

  $(".readonly").on('keydown paste', function(e){
        e.preventDefault();
    });

var base_url= "<?php echo base_url();?>";
 function cal() {
  try {
    var a = parseFloat(document.sig.peso.value),
        b = parseFloat(document.sig.estatura.value);
        x=a / ((b*b)/10000);
        var condecimal=x.toFixed();
    document.sig.imc.value = condecimal;
   
  } catch (e) {
  }
}   

 

 function buscar(){
         var id = $("#no_exp").val();
        $.ajax({
            url: base_url + "mantenimiento/signosvita/search/" + id,
            type:"POST",

        }).done( function( info ){
            var paciente = JSON.parse( info );
            var html="";
            var html1="";
            var html2="";
            var html3="";
            var poli;
            var fecha_fin;
            var derecho_habiencia;

           
            for (var i in paciente.paciente) {
                html+=paciente.paciente[i].id_pac;
                html1+=paciente.paciente[i].nombrepx;
                html2+=paciente.paciente[i].ape_pat;
                html3+=paciente.paciente[i].ape_mat;
                poli=paciente.paciente[i].fin_poliza;
                derecho_habiencia = paciente.paciente[i].derecho_habiencia;
            }

            var n = new Date(); 

            var m=n.getMonth()+1;
            var d=n.getDate();
            var y=n.getFullYear();

            if (d<10) {
                d='0'+d;
            }
            if (m<10) {
                m='0'+m;
            }

            var fecha = y + "-" + m +"-" + d;

            if (poli>fecha) {
                $("#id_pac").val(html);
                $("#nombrepx").val(html1);
                $("#ape_pat").val(html2);
                $("#ape_mat").val(html3); 
                $("#derecho_habiencia").val(derecho_habiencia); 
            }else{
                swal({
                        title: 'POLIZA NO VIGENTE',
                        text: "La poliza a expirado, favor de pasar al área de Trabajo Social",
                        type: 'error',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Cerrar'
                });
            }






            /*if () 
            {

            }else{

            }*/

            
                /**/





        });

    }   
    
</script>

<script type="text/javascript">
    function mensaje(){
        var respuesta= alert("¿Esta Seguro Que Lleno Todos Los Campos?");

       /* if(respuesta == true)
        {
            return true;
        }

        else
        {
            return false;
        }*/

    }
</script>