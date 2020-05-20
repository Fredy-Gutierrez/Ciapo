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
</head>

<script>
    var idcita;
    var calendar;
    document.addEventListener('DOMContentLoaded', function() {
        var crearcalendario = document.getElementById('calendario-f');

        calendar = new FullCalendar.Calendar(crearcalendario, {
            plugins: [ 'timeGrid' , 'dayGrid' ,'interaction', 'list', 'moment'],    //Plugin de FullCalendar (SOLO LOS NECESARIOS)
            defaultView: 'dayGridMonth',                                            //Vista por defecto (Mes)
            eventLimit: true,                                                       //Limite de events mostrados en la vista del mes
            selectable: true,
            locale: 'es',                                                           //Idioma (Español)
            handleWindowResize: true,
        //--BOTONES EN LA PARTE SUPERIOR DEL CALENDARIO
            events:'<?php echo base_url();?>mantenimiento/farmacia/citas_json',
            header: {                                                                                                         
                center: 'title',                                //Titulo 
                left: 'listview,timeGridWeek,dayGridMonth',     //Vista Dia, Semana y Mes
                right: 'addEventButton ,prev,today,next',       //Boton Agregar cita y Botones Anterior, Hoy, siguiente 
            },       
            customButtons: {
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
            },
          eventColor: '#dd4b39'
        });
        calendar.render();
      });
</script>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section name= "cabeza" id="cabeza" class="content-header">
            <h1>
            FARMACIA
            <small>Calendario</small>
            </h1>
            <meta charset="utf-8">
        </section>
        <section class="content">
            <div class="box box-danger box-solid">
            <div class="box-header with-border"></div>
            <div class="row"> 
            <div class="box-body">
                <!-- Main content -->
                <div  class="col-md-12" id="calendario-f"></div>
            </div>
            </div>
            </div> 
        </section>
        <!-- /.content -->
    </div>
    <!--MODALES USADOS-->
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
                                                <textarea style="border-color: transparent;resize:none;" class="col-xs-12" id="vistaob" rows="3" readonly=""></textarea>
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
                                            <div class="col-xs-4"><label>MEDICO TRATANTE: </label><div class="col-md-12" id="vistamedt"></div></div>
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
                  </div>
                </div>
              </div>
            </div>
    <!--FIN MODALES USADOS-->
</body>


