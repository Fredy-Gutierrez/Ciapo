<!-- Content Wrapper. Contains page content -->
<head>
    <!--JQUERY-->
    <script src="<?php echo base_url();?>assets/template/cal/agenda/datepicker/jquery.min.js"></script>

    <!--CSS para los Scripts-->
        <!--FULLCALENDAR-->
    <link href="<?php echo base_url();?>assets/template/cal/agenda/core/main.css" rel='stylesheet' />
    <link href="<?php echo base_url();?>assets/template/cal/agenda/daygrid/main.css" rel='stylesheet' />
    <link href="<?php echo base_url();?>assets/template/cal/agenda/timegrid/main.css" rel='stylesheet'/>
    <link href="<?php echo base_url();?>assets/template/cal/agenda/bootstrap/main.css" rel='stylesheet'/>
    <link href="<?php echo base_url();?>assets/template/cal/agenda/list/main.css" rel='stylesheet'/>
        <!--DATEPICKER-->
    <link href="<?php echo base_url();?>assets/template/cal/agenda/datepicker/css/bootstrap-datepicker.css" rel='stylesheet'/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/dist/css/select2.min.css">

    <!--Scripts-->
        <!--FULLCALENDAR-->
    <script src="<?php echo base_url();?>assets/template/cal/agenda/core/main.js"></script>
    <script src="<?php echo base_url();?>assets/template/cal/agenda/core/locales/es.js"></script>
    <script src="<?php echo base_url();?>assets/template/cal/agenda/daygrid/main.js"></script>
    <script src="<?php echo base_url();?>assets/template/cal/agenda/timegrid/main.js"></script>
    <script src="<?php echo base_url();?>assets/template/cal/agenda/interaction/main.js"></script>
    <script src="<?php echo base_url();?>assets/template/cal/agenda/bootstrap/main.js"></script>
    <script src="<?php echo base_url();?>assets/template/cal/agenda/list/main.js"></script>  
    <script src="<?php echo base_url();?>assets/template/cal/agenda/moment/main.js"></script>
        <!--DATEPICKER--> 
    <script src="<?php echo base_url();?>assets/template/cal/agenda/datepicker/js/bootstrap-datepicker.min.js"></script>  
    <script src="<?php echo base_url();?>assets/template/cal/agenda/datepicker/js/esp/bootstrap-datepicker.es.min.js"></script> 
    <script src="<?php echo base_url();?>assets/template/dist/js/select2.min.js"></script>
