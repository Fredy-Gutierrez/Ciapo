<hr>
<!-- DATOS DEL MEDICO-->
<table class="table table-striped"> 
    <tr>
         
        <div class="col-md-12">
            <label for="descripcion">Nombre de Medico:</label>
            <input type="text" value="" style="text-transform: uppercase;" class="form-control" id="nom_medico" name="nom_medico[]" readonly>
        </div>
       
    </tr>
</table>

<tr>
<th scope="col">

  <div class="col-md-12"> 
      
      <label for="id_religion">Apellido Paterno de Medico</label>
      <input type="text" value="" style="text-transform: uppercase;" class="form-control" id="nom_medico" name="nom_medico[]" readonly>

  </div>
</th>
     
 <th scope="col">

  <div class="col-md-12">
  
      <label for="id_religion">Apellido Materno de Medico</label>
      <input type="text" value="" style="text-transform: uppercase;" class="form-control" id="nom_pacie" name="nom_medico[]" readonly>
 
     
      
  </div>
 </th>
 
</tr>

<!-- SE CREA TABLA PARA DATOS DE PACIENTE-->
<table class="table table-striped"> 
<tr>
    <div class="col-md-12">
        <label for="descripcion">Nombre de Paciente:</label>
        <input type="text" value="" style="text-transform: uppercase;" class="form-control" id="nom_medico" name="nom_pac[]" readonly>
    </div>
   
</tr>
</table>

<tr>
<th scope="col">

  <div class="col-md-12"> <!-- Se crea para la columna ID Categorias -->
      
      <label for="id_religion">Apellido Paterno de Paciente</label>
      <input type="text" value="" style="text-transform: uppercase;" class="form-control" id="nom_medico" name="nom_pac[]" readonly>
               
  </div>
</th>
 
<th scope="col">
  <div class="col-md-12">
  
      <label for="id_religion">Apellido Materno de Paciente</label>
      <input type="text" value="" style="text-transform: uppercase;" class="form-control" id="nom_pacie" name="nom_pac[]" readonly>
  </div>
</th>

</tr>

<!--TABLA PARA LOS DATOS DE MEDICIONAS-->
<div class="row ">
<div class="col-md-12">
  <table id="example1" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Clave de Medicamento</th> <!-- Nombre de las columnas-->
            <th>Nombre de Medicamento</th> <!-- Nombre de las columnas-->
            <th>Dosis</th>
            <th>Frecuencia</th>
            <th>Vía Administración</th>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>
            <th>Descripción</th>
            <th>Aceptado/ No Aceptado</th>
            <th>Comentario</th>
        </tr>
    </thead>

    <tbody>
        
    <tr>
            

      </tr>
    </tbody>
  </table>
</div>
</div>

<div class="row">
  <div class="col-md-12">
    <table id="example1" class="table  table-bordered table-hover">
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>

          <td class="botones">
          <head>
            <div class="form-group">
              <input type="hidden" name="idRec[${i}]" id="id_rec" value=${receta.receta[i].id_detreceta}>
              
              <label class="radio-inline">
                
                <input type="radio" class='activ' val="${i}" name="optradio[${i}]" id="opcion1" value="true" checked> ACEPTADO
              </label>

              <br>
              <label class="radio-inline">
                
                <input type="radio" class='desact' val="${i}"  name="optradio[${i}]"  id="opcion2" value="false" > RECHAZADO
              </label>
              
            </div>

          </head>
          </td>
          <td>
            <textarea style="overflow:auto;resize:none" class='texto_camb${i}' name="coment[${i}]" id="coment${i}" rows="3" cols="25"  disabled></textarea>
              <!--<input type="textarea" class='texto_camb${i}' value='' name="coment[${i}]" id="coment${i}" disabled>-->
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>