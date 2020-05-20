<script type="text/javascript">

$(".btn-gast_cat").on("click", function(){
        var id = $("#id_receta").val();
        $.ajax({
            url: base_url + "mantenimiento/Gasto_catastroficos/search/" + id,
            type:"POST",
        }).done(function (info){
            var receta= JSON.parse(info);
            var html="";
            var html2="";
            var html3="";
            var html4="";
            var html5="";
            var html6="";
            var a=0;

            for(var i in receta.medicinas){
                a=i;
            }





           for (var i in receta.medico){
                html+=`
                <hr>
                             <table class="table table-striped"> 
                                    <tr>
                                         
                                        <div class="col-md-12">
                                            <label for="descripcion">Nombre de Medico:</label>
                                            <input type="text" value="${receta.medico[i].nombre} " style="text-transform: uppercase;" class="form-control" id="nom_medico" name="nom_medico[]" readonly>

                                            
                                        </div>
                                       
                                    </tr>
                                    </table>
`;   
       
                html2+=`

                                    <tr>
                                      <th scope="col">
                                    
                                        <div class="col-md-12"> <!-- Se crea para la columna ID Categorias -->
                                            
                                            
                                            <label for="id_religion">Apellido Paterno de Medico</label>
                                            <input type="text" value="${receta.medico[i].ape_pat} " style="text-transform: uppercase;" class="form-control" id="nom_medico" name="nom_medico[]" readonly>
                                            
                                                       
                                        </div>
                                       </th>
                                       
                                       <th scope="col">
                                    
                                        <div class="col-md-12">
                                        
                                            <label for="id_religion">Apellido Materno de Medico</label>
                                            <input type="text" value="${receta.medico[i].ape_mat} " style="text-transform: uppercase;" class="form-control" id="nom_pacie" name="nom_medico[]" readonly>
                                       
                                           
                                            
                                        </div>
                                       </th>
                                   
                                   </tr>
`;
            }
            
            for (var i in receta.paciente){
                html3+=`
                             <table class="table table-striped"> 
                                    <tr>
                                        <div class="col-md-12">
                                            <label for="descripcion">Nombre de Paciente:</label>
                                            <input type="text" value="${receta.paciente[i].nombrepx} " style="text-transform: uppercase;" class="form-control" id="nom_medico" name="nom_pac[]" readonly>
                                        </div>
                                       
                                    </tr>
                                    </table>
`;   

                html4+= `


                                    <tr>
                                      <th scope="col">
                                    
                                        <div class="col-md-12"> <!-- Se crea para la columna ID Categorias -->
                                            
                                            
                                            <label for="id_religion">Apellido Paterno de Paciente</label>
                                            <input type="text" value="${receta.paciente[i].ape_pat} " style="text-transform: uppercase;" class="form-control" id="nom_medico" name="nom_pac[]" readonly>
                                            
                                                       
                                        </div>
                                       </th>
                                       
                                       <th scope="col">
                                    
                                        <div class="col-md-12">
                                        
                                            <label for="id_religion">Apellido Materno de Paciente</label>
                                            <input type="text" value="${receta.paciente[i].ape_mat} " style="text-transform: uppercase;" class="form-control" id="nom_pacie" name="nom_pac[]" readonly>
                                       
                                           
                                            
                                        </div>
                                       </th>
                                   
                                   </tr>
`;
            }

            html5+=`
            <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr  >
                                        <th>ID Medicamento</th> <!-- Nombre de las columnas-->
                                        <th>Dosis</th>
                                        <th>Frecuencia</th>
                                        <th>Vía Administración</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Final</th>
                                        <th>Descripción</th>
                                        <th>Aceptado/ No Aceptado</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    
                                    <tr>
                                        

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            `;

            var i=0;
            
            var rad;

            while(i<=a){
                rad=receta.medicinas[i].validacion;

                 html5+=`
                
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-hover">
                                <tbody>
                                    <tr>

                                        <td>${receta.medicinas[i].id_medicamento}</td>
                                        <td>${receta.medicinas[i].dosis}</td>
                                        <td>${receta.medicinas[i].frecuencia}</td>
                                        <td>${receta.medicinas[i].via_administracion}</td>
                                        <td>${receta.medicinas[i].fecha_inicio}</td>
                                        <td>${receta.medicinas[i].fecha_fin}</td>
                                        <td>${receta.medicinas[i].descripcion}</td>

                                        <td>
                                        <head>`;

                                        if(rad=='t'){
                                            html5+=`
                                        <div class="form-group">
                                          <input type="hidden" name="idRec[${i}]" id="id_rec" value=${receta.receta[i].id_detreceta}>
                                            <label class="radio-inline">
                                            
                                              <input type="radio" name="optradio[${i}]" id="opcion1" value="true" checked > ACEPTADO
                                            </label>
                                            <label class="radio-inline">
                                            
                                              <input type="radio" name="optradio[${i}]" id="opcion2" value="false" > No ACEPTADO
                                            </label>
                                          
                                        </div>
                                        `;
                                        }

                                        else{
                                            html5+=`
                                        

                                        <div class="form-group">
                                          <input type="hidden" name="idRec[${i}]" id="id_rec" value=${receta.receta[i].id_detreceta}>
                                            <label class="radio-inline">
                                            
                                              <input type="radio" name="optradio[${i}]" id="opcion1" value="true" > ACEPTADO
                                            </label>
                                            <label class="radio-inline">
                                            
                                              <input type="radio" name="optradio[${i}]" id="opcion2" value="false" checked> No ACEPTADO
                                            </label>
                                          
                                        </div>
                                        `
                                        }
                                        
                                        html5+=
                                        `
                                        
                                       </head>
                                        </td> 
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            `
            i=i+1;

            }

            html6+=`
            <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                          </div>

            `;

             $("#data_medico").html(html);
            $("#data_medico2").html(html2);
             $("#data_nombrepx").html(html3);
            $("#data_paciente").html(html4);
            $("#data_medicina").html(html5);
            $("#data_boton").html(html6);
        });

    });
</script>