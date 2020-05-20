        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> X
            </div>
            <strong>Copyright &copy; 2019- <a href="#">CIUDAD SALUD</a>.</strong> 
        </footer>
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>



<script src="<?php echo base_url();?>assets/template/dist/js/select2.min.js"></script>

<script src="<?php echo base_url();?>assets/template/dist/js/sweetalert2/sweetalert2.all.js"></script>


<!-- DataTables Export -->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>

<script>
$(document).ready(function () {

    

    var base_url= "<?php echo base_url();?>";
    
    $(".btn-remove").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        swal({
            title: 'Eliminar',
            text: "¿Seguro desea eliminar el registro?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar'
        }).then((result)=>{
            if(result.value){
                $.ajax({
                    url: ruta,
                    type:"POST",
                    success:function(resp){
                        window.location.href = base_url + resp;
                    }
                });
            }
        })
    });

    $(".btn-salir").on("click", function(){
        var ruta = $(this).attr("href");
        swal({
            title: 'SALIR',
            text: "¿Seguro desea salir? No se guardará lo ultimo modificado",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Salir'
        }).then((result)=>{
            if(result.value){
                $.ajax({
                    url: ruta,
                    type:"POST",
                    success:function(resp){
                        window.location.href = base_url + resp;
                    }
                });
            }
        })
    });

    $('#cat_tiposangre').select2();
    $('#grupos').select2();
    $('#religion').select2();
    $('#discapacidades').select2();
    $('#vivienda').select2();
    $('#nivelsocio').select2();
    $('#medicamento').select2();
    $('#empleado').select2();
    $('#cat_nacionalidades').select2();
    $('#cat_estados').select2();
    $('#cat_municipios').select2();
    $('#cat_localidades').select2();
    $('#cat_diagnostico').select2();

$("#cat_diagnostico").change(function(){

        $("#cat_diagnostico option:selected").each(function(){
            id_diagnostico = $(this).val();
                if(id_diagnostico != ''){
                    $.ajax({

                        url: base_url + "mantenimiento/notamedica/searchdiagnostico/" + id_diagnostico,
                        type:"POST",

                    }).done( function( info ) {
                        var diagnostico = JSON.parse( info );
                        
                        if(diagnostico.diagnostico[0].tipo=="1"){
                            $("#etapa_enfermedad").removeAttr("readonly");
                            $("#etapa_enfermedad").attr("required","required");

                            $("#tiempo_libre_enfermedad").removeAttr("readonly");
                            $("#tiempo_libre_enfermedad").attr("required","required");

                            $("#estado_enfermedad").removeAttr("disabled");
                            $("#estado_enfermedad").attr("required","required");
                        }else{
                            $("#etapa_enfermedad").removeAttr("required");
                            $("#etapa_enfermedad").attr("readonly","readonly");
                            
                            $("#tiempo_libre_enfermedad").removeAttr("required");
                            $("#tiempo_libre_enfermedad").attr("readonly","readonly");

                            $("#estado_enfermedad").removeAttr("required");
                            $("#estado_enfermedad").attr("disabled","disabled");

                            $("#estado_enfermedad").val("Seleccione una opción");
                            $("#etapa_enfermedad").val("");
                            $("#tiempo_libre_enfermedad").val("");
                        }

                    });
                }
                
            
        });

    });

$("#cat_nacionalidades").change(function(){

        $("#cat_nacionalidades option:selected").each(function(){
            id_nacionalidad = $(this).val();
            if(id_nacionalidad==223){
                $.ajax({

                    url: base_url + "mantenimiento/paciente/searchestados/" + id_nacionalidad,
                    type:"POST",

                }).done( function( info ) {
                    var estados = JSON.parse( info );
                    var html="";
                    for (var i in estados.estados) {

                        html += `   
                                <option value="${estados.estados[i].id}"> ${estados.estados[i].nombre} </option>
                                `
                    }
                    $("#cat_estados").html( html );

                });
            }else{
                var html1="";
                html1 += `   
                            <option value=""></option>
                        `
                $("#cat_estados").html( html1 );
                $("#cat_municipios").html( html1 );                
                $("#cat_localidades").html( html1 );                
            }
        });

    });

$("#cat_estados").change(function(){

        $("#cat_estados option:selected").each(function(){
            
            var html1="";
                html1 += `   
                            <option value=""></option>
                        `
            $("#cat_localidades").html( html1 );

            id_estado = $(this).val();
                $.ajax({

                    url: base_url + "mantenimiento/paciente/searchmunicipios/" + id_estado,
                    type:"POST",

                }).done( function( info ) {
                    var municipios = JSON.parse( info );
                    var html="";
                    for (var i in municipios.municipios) {

                        html += `   
                                <option value="${municipios.municipios[i].id}"> ${municipios.municipios[i].nombre} </option>
                                `
                    }
                    $("#cat_municipios").html( html );

                });
        });

    });

$("#cat_municipios").change(function(){

        $("#cat_municipios option:selected").each(function(){
            id_municipio = $(this).val();
                $.ajax({

                    url: base_url + "mantenimiento/paciente/searchlocalidades/" + id_municipio,
                    type:"POST",

                }).done( function( info ) {
                    var localidades = JSON.parse( info );
                    var html="";
                    for (var i in localidades.localidades) {

                        html += `   
                                <option value="${localidades.localidades[i].id}"> ${localidades.localidades[i].nombre} </option>
                                `
                    }
                    $("#cat_localidades").html( html );

                });
        });

    });

    $(".btn-viewmedicamentos").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/medicamentos/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });

$(".btn-buscarpac2").on("click", function(){
         var id = $("#no_exp").val();
         $("#id_pac").val( '' );
         $("#exp").val( '' );
         $("#nombrepx").val('');
         $("#ape_pat").val( '' );
         $("#ape_mat").val( '' );
         $("#fecha").val( '' );
         $("#sexo").val( '' );
         $("#diagnostico").val( '' );
        $.ajax({
            url: base_url + "mantenimiento/Formatos/search/" + id,
            type:"POST",
            

        }).done( function( info ){
            var paciente = JSON.parse( info );
                 if(paciente.paciente==''){
                        swal({
                            title: 'PACIENTE NO ENCONTRADO',
                            text: "El numero de expediente no coincide con ningún paciente",
                            type: 'error',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Cerrar'
                        }); 
                }else{
            for (var i in paciente.paciente) {
                $("#id_pac").val( paciente.paciente[i].id_pac );
                $("#exp").val( paciente.paciente[i].no_exp );
                $("#nombrepx").val( paciente.paciente[i].nombrepx );
                $("#ape_pat").val( paciente.paciente[i].ape_pat );
                $("#ape_mat").val( paciente.paciente[i].ape_mat );
                $("#fecha").val( paciente.paciente[i].fecha_nac );
                $("#sexo").val( paciente.paciente[i].sexo );
                $("#diagnostico").val( paciente.paciente[i].desdiag );
            }

        }
    });
});

    $(".btn-deletemed").on("click", function(){
        var id = $(this).val();
        console.log(id);
        $.ajax({
            url: base_url + "mantenimiento/notamedica/delete/" + id,
            type:"POST",
            success:function(resp){
                //$("#modal-default .modal-body").html(resp);
                
            }

        });

    });

    $(".btn-viewemp").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/empleados/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                
            }

        });

    });
    
    $(".btn-viewus").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/usuarios/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
            }

        });

    });

    $(".btn-viewpac").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/paciente/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
            }

        });

    });

    $(".btn-buscarpac").on("click", function(){
        var id = $("#no_exp").val();
        
        $.ajax({
            url: base_url + "mantenimiento/notamedica/search/" + id,
            type:"POST",

        }).done( function( info ) {
            var paciente = JSON.parse( info );

            if(!$.isArray(paciente.nota) ||  !paciente.nota.length){
                
                if(!$.isArray(paciente.paciente) ||  !paciente.paciente.length){
                    swal({
                        title: 'PACIENTE NO ENCONTRADO',
                        text: "Puede que no se hayan capturado signos vitales del paciente",
                        type: 'error',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Cerrar'
                    }); 
                }else{
                    for (var i in paciente.paciente) {
                        
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

                        var poli = paciente.paciente[i].fin_poliza;

                        if (poli>fecha) {
                            $("#id_pac").val( paciente.paciente[i].id_pac );
                            $("#id_sig").val( paciente.paciente[i].cns );
                            $("#exp").val( paciente.paciente[i].no_exp );
                            $("#nombrepx").val( paciente.paciente[i].nombrepx );
                            $("#ape_pat").val( paciente.paciente[i].ape_pat );
                            $("#ape_mat").val( paciente.paciente[i].ape_mat );
                            $("#peso").val( paciente.paciente[i].peso );
                            $("#estatura").val( paciente.paciente[i].estatura );
                            $("#temperatura").val( paciente.paciente[i].temperatura );
                            $("#imc").val( paciente.paciente[i].imc );
                            $("#fc").val( paciente.paciente[i].fc );
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

                    }
                }
            }else{
                swal({
                    title: 'HAY NOTAS MEDICAS ACTIVAS',
                    text: "El paciente ya tiene notas medicas, pasar al area de Nota Subsecuente",
                    type: 'error',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Cerrar'
                }); 
            }


        });
    });

    

$(".btn-buscarmed").on("click", function(){
        var id = $("#cedula").val();
        $.ajax({
            url: base_url + "mantenimiento/notamedica/searchmed/" + id,
            type:"POST",

        }).done( function( info ) {
            var medico = JSON.parse( info );
            for (var i in medico.medico) {
                $("#id_med").val( medico.medico[i].id_med );
                $("#id_emp").val( medico.medico[i].id_emp );
                $("#nombremed").val( medico.medico[i].nombre );
                $("#ape_patmed").val( medico.medico[i].ape_pat );
                $("#ape_matmed").val( medico.medico[i].ape_mat );
            }

        });

    });

    
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

            
            if(receta.medicinas==""){   //Si no se encuentran los datos en la base de datos
                alert("No existe dicha Receta \nIntentalo de nuevo");

                //El .Empty() sirve para borra de pantalla dicha sección
                $("#data_medico").html(html).empty();
                $("#data_medico2").html(html2).empty();
                $("#data_nombrepx").html(html3).empty();
                $("#data_paciente").html(html4).empty();
                $("#data_medicina").html(html5).empty();
                $("#data_boton").html(html6).empty();
            }
            else{

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
`   
       
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
`
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
`   

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
`
            }

            html5+=`

            <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr  >
                                        <th>Clave</th> <!-- Nombre de las columnas-->
                                        <th>Nombre Medicamento</th>
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
            `

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

                                        <td>${receta.medicinas[i].clave}</td>
                                        <td>${receta.medicinas[i].nombregen}</td>
                                        <td>${receta.medicinas[i].dosis}</td>
                                        <td>${receta.medicinas[i].frecuencia}</td>
                                        <td>${receta.medicinas[i].via_administracion}</td>
                                        <td>${receta.medicinas[i].fecha_inicio}</td>
                                        <td>${receta.medicinas[i].fecha_fin}</td>
                                        <td>${receta.medicinas[i].descripcion}</td>

                                        <td>
                                        <head>`

                                        if(rad=='t'){
                                            html5+=`<div class="form-group">
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
                                        `
                                        }

                                        else{
                                            html5+=`
                                        <div class="form-group">
                                          <input type="hidden" name="idRec[${i}]" id="id_rec" value=${receta.receta[i].id_detreceta}>
                                          
                                            <label class="radio-inline">
                                            
                                              <input type="radio" class='activ' val="${i}" name="optradio[${i}]" id="opcion1" value="true" > ACEPTADO
                                            </label>

                                            <br>
                                            <label class="radio-inline">
                                            
                                              <input type="radio" class='desact' val="${i}" name="optradio[${i}]"  id="opcion2" value="false" checked> RECHAZADO
                                            </label>
                                          
                                        </div>

                                        </head>
                                        </td>



                                        <td>
                                        <textarea class='texto_camb${i}' name="coment[${i}]" id="coment${i}" rows="3" cols="25" placeholder='¿Por qué es rechazado?' style="overflow:auto;resize:none" required>${receta.medicinas[i].justif}</textarea>

                                        </td>
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
                             <button type="submit" class="btn btn-success btn-flat">Crear PDF</button>
                          </div>

                         

            `
            
            //$("#data_receta").html(html);
             $("#data_medico").html(html);
            $("#data_medico2").html(html2);
             $("#data_nombrepx").html(html3);
            $("#data_paciente").html(html4);
            $("#data_medicina").html(html5);
            $("#data_boton").html(html6);
        }
            
        });

    });

var texto="";
    
    $(document).on("click","input.desact ",function(e)  //Activa el campo de justificación
    {
        
        var tt=$(this).attr('val'); //Obtiene la posicion de la fila que fue seleccionada
        var txt= "textarea.texto_camb"+tt; //Se establece la fila/columna seleccionada empezando con el tipo y la clase más la posicion

        $(txt).prop('disabled', false);     //Se quita el atributo 'disabled' (Desactivado)
        $(txt).prop('required', true);     //Se añade el atributo 'required' (Requerido)

        //$(txt).text("Escribe Un Comentario");
        $(txt).prop('value', texto);
        $(txt).prop('placeholder', '¿Por qué es Rechazado?');
        //$(txt).removeAttr('disabled');  //Se quita el atributo de desactivado

    });

     $(document).on("click","input.activ",function(e)
    {   
        var tt=$(this).attr('val'); //Obtiene la posicion de la fila que fue seleccionada
        var txt= "textarea.texto_camb"+tt; //Se establece la fila/columna seleccionada empezando con el tipo y la clase más la posicion
        var texto2=$(txt);

        texto=$(txt).prop('value');
        //inputNombre.value = "DYP";
        $(txt).html("Nuevo valor"); 
        $(txt).prop('disabled', true);  //Se pone el atributo de desactivado
        $(txt).prop('required', false);  //Se desactiva el atributo required (Requerido)
        $(txt).prop('placeholder', '');
        $(txt).prop('value', '');


    });


// // Categorias
//     $('#example1').DataTable({
//   dom: 'Bfrtip',
//         buttons: [
//             /*{
//                 extend: 'excel',
//                 title: "CATEGORIAS",
//                 exportOptions:{
//              columns:[0,1,2,3]   
//             }
                
//                           },
//             {
//                 extend: 'print',
//                 text: 'Imprimir',
//                 title: "CATEGORIAS",
//                 exportOptions:{
//              columns:[0,1,2,3]   
//             }
                
//             },*/
//             {
//             extend: 'pdf',
//                 text: 'Generar PDF',
//                 title: "PACIENTES",
//                 exportOptions:{
//              columns:[0,1,2,3]   
//             }
                
//             }
//         ]

// });

//     //para Categorias
// /* $(document).ready(function() {
//     $('#example1').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//              extend: 'excelHtml5',
//                 title: "Reporte De labores Por Empleado",
//             'copy', 'csv', 'excel', 'pdf', 'print'
//         ]
//     } );
// } ); */

$('#example2').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    


    

///////////////////////////////////////////////////
    $('.sidebar-menu').tree()
    

})
</script>
</body>
</html>