</head>
<script>
    var idcita;
    var calendar;
    document.addEventListener('DOMContentLoaded', function() {
        var crearcalendario = document.getElementById('calendario');

        calendar = new FullCalendar.Calendar(crearcalendario, {
            plugins: [ 'timeGrid' , 'dayGrid' ,'interaction', 'list', 'moment'],    //Plugin de FullCalendar (SOLO LOS NECESARIOS)
            defaultView: 'dayGridMonth',                                            //Vista por defecto (Mes)
            eventLimit: true,                                                       //Limite de events mostrados en la vista del mes
            selectable: true,
            locale: 'es',                                                           //Idioma (Español)
            handleWindowResize: true,
        //--BOTONES EN LA PARTE SUPERIOR DEL CALENDARIO
            events:'<?php echo base_url();?>mantenimiento/agenda/citas_json',
            header: {                                                                                                         
                center: 'title',                                //Titulo 
                left: 'listview,timeGridWeek,dayGridMonth',     //Vista Dia, Semana y Mes
                right: 'addEventButton ,prev,today,next',       //Boton Agregar cita y Botones Anterior, Hoy, siguiente 
            },                                                  
            customButtons: {
                addEventButton: {
                  text: 'Agregar cita',
                    click: function() {
                        $("#addcita").modal();
                    }
                },
                listview: {
                  text: 'Día',
                    click: function() {
                        calendar.changeView('listDay');
                    }
                }  
            },
        //--FIN DE LOS BOTONES
            dateClick: function(info) {
                 calendar.changeView('listDay', info.dateStr);
            },
            eventClick: function(info,event) {
                idcita=info.event.id;
                var h = info.event.extendedProps.hora;
                var res = h.substr(0, 4);
                var m = info.event.extendedProps.hora;
                var res2 = h.substr(4, 9);
                $('#nombreenf').html(info.event.extendedProps.enfermera);
                $('#vistaid').html(info.event.id);
                $('#vistap').html(info.event.title);
                $('#vistaob').html(info.event.extendedProps.observaciones);
                $('#vistaprog').html(info.event.extendedProps.programado);
                $('#vistaexp').html(info.event.extendedProps.expediente);
                $('#vistacdcg').html(info.event.extendedProps.cdgc);
                $('#vistafnac').html(info.event.extendedProps.fecha_nac);
                $('#vistamedonco').html(info.event.extendedProps.medic_onco);
                $('#vistamedonco-no').html(info.event.extendedProps.medic_onco_noval);
                $('#vistaalt').html(info.event.extendedProps.medic_alter);
                $('#vistaalt-no').html(info.event.extendedProps.medic_alter_noval);
                $('#vistapremed').html(info.event.extendedProps.pre_medic);
                $('#vistafrec').html(info.event.extendedProps.frec_ciclo);
                $('#vistamedt').html(info.event.extendedProps.medico);
                $('#vistaf').html(info.event.extendedProps.fecha);
                $('#vistahc').html(info.event.extendedProps.hora);
                $('#vistaestado').html(info.event.extendedProps.estado);
                $('#vistaestado').html(info.event.extendedProps.ob);


                $("#vercita").modal();

                $('#editid').html(info.event.id);
                $('#editexp').html(info.event.extendedProps.expediente);
                $('#editp').html(info.event.extendedProps.paciente); 
                $('#editob').html(info.event.extendedProps.observaciones); 
                $("#editprog").val(info.event.extendedProps.programado);
                $("#edith").val(res);
                $("#editm").val(res2);
                $("#editf").val(info.event.extendedProps.fecha);
                $('#editcdgc').html(info.event.extendedProps.cdgc);
                if(info.event.extendedProps.medic_onco == ""){
                    document.getElementById("editmedonco").setAttribute("readonly","true");
                    document.getElementById("editmedonco").setAttribute("placeholder","No hay medicamentos validados aun");
                }else{
                    $('#editmedonco').html(info.event.extendedProps.medic_onco);
                }
                if(info.event.extendedProps.medic_onco_noval == ""){
                    document.getElementById("editmedonco-no").setAttribute("readonly","true");
                    document.getElementById("editmedonco-no").setAttribute("placeholder","No hay medicamentos aun");
                }else{
                    $('#editmedonco-no').html(info.event.extendedProps.medic_onco_noval);
                }
                if(info.event.extendedProps.medic_alter == ""){
                    document.getElementById("editmedalt").setAttribute("readonly","true");
                    document.getElementById("editmedalt").setAttribute("placeholder","No hay medicamentos alternativos aun");
                }else{
                    $('#editmedalt').html(info.event.extendedProps.medic_alter);
                }
                if(info.event.extendedProps.medic_alter_noval == ""){
                    document.getElementById("editmedalt-no").setAttribute("readonly","true");
                    document.getElementById("editmedalt-no").setAttribute("placeholder","No hay medicamentos alternativos no validados aun");
                }else{
                    $('#editmedalt-no').html(info.event.extendedProps.medic_alter_noval);
                }
                if(info.event.extendedProps.pre_medic == ""){
                    document.getElementById("editpremed").setAttribute("readonly","true");
                    document.getElementById("editpremed").setAttribute("placeholder","No hay premedicacion aun");
                }else{
                    $('#editpremed').html(info.event.extendedProps.pre_medic);
                }
                
                $('#f-actual').html(info.event.extendedProps.fecha);
                $('#editfrec').html(info.event.extendedProps.frec_ciclo);
                $('#editmedt').html(info.event.extendedProps.medico);
                $('#editestado').html(info.event.extendedProps.estado);
                $('#editenf').html(info.event.extendedProps.enfermera);
                $('#editfnac').html(info.event.extendedProps.fecha_nac);
            },
          eventColor: '#27d824'
        });
        calendar.render();
      });
    //DATE PICKER
    $('.datepicker').datepicker({
    });
    $.fn.datepicker.defaults.autoclose = "true";
    $.fn.datepicker.defaults.todayHighlight = "true";
    $.fn.datepicker.defaults.language = "es";
    //FIN DATEPICKER
    //**TRANCICION DE MODAL VER CITA AL DE EDITAR CITA**
    function editarCita(){
        $('#vercita').modal('toggle');
        setTimeout(function abrir()
                    {
                        $('#modaleditar').modal('toggle');
                    }, 500);
    };
    //FIN FUNCIONES
    function buscarpacienteadd(){
        var base_url= "<?php echo base_url();?>";
        var id = $("#exp").val();
        var medicamentos="";
        var medicamentosno="";
        var medicamentosext="";
        var medicamentosalt="";
        var medicamentosaltno="";
        var si=0;
        var si2=0;
        var si3=0;
        var si4=0;
        var si5=0;
        if(id!=""){
            $.ajax({
                url: base_url + "mantenimiento/agenda/buscar_Datos_Pac/" + id,
                type:"POST",
            }).done( function( info ) {
                var datos = JSON.parse( info );
                try {
                    $("#p").val(datos.datos[0].nombrepx+" "+datos.datos[0].apep_pac+" "+datos.datos[0].apem_pac);
                    $("#cdgc").val(datos.datos[0].desdiag);
                    $("#fnac").val(datos.datos[0].fecha_nac);
                    $("#medt").val(datos.datos[0].nombre+" "+datos.datos[0].ape_pat+" "+datos.datos[0].ape_mat);
                    $("#ob").val(datos.datos[0].observacion);
                    //OBTENER MEDICAMENTOS VALIDADOS
                    $.ajax({
                        url: base_url + "mantenimiento/agenda/buscar_Medicamentos_Pac/" + id,
                        type:"POST",
                    }).done( function( info ) {
                        var medicamentosval = JSON.parse( info );
                        try {
                            for (var i in medicamentosval.medicamentosval) {
                                si=1;
                                medicamentos = $("#medonco").val();
                                $("#medonco").val(medicamentos+medicamentosval.medicamentosval[i].nombregen+" - "+medicamentosval.medicamentosval[i].dosis+", \n");
                            }
                            if(si==0){
                                document.getElementById("medonco").setAttribute("readonly","true");
                                document.getElementById("medonco").setAttribute("placeholder","No hay medicamentos validados aun");
                            }
                        }catch(error) {
                        }
                    });
                    //FIN  DE OBTENCION DE MEDICAMENTOS
                    //OBTENCION DE MEDICAMENTOS NO VALIDADOS
                    $.ajax({
                        url: base_url + "mantenimiento/agenda/buscar_Medicamentos_Novali_pac/" + id,
                        type:"POST",
                    }).done( function( info ) {
                        var medicamentosnoval = JSON.parse( info );
                        try {
                            for (var i in medicamentosnoval.medicamentosnoval) {
                                si2=1;
                                medicamentosno = $("#medonco-no").val();
                                $("#medonco-no").val(medicamentosno+medicamentosnoval.medicamentosnoval[i].nombregen+" - "+medicamentosnoval.medicamentosnoval[i].dosis+", \n"); 
                            }
                            if(si2==0){
                                document.getElementById("medonco-no").setAttribute("readonly","true");
                                document.getElementById("medonco-no").setAttribute("placeholder","No hay medicamentos aun");
                            }
                        }catch(error) {
                        }

                    });
                    //FIN DE OBTENCION DE MEDICAMENTO NO VALIDADOS
                    //OBTENCION MEDICAMENTO EXTRAS
                    $.ajax({
                        url: base_url + "mantenimiento/agenda/buscar_Medicamentos_Pre/" + id,
                        type:"POST",
                    }).done( function( info ) {
                        var medicamentosextra = JSON.parse( info );
                        try {
                            for (var i in medicamentosextra.medicamentosextra) {
                                si3=1;
                                medicamentosext = $("#premed").val();
                                $("#premed").val(medicamentosext+medicamentosextra.medicamentosextra[i].medicamento+" - "+medicamentosextra.medicamentosextra[i].dosis+", \n"); 
                            }
                            if(si3==0){
                                document.getElementById("premed").setAttribute("readonly","true");
                                document.getElementById("premed").setAttribute("placeholder","No hay medicamentos extra");
                            }
                        }catch(error) {
                        }
                    });
                    //FIN OBTENCION DE MEDICAMENTOS EXTRA
                    //OBTENCION MEDICAMENTO ALTERNATIVOS VALIDADOS
                    $.ajax({
                        url: base_url + "mantenimiento/agenda/buscar_Medicamentos_Alternativos/" + id,
                        type:"POST",
                    }).done( function( info ) {
                        var medicamentosalter = JSON.parse( info );
                        try {
                            for (var i in medicamentosalter.medicamentosalter) {
                                si4=1;
                                medicamentosalt = $("#medalt").val();
                                $("#medalt").val(medicamentosalt+medicamentosalter.medicamentosalter[i].medicamento+" - "+medicamentosalter.medicamentosalter[i].dosis+", \n"); 
                            }
                            if(si4==0){
                                document.getElementById("medalt").setAttribute("readonly","true");
                                document.getElementById("medalt").setAttribute("placeholder","No hay medicamentos alternativos validados aun");
                            }
                        }catch(error) {
                        }
                    });
                    //FIN OBTENCION DE MEDICAMENTOS ALTERNATIVOS
                    //OBTENCION MEDICAMENTO ALTERNATIVOS NO VALIDADOS
                    $.ajax({
                        url: base_url + "mantenimiento/agenda/buscar_Medicamentos_Alternativos_no/" + id,
                        type:"POST",
                    }).done( function( info ) {
                        var medicamentosalterno = JSON.parse( info );
                        try {
                            for (var i in medicamentosalterno.medicamentosalterno) {
                                si5=1;
                                medicamentosaltno = $("#medalt-no").val();
                                $("#medalt-no").val(medicamentosaltno+medicamentosalterno.medicamentosalterno[i].medicamento+" - "+medicamentosalterno.medicamentosalterno[i].dosis+", \n"); 
                            }
                            if(si5==0){
                                document.getElementById("medalt-no").setAttribute("readonly","true");
                                document.getElementById("medalt-no").setAttribute("placeholder","No hay medicamentos alternativos aun");
                            }
                        }catch(error) {
                        }
                    });
                    //FIN OBTENCION DE MEDICAMENTOS NO ALTERNATIVOS
                    document.getElementById("exp").setAttribute("readonly","true");
                    document.getElementById("exp").setAttribute("title","Para buscar un nuevo numero de expediente pulse el boton izquierdo");
                    document.getElementById("btn-buscar-p").setAttribute("disabled","true");
                    document.getElementById("p").setAttribute("readonly","true");
                    document.getElementById("p").setAttribute("title","Para cambiar el paciente busque un nuevo numero de expediente");
                    document.getElementById("fnac").setAttribute("readonly","true");
                    document.getElementById("fnac").setAttribute("title","Para cambiar este campo busque un nuevo numero de expediente");
                    document.getElementById("cdgc").setAttribute("readonly","true");
                    document.getElementById("cdgc").setAttribute("title","Para cambiar este campo busque un nuevo numero de expediente");
                    document.getElementById("medt").setAttribute("readonly","true");
                    document.getElementById("medt").setAttribute("title","Para cambiar este campo busque un nuevo numero de expediente");
                    document.getElementById("ob").setAttribute("readonly","true");
                    document.getElementById("medt").setAttribute("title","Para cambiar este campo busque un nuevo numero de expediente");
                    swal({
                        title: 'Paciente Encontrado',
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Cerrar'
                    });
                }catch(error) {
                    $("#p").val("");
                    $("#medt").val("");
                    swal({
                        title: 'Paciente No Encontrado',
                        text: "Ingrese un numero de expediente con una receta existente",
                        type: 'error',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Cerrar'
                    });             
                }
            });
        }else{
        }
    }
    function limpiar(){
        document.getElementById("exp").removeAttribute("readonly");
        document.getElementById("exp").removeAttribute("title");
        $("#exp").val("");
        document.getElementById("btn-buscar-p").removeAttribute("disabled");
        document.getElementById("p").removeAttribute("readonly");
        document.getElementById("p").removeAttribute("title");
        $("#p").val("");
        document.getElementById("fnac").removeAttribute("readonly");
        document.getElementById("fnac").removeAttribute("title");
        $("#fnac").val("");
        document.getElementById("cdgc").removeAttribute("readonly");
        document.getElementById("cdgc").removeAttribute("title");
        $("#cdgc").val("");
        document.getElementById("medt").removeAttribute("readonly");
        document.getElementById("medt").removeAttribute("placeholder");
        $("#medt").val("");
        document.getElementById("medonco").removeAttribute("readonly");
        document.getElementById("medonco").removeAttribute("placeholder");
        $("#medonco").val("");
        document.getElementById("medonco-no").removeAttribute("readonly");
        document.getElementById("medonco-no").removeAttribute("placeholder");
        $("#medonco-no").val("");
        document.getElementById("premed").removeAttribute("readonly");
        document.getElementById("premed").removeAttribute("placeholder");
        $("#premed").val("");
        document.getElementById("medalt").removeAttribute("readonly");
        document.getElementById("medalt").removeAttribute("placeholder");
        $("#medalt").val("");
        document.getElementById("medalt-no").removeAttribute("readonly");
        document.getElementById("medalt-no").removeAttribute("placeholder");
        $("#medalt-no").val("");
        document.getElementById("ob").removeAttribute("readonly");
        document.getElementById("ob").removeAttribute("title");
        $("#ob").val("");
    }
    function buscarpacienteedit(){
        var base_url= "<?php echo base_url();?>";
        var id = $("#editexp").val();
        var medicamentos="";
        var medicamentosno="";
        var medicamentosext="";
        var medicamentosalt="";
        var medicamentosaltno="";
        var si=0;
        var si2=0;
        var si3=0;
        var si4=0;
        var si5=0;
        $("#editmedonco-no").val("");
        $("#editmedonco").val("");
        $("#editpremed").val("");
        $("#editmedalt").val("");
        $("#editmedalt-no").val("");
        if(id!=""){
            $.ajax({
            url: base_url + "mantenimiento/agenda/buscar_Datos_Pac/" + id,
            type:"POST",
        }).done( function( info ) {
            var datos = JSON.parse( info );
            try {
                $("#editp").val(datos.datos[0].nombrepx+" "+datos.datos[0].apep_pac+" "+datos.datos[0].apem_pac);
                $("#editmedt").val(datos.datos[0].nombre+" "+datos.datos[0].ape_pat+" "+datos.datos[0].ape_mat);
                $("#editcdgc").val(datos.datos[0].desdiag);
                $("#editfnac").val(datos.datos[0].fecha_nac);
                $("#editob").val(datos.datos[0].observacion);
                //OBTENCION DE MEDICAMENTOS VALIDADOS
                $.ajax({
                    url: base_url + "mantenimiento/agenda/buscar_Medicamentos_Pac/" + id,
                    type:"POST",
                }).done( function( info ) {
                    var medicamentosval = JSON.parse( info );
                    try {
                        for (var i in medicamentosval.medicamentosval) {
                            si=1;
                            medicamentos = $("#editmedonco").val();
                            $("#editmedonco").val(medicamentos+medicamentosval.medicamentosval[i].nombregen+" - "+medicamentosval.medicamentosval[i].dosis+", \n"); 
                        }
                        if(si==0){
                            document.getElementById("editmedonco").setAttribute("readonly","true");
                            document.getElementById("editmedonco").setAttribute("placeholder","No hay medicamentos validados aun");
                        }else{
                            document.getElementById("editmedonco").removeAttribute("readonly");
                            document.getElementById("editmedonco").removeAttribute("placeholder");
                        }
                    }catch(error) {
                    }
                });
                //OBTENCION DE MEDICAMENTOS NO VALIDADOS
                $.ajax({
                    url: base_url + "mantenimiento/agenda/buscar_Medicamentos_Novali_pac/" + id,
                    type:"POST",
                }).done( function( info ) {
                    var medicamentosnoval = JSON.parse( info );
                    try {
                        for (var i in medicamentosnoval.medicamentosnoval) {
                            si2=1;
                            medicamentosno = $("#editmedonco-no").val();
                            $("#editmedonco-no").val(medicamentosno+medicamentosnoval.medicamentosnoval[i].nombregen+" - "+medicamentosnoval.medicamentosnoval[i].dosis+", \n"); 
                        }
                        if(si2==0){
                            document.getElementById("editmedonco-no").setAttribute("readonly","true");
                            document.getElementById("editmedonco-no").setAttribute("placeholder","No hay medicamentos aun");
                        }else{
                            document.getElementById("editmedonco-no").removeAttribute("readonly");
                            document.getElementById("editmedonco-no").removeAttribute("placeholder");
                        }
                    }catch(error) {}
                });
                //OBTENCION MEDICAMENTO EXTRAS
                $.ajax({
                    url: base_url + "mantenimiento/agenda/buscar_Medicamentos_Pre/" + id,
                    type:"POST",

                    }).done( function( info ) {
                    var medicamentosextra = JSON.parse( info );
                    try {
                        for (var i in medicamentosextra.medicamentosextra) {
                            si3=1;
                            medicamentosext = $("#editpremed").val();
                            $("#editpremed").val(medicamentosext + medicamentosextra.medicamentosextra[i].medicamento+" - "+medicamentosextra.medicamentosextra[i].dosis+", \n"); 
                        }
                        if(si3==0){
                            document.getElementById("editpremed").setAttribute("readonly","true");
                            document.getElementById("editpremed").setAttribute("placeholder","No hay medicamentos extra");
                        }else{
                            document.getElementById("editpremed").removeAttribute("readonly");
                            document.getElementById("editpremed").removeAttribute("placeholder");
                        }
                    }catch(error) {}
                });
                //FIN OBTENCION DE MEDICAMENTOS EXTRA
                //OBTENCION MEDICAMENTO ALTERNATIVOS VALIDADOS
                    $.ajax({
                        url: base_url + "mantenimiento/agenda/buscar_Medicamentos_Alternativos/" + id,
                        type:"POST",
                    }).done( function( info ) {
                        var medicamentosalter = JSON.parse( info );
                        try {
                            for (var i in medicamentosalter.medicamentosalter) {
                                si4=1;
                                medicamentosalt = $("#editmedalt").val();
                                $("#editmedalt").val(medicamentosalt+medicamentosalter.medicamentosalter[i].medicamento+" - "+medicamentosalter.medicamentosalter[i].dosis+", \n"); 
                            }
                            if(si4==0){
                                document.getElementById("editmedalt").setAttribute("readonly","true");
                                document.getElementById("editmedalt").setAttribute("placeholder","No hay medicamentos alternativos validados aun");
                            }else{
                                document.getElementById("editmedalt").removeAttribute("readonly");
                                document.getElementById("editmedalt").removeAttribute("placeholder");
                            }
                        }catch(error) {
                        }
                    });
                //FIN OBTENCION DE MEDICAMENTOS ALTERNATIVOS
                //OBTENCION MEDICAMENTO ALTERNATIVOS NO VALIDADOS
                $.ajax({
                        url: base_url + "mantenimiento/agenda/buscar_Medicamentos_Alternativos_no/" + id,
                        type:"POST",
                    }).done( function( info ) {
                        var medicamentosalterno = JSON.parse( info );
                        try {
                            for (var i in medicamentosalterno.medicamentosalterno) {
                                si5=1;
                                medicamentosaltno = $("#editmedalt-no").val();
                                $("#editmedalt-no").val(medicamentosaltno+medicamentosalterno.medicamentosalterno[i].medicamento+" - "+medicamentosalterno.medicamentosalterno[i].dosis+", \n"); 
                            }
                            if(si5==0){
                                document.getElementById("editmedalt-no").setAttribute("readonly","true");
                                document.getElementById("editmedalt-no").setAttribute("placeholder","No hay medicamentos alternativos aun");
                            }else{
                                document.getElementById("editmedalt-no").removeAttribute("readonly");
                                document.getElementById("editmedalt-no").removeAttribute("placeholder");
                            }
                        }catch(error) {
                        }
                    });
                    //FIN OBTENCION DE MEDICAMENTOS NO ALTERNATIVOS
                document.getElementById("editexp").setAttribute("readonly","true");
                document.getElementById("editexp").setAttribute("title","Para buscar un nuevo numero de expediente pulse el boton izquierdo");
                document.getElementById("btn-buscar-p-edit").setAttribute("disabled","true");
                document.getElementById("editp").setAttribute("readonly","true");
                document.getElementById("editp").setAttribute("title","Para cambiar el paciente busque un nuevo numero de expediente");
                document.getElementById("editfnac").setAttribute("readonly","true");
                document.getElementById("editfnac").setAttribute("title","Para cambiar este campo busque un nuevo numero de expediente");
                document.getElementById("editcdgc").setAttribute("readonly","true");
                document.getElementById("editcdgc").setAttribute("title","Para cambiar este campo busque un nuevo numero de expediente");
                document.getElementById("editmedt").setAttribute("readonly","true");
                document.getElementById("editmedt").setAttribute("title","Para cambiar este campo busque un nuevo numero de expediente");


                

                swal({
                    title: 'Paciente Encontrado',
                    type: 'success',
                    text: "Los Campos Han Sido Editados",
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Cerrar'
                });

            }catch(error) {
                $("#editp").val("");
                $("#editmedt").val("");
                swal({
                    title: 'Paciente No Encontrado',
                    text: "Ingrese un numero de expediente con una receta existente",
                    type: 'error',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Cerrar'
                });             
            }
        });
        }else{}
    }
    function limpiaredit(){
        document.getElementById("editexp").removeAttribute("readonly");
        document.getElementById("editexp").removeAttribute("title");
        $("#editexp").val("");
        document.getElementById("btn-buscar-p-edit").removeAttribute("disabled");
        document.getElementById("editp").removeAttribute("readonly");
        document.getElementById("editp").removeAttribute("title");
        $("#editp").val("");
        document.getElementById("editfnac").removeAttribute("readonly");
        document.getElementById("editfnac").removeAttribute("title");
        $("#editfnac").val("");
        document.getElementById("editcdgc").removeAttribute("readonly");
        document.getElementById("editcdgc").removeAttribute("title");
        $("#editcdgc").val("");
        document.getElementById("editmedt").removeAttribute("readonly");
        document.getElementById("editmedt").removeAttribute("placeholder");
        $("#editmedt").val("");
        document.getElementById("editmedonco").removeAttribute("readonly");
        document.getElementById("editmedonco").removeAttribute("placeholder");
        $("#editmedonco").val("");
        document.getElementById("editmedonco-no").removeAttribute("readonly");
        document.getElementById("editmedonco-no").removeAttribute("placeholder");
        $("#editmedonco-no").val("");
        document.getElementById("editpremed").removeAttribute("readonly");
        document.getElementById("editpremed").removeAttribute("placeholder");
        $("#editpremed").val("");
        document.getElementById("editmedalt").removeAttribute("readonly");
        document.getElementById("editmedalt").removeAttribute("placeholder");
        $("#editmedalt").val("");
        document.getElementById("editmedalt-no").removeAttribute("readonly");
        document.getElementById("editmedalt-no").removeAttribute("placeholder");
        $("#editmedalt-no").val("");
        document.getElementById("editob").removeAttribute("readonly");
        document.getElementById("editob").removeAttribute("title");
        $("#editob").val("");
    }
    function delet(){
        var base_url= "<?php echo base_url();?>";
        var id = idcita;
        swal({
            title: 'Eliminar',
            text: "¿Esta seguro que desea eliminar esta cita?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar'
        }).then((result)=>{
            if(result.value){
                $.ajax({
                    url: base_url + "mantenimiento/agenda/eliminar/" + id,
                    type:"POST",
                    success:function(resp){
                        window.location.href = base_url + resp;
                    }
                });
            }
        })
    };

    $(document).ready(function(){
        var base_url= "<?php echo base_url();?>";
        $('#tcama').select2();
        $('#edittcama').select2();
        $('#tcama').change(function(){
            $("#tcama option:selected").each(function(){
                ticama = $(this).val();
                if(ticama==0){
                    $.ajax({

                        url: base_url + "mantenimiento/Agenda/camas/" + ticama,
                        type:"POST",

                    }).done( function( info ) {
                        var cama = JSON.parse( info );
                        var html="";
                        for (var i in cama.cama) {

                            html += `   
                                    <option value="${cama.cama[i].descripcion}"> ${cama.cama[i].descripcion} </option>
                                    `
                        }
                        $("#cama").html( html );

                    });
                }else{
                    if(ticama==1){
                        $.ajax({

                            url: base_url + "mantenimiento/Agenda/camas2/" + ticama,
                            type:"POST",

                        }).done( function( info ) {
                            var cama = JSON.parse( info );
                            var html="";
                            for (var i in cama.cama) {

                                html += `   
                                        <option value="${cama.cama[i].descripcion}"> ${cama.cama[i].descripcion} </option>
                                            `
                            }
                            $("#cama").html( html );

                        });             
                    }else{
                        var html1="";
                        html1 += `   
                                    <option value=""></option>
                                `
                        $("#cama").html( html1 );
                    }
                }

            });
        });
        $('#edittcama').change(function(){
            $("#edittcama option:selected").each(function(){
                ticama2 = $(this).val();
                if(ticama2==0){
                    $.ajax({

                        url: base_url + "mantenimiento/Agenda/camas/" + ticama2,
                        type:"POST",

                    }).done( function( info ) {
                        var cama = JSON.parse( info );
                        var html="";
                        for (var i in cama.cama) {

                            html += `   
                                    <option value="${cama.cama[i].descripcion}"> ${cama.cama[i].descripcion} </option>
                                    `
                        }
                        $("#editcama").html( html );

                    });
                }else{
                    if(ticama2==1){
                        $.ajax({

                            url: base_url + "mantenimiento/Agenda/camas2/" + ticama2,
                            type:"POST",

                        }).done( function( info ) {
                            var cama = JSON.parse( info );
                            var html="";
                            for (var i in cama.cama) {

                                html += `   
                                        <option value="${cama.cama[i].descripcion}"> ${cama.cama[i].descripcion} </option>
                                            `
                            }
                            $("#editcama").html( html );

                        });             
                    }else{
                        var html1="";
                        html1 += `   
                                    <option value=""></option>
                                `
                        $("#editcama").html( html1 );
                    }
                }

            });
        });



    });

</script>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section name= "cabeza" id="cabeza" class="content-header">
            <h1>
            Agenda
            <small>Calendario</small>
            </h1>
            <meta charset="utf-8">
        </section>
        <section class="content">
            <?php if($this->session->flashdata("exitosave")):?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("exitosave"); ?></p>
                </div>
            <?php endif;?>
            <?php if($this->session->flashdata("actualizar")):?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("actualizar"); ?></p>
                </div>
            <?php endif;?>
            <?php if($this->session->flashdata("hecho")):?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-check"></i><?php echo $this->session->flashdata("hecho"); ?></p>
                </div>
            <?php endif;?>
            <?php if($this->session->flashdata("ocupado")):?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("ocupado"); ?></p>
                </div>
            <?php endif;?>
            <div class="box box-success box-solid">
                <div class="box-header with-border"></div>
                <div class="row"> 
                    <div class="box-body">
                        <div  class="col-md-12" id="calendario"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>   
    <!--========================================
        =             MODALES USADOS           =
        ========================================-->
        <!-- Modal vista de las citas -->
            <div class="modal fade bd-example-modal-lg" id="vercita" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="color:green;" id="vistap"><!--Nombre del Paciente--></h4>
                        <!--<h4 class="modal-title" style="color:blue;" name="vistaid" id="vistaid"></h4>borar-->
                    </div>
                    <div class="modal-body">
                        <div class="box box-success box-solid">
                            <div class="box-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-3"><label>EXPEDIENTE: </label><div id="vistaexp"></div></div>
                                            <div class="col-xs-3"><label>PROGRAMADO: </label><div id="vistaprog"></div></div>
                                            <div class="col-xs-3"><label>FECHA DE NACIMIENTO: </label><div id="vistafnac"></div></div>
                                            <div class="col-xs-3"><label>CARPETA DE GC: </label><div id="vistacdcg"></div></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box box-danger box-solid">
                            <div class="box-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-12"><label>OBSERVACIONES: </label>
                                                <textarea style="border-color: transparent;resize:none;" class="col-xs-12" id="vistaob" rows="2" readonly=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box box-primary box-solid">
                            <div class="box-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-12"><label>MEDICAMENTOS ONCOLOGICOS <small>(Validados)</small>: </label>
                                                <textarea style="border-color: transparent;resize:none;" class="col-xs-12" id="vistamedonco" rows="2" readonly>
                                                </textarea>
                                                <!--<div id="vistamedonco"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box box-warning box-solid">
                            <div class="box-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-12"><label>MEDICAMENTOS ONCOLOGICOS <small>(No Validados)</small>: </label>
                                                <textarea style="border-color: transparent;resize:none;" class="col-xs-12" id="vistamedonco-no" rows="2" readonly></textarea>
                                                <!--<div id="vistamedonco-no"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box box-primary box-solid">
                            <div class="box-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-12"><label>MEDICAMENTOS ALTERNATIVOS <small>(Validados)</small>: </label>
                                                <textarea style="border-color: transparent;resize:none;" class="col-xs-12" id="vistaalt" rows="2" readonly>
                                                </textarea>
                                                <!--<div id="vistaalt"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box box-warning box-solid">
                            <div class="box-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-12"><label>MEDICAMENTOS ALTERNATIVOS <small>(No Validados)</small>: </label>
                                                <textarea style="border-color: transparent;resize:none;" class="col-xs-12" id="vistaalt-no" rows="2" readonly>
                                                </textarea>
                                                <!--<div id="vistaalt-no"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box box-primary box-solid">
                            <div class="box-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-12"><label>PREMEDICACION: </label>
                                                <textarea style="border-color: transparent;resize:none;" class="col-xs-12" id="vistapremed" rows="2" readonly>
                                                </textarea>
                                                <!--<div id="vistapremed"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box box-warning box-solid">
                            <div class="box-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-4"><label>MEDICO TRATANTE: </label><div id="vistamedt"></div></div>
                                            <div class="col-xs-4"><label>FRECUENCIA: </label><div id="vistafrec"></div></div>
                                            <div class="col-xs-4"><label>ESTADO: </label><div id="vistaestado"></div></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box box-danger box-solid">
                            <div class="box-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-6"><label>FECHA DE LA CITA: </label><div id="vistaf"></div></div>
                                            <div class="col-xs-6"><label>HORA: </label><div id="vistahc"></div></div>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                  </div>
                  <CENTER>Agendada Por:<h5 class="modal-title" style="color:black;" id="nombreenf"></h5></CENTER>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" >CERRAR <span class="fa fa-close"></button>
                    <button type="button" onclick="editarCita()" class="btn btn-warning pull-right">EDITAR <span class="fa fa-pencil"></button>
                    <button type="button" onclick="delet()" class="btn btn-danger pull-right">ELIMINAR <span class="fa fa-trash"></button>
                  </div>
                </div>
              </div>
            </div>
        <!--Modal agregar-->
            <div class="modal modal-success fade" id="addcita">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Agregar Cita</h4>
                        </div>
                        <form action="<?php echo base_url();?>mantenimiento/agenda/store" method="POST">
                        <div class="modal-body">
                <!--CONTENIDO DEL MODAL-->
                <div class="row">
                    <div class="col-md-6">
                            <DIV>
                                <div>
                                    <label>EXPEDIENTE</label>
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button  type="button" id="btn-buscar-limpiar" onclick="limpiar()" class="btn btn-danger btn-flat" title="Limpiar busqueda"><span class="fa fa-remove"></span></button>
                                        </div> 
                                        <input class="form-control" name="exp" id="exp" type="text" onchange="javascript:this.value=this.value.toUpperCase();" required>
                                        <div class="input-group-btn">
                                            <button  type="button" id="btn-buscar-p" onclick="buscarpacienteadd()" class="btn btn-info btn-flat" title="Buscar Paciente"><span class="fa fa-search"></span></button>
                                        </div> 
                                    </div>
                                </div>
                            </DIV>
                            <DIV>
                                <div>
                                    <label>PROGRAMADO</label>
                                </div>
                                <div class="input-group">
                                    <div>
                                        <select name="prog" id="prog" class="form-control" onchange="javascript:this.value=this.value.toUpperCase();" required>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="input-group-addon">
                                        <span class="fa fa-question-circle"></span>
                                    </div>
                                </div>
                            </DIV>
                            <DIV>
                                <div>
                                    <label>PACIENTE</label>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" name="p" id="p" type="text" onchange="javascript:this.value=this.value.toUpperCase();" required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-user"></span>
                                    </div>
                                </div>
                            </DIV>
                            <DIV>
                                <div>
                                    <label>OBSERVACIONES</label>
                                </div>
                                <div class="input-group">
                                    <textarea class="form-control" style="resize:none;" name="ob" id="ob" type="text" onchange="javascript:this.value=this.value.toUpperCase();" rows="2" required></textarea>
                                    <div class="input-group-addon">
                                        <span class="fa fa-eye"></span>
                                    </div>
                                </div>
                            </DIV>
                            <DIV>
                                <div>
                                    <label>FECHA DE NACIMIENTO</label>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" name="fnac" id="fnac" type="text" onchange="javascript:this.value=this.value.toUpperCase();" required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </DIV>
                            <DIV>
                                <div>
                                    <label>CARPETA DE GC</label>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" name="cdgc" id="cdgc" type="text" onchange="javascript:this.value=this.value.toUpperCase();" required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-heartbeat"></span>
                                    </div>
                                </div>
                            </DIV> 
                            <DIV>
                                <div>
                                    <label>MEDICO TRATANTE</label>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" name="medt" id="medt" type="text" onchange="javascript:this.value=this.value.toUpperCase();" required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-user-md"></span>
                                    </div>
                                </div>
                            </DIV>

                            <DIV>
                                <div>
                                    <label>TIPO DE CAMA</label>
                                </div>
                                <div class="input-group">
                                    <select style=" width:100%;height:150px;" name="tcama" id="tcama" class="form-control" required>
                                            <option style="opacity: 0.1" value="na">Seleciona un tipo de cama</option>
                                            <option value="0">Piso</option>
                                            <option value="1">Ambulatoria</option>
                                    </select>
                                    <div class="input-group-addon">
                                        <span class="fa fa-bed"></span>
                                    </div>
                                </div>
                            </DIV>
                            <DIV>
                                <div class="input-group">
                                    <label>NUMERO DE CAMA</label>
                                </div>
                                <div class="input-group">
                                    <select  name="cama" id="cama" class="form-control" required>
                                    </select>
                                    <div class="input-group-addon">
                                        <span class="fa fa-bed"></span>
                                    </div>
                                </div>
                            </DIV>




                            <DIV>
                                <div>
                                    <label>ESTADO</label>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" name="estadoc" id="estadoc" type="text" onchange="javascript:this.value=this.value.toUpperCase();" required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-hourglass-start"></span>
                                    </div>
                                </div>
                            </DIV> 
                            <DIV>
                                <div>
                                    <label>FRECUENCIA</label>
                                </div>
                                <div class="input-group">
                                    <input class="form-control" name="frec" id="frec" type="text" required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-refresh"></span>
                                    </div>
                                </div>
                            </DIV>
                    </div>

                    <div class="col-md-6">
                            <DIV>
                                <div>
                                    <label>MEDICAMENTOS ONCOLOGICOS <small>(Validados)</small></label>
                                </div>
                                <div class="input-group">
                                    <textarea style="resize:none;" name="medonco" id="medonco" class="form-control" rows="3" required></textarea>
                                    <div class="input-group-addon">
                                        <span class="fa fa-medkit"></span>
                                    </div>
                                </div>
                            </DIV>
                            <DIV>
                                <div>
                                    <label>MEDICAMENTOS ONCOLOGICOS <small>(No Validados)</small></label>
                                </div>
                                <div class="input-group">
                                    <textarea style="resize:none;" name="medonco-no" id="medonco-no" class="form-control" rows="3" required></textarea>
                                    <div class="input-group-addon">
                                        <span class="fa fa-medkit"></span>
                                    </div>
                                </div>
                            </DIV>
                            <DIV>
                                <div>
                                    <label>MEDICAMENTOS ALTERNATIVOS <small>(Validados)</small></label>
                                </div>
                                <div class="input-group">
                                    <textarea style="resize:none;" name="medalt" id="medalt" class="form-control" rows="3" required></textarea>
                                    <div class="input-group-addon">
                                        <span class="fa fa-medkit"></span>
                                    </div>
                                </div>
                            </DIV>
                            <DIV>
                                <div>
                                    <label>MEDICAMENTOS ALTERNATIVOS <small>(No Validados)</small></label>
                                </div>
                                <div class="input-group">
                                    <textarea style="resize:none;" name="medalt-no" id="medalt-no" class="form-control" rows="3" required></textarea>
                                    <div class="input-group-addon">
                                        <span class="fa fa-medkit"></span>
                                    </div>
                                </div>
                            </DIV>
                            <DIV>
                                <div>
                                    <label>PREMEDICACION</label>
                                </div>
                                <div class="input-group">
                                    <textarea style="resize:none" name="premed" id="premed" class="form-control" rows="3"></textarea>
                                    <div class="input-group-addon">
                                        <span class="fa fa-medkit"></span>
                                    </div>
                                </div>
                            </DIV>
                            <DIV>
                                <div>
                                    <label>FECHA</label>
                                </div>
                                <div class="input-group date" data-provide="datepicker" l>
                                    <input name="f" id="f" type="text" class="form-control" required>
                                    <div class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                            </DIV>
                            <DIV class="input-group col-md-12">
                                <div>
                                    <label>HORA</label>
                                </div>
                                <div class="input-group col-md-12" >
                                    <div class="col-md-12-3">
                                        <select name="h" id="h" class="form-control" required>
                                            <option value="T00:">00</option>
                                            <option value="T01:">01</option>
                                            <option value="T02:">02</option>
                                            <option value="T03:">03</option> 
                                            <option value="T04:">04</option>
                                            <option value="T05:">05</option>
                                            <option value="T06:">06</option>
                                            <option value="T07:">07</option>
                                            <option value="T08:">08</option>
                                            <option value="T09:">09</option>
                                            <option value="T10:">10</option>
                                            <option value="T11:">11</option>
                                            <option value="T12:">12</option>
                                            <option value="T13:">13</option>
                                            <option value="T14:">14</option>
                                            <option value="T15:">15</option>
                                            <option value="T16:">16</option>
                                            <option value="T17:">17</option>
                                            <option value="T18:">18</option>
                                            <option value="T19:">19</option>
                                            <option value="T20:">20</option>
                                            <option value="T21:">21</option>
                                            <option value="T22:">22</option>
                                            <option value="T23:">23</option>
                                        </select>
                                    </div>
                                    <div class="input-group-addon">
                                        <b>:</b>
                                    </div>
                                    <div class="col-md-12-3">
                                        <select name="m" id="m" class="form-control" required>
                                            <option value="00:00">00</option>
                                            <option value="30:00">30</option>
                                        </select>
                                    </div>
                                    <div class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </div>
                                </div>
                            </DIV>
                    </div>
                </div>
                                       
                <!--FIN DEL CONTENIDO DEL MODAL -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar <span class="fa fa-close"></span></button>
                            <button type="submit" id="agregarc" class="btn btn-success btn-outline">Guardar Cita <span class="fa fa-save"></span></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!--Modal editar-->
            <div class="modal modal-warning fade" id="modaleditar">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">EDITAR CITA</h4>
                        </div>
                        <form action="<?php echo base_url();?>mantenimiento/agenda/update" method="POST">
                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-6">
                                        <DIV hidden>
                                            <div>
                                                <label hidden >ID CITA</label>
                                            </div>
                                            <div class="input-group" hidden>
                                                <textarea style="color:red; resize:none; border-color:red;" name="editid" id="editid" class="form-control" rows="1" title="Este Campo No puede ser editado" readonly></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-folder-open"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>EXPEDIENTE</label>
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-btn">
                                                    <button  type="button" id="btn-eliminar-p-edit" title="Limpiar busqueda" onclick="limpiaredit()" class="btn btn-danger btn-flat"><span class="fa fa-remove"></span></button>
                                                </div> 
                                                <textarea style=" resize:none" name="editexp" id="editexp" class="form-control" rows="1" required></textarea>
                                                <div class="input-group-btn">
                                                    <button  type="button" id="btn-buscar-p-edit" onclick="buscarpacienteedit()" class="btn btn-info btn-flat" title="Buscar Paciente"><span class="fa fa-search"></span></button>
                                                </div> 
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>PROGRAMADO</label>
                                            </div>
                                            <div class="input-group">
                                                <div>
                                                    <select name="editprog" id="editprog" class="form-control" required>
                                                        <option value="NO">NO</option>
                                                        <option value="SI">SI</option>
                                                    </select>
                                                </div>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-question-circle"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>PACIENTE</label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none" id="editp" name="editp" class="form-control" rows="1" required readonly></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-user"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>OBSERVACIONES</label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none" id="editob" name="editob" class="form-control" rows="2" required readonly></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-eye"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>CARPETA DE GC</label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none" name="editcdgc" id="editcdgc" class="form-control" rows="1" readonly required></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-heartbeat"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>FECHA DE NACIMIENTO</label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none" id="editfnac" name="editfnac" class="form-control" rows="1" required readonly></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>MEDICO TRATANTE</label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none" name="editmedt" id="editmedt" class="form-control" rows="1" required readonly></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-user-md"></span>
                                                </div>
                                            </div>
                                        </DIV>

                                        <DIV>
                                            <div>
                                                <label>TIPO DE CAMA</label>
                                            </div>
                                            <div class="input-group">
                                                <select style=" width:100%;height:150px;" name="edittcama" id="edittcama" class="form-control" required>
                                                        <option style="opacity: 0.1" value="na">Seleciona un tipo de cama</option>
                                                        <option value="0">Piso</option>
                                                        <option value="1">Ambulatoria</option>
                                                </select>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-bed"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div class="input-group">
                                                <label>NUMERO DE CAMA</label>
                                            </div>
                                            <div class="input-group">
                                                <select  name="editcama" id="editcama" class="form-control" required>
                                                </select>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-bed"></span>
                                                </div>
                                            </div>
                                        </DIV>

                                        <DIV>
                                            <div>
                                                <label>FRECUENCIA</label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none" name="editfrec" id="editfrec" class="form-control" rows="1" required></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-refresh"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>ESTADO</label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none" id="editestado" name="editestado" class="form-control" rows="1" required></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-hourglass-start"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                    </div>

                                    <div class="col-md-6">
                                        <DIV>
                                            <div>
                                                <label>MEDICAMENTOS ONCOLOGICOS(Validados)</label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none" name="editmedonco" id="editmedonco" class="form-control" rows="3"></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-medkit"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>MEDICAMENTOS ONCOLOGICOS(No Validados)</label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none" name="editmedonco-no" id="editmedonco-no" class="form-control" rows="3"></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-medkit"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>MEDICAMENTOS ALTERNATIVOS <small>(Validados)</small></label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none;" name="editmedalt" id="editmedalt" class="form-control" rows="3" onchange="javascript:this.value=this.value.toUpperCase();" required></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-medkit"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>MEDICAMENTOS ALTERNATIVOS <small>(No Validados)</small></label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none;" name="editmedalt-no" id="editmedalt-no" class="form-control" rows="3" onchange="javascript:this.value=this.value.toUpperCase();" required></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-medkit"></span>
                                                </div>
                                            </div>
                                        <DIV>
                                            <div>
                                                <label>PREMEDICACION</label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none" name="editpremed" id="editpremed" class="form-control" rows="3"></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-medkit"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV>
                                            <div>
                                                <label>FECHA: <small id="f-actual"></small> <small>(Fecha Actual)</small></label>
                                            </div>
                                            <div class="input-group date" data-provide="datepicker" >
                                                <input name="editf" id="editf" type="text" class="form-control" required>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                        <DIV class="input-group col-md-12">
                                            <div>
                                                <label>HORA</label>
                                            </div>
                                            <div class="input-group col-md-12" >
                                                <div class="col-md-12-3">
                                                    <select  name="edith" id="edith" class="form-control" required>
                                                        <option value="T00:">00</option>
                                                        <option value="T01:">01</option>
                                                        <option value="T02:">02</option>
                                                        <option value="T03:">03</option> 
                                                        <option value="T04:">04</option>
                                                        <option value="T05:">05</option>
                                                        <option value="T06:">06</option>
                                                        <option value="T07:">07</option>
                                                        <option value="T08:">08</option>
                                                        <option value="T09:">09</option>
                                                        <option value="T10:">10</option>
                                                        <option value="T11:">11</option>
                                                        <option value="T12:">12</option>
                                                        <option value="T13:">13</option>
                                                        <option value="T14:">14</option>
                                                        <option value="T15:">15</option>
                                                        <option value="T16:">16</option>
                                                        <option value="T17:">17</option>
                                                        <option value="T18:">18</option>
                                                        <option value="T19:">19</option>
                                                        <option value="T20:">20</option>
                                                        <option value="T21:">21</option>
                                                        <option value="T22:">22</option>
                                                        <option value="T23:">23</option>
                                                    </select>
                                                </div>
                                                <div class="input-group-addon">
                                                    <b>:</b>
                                                </div>
                                                <div class="col-md-12-3">
                                                    <select name="editm" id="editm" class="form-control" required>
                                                        <option value="00:00">00</option>
                                                        <option value="30:00">30</option>
                                                    </select>
                                                </div>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-clock-o"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                    </div>

                                </div><!--div del row-->

                                    <div class="col-md-12">
                                        <br>
                                        <DIV>
                                            <div align="center">
                                                <label>Agendador(a)</label>
                                            </div>
                                            <div class="input-group">
                                                <textarea style="resize:none" name="editenf" id="editenf" class="form-control" rows="1" required readonly></textarea>
                                                <div class="input-group-addon">
                                                    <span class="fa fa-user"></span>
                                                </div>
                                            </div>
                                        </DIV>
                                    </div>
                        
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">CANCELAR <span class="fa fa-close"></span></button>
                                <button type="submit" class="btn btn-success btn-success">GUARDAR CAMBIOS <span class="fa fa-save"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <!--========================================
        =             FIN DE USADOS           =
        ========================================-->
</body>


