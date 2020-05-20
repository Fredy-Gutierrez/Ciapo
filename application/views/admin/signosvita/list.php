<style type="text/css">
    
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Signos Vitales
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <!--<a href="<?php echo base_url();?>mantenimiento/procedimiento/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Procedimiento</a>
                   
                        <a href="<?php echo base_url();?>mantenimiento/procedimiento/inactivos" class="btn btn-danger btn-flat"><span class="fa fa-plus"></span> Ver Inactivos</a>
                        <a href="<?php echo base_url();?>mantenimiento/procedimiento/index" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Ver Activos</a>-->

                        <?php if($this->session->flashdata("errors")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("errors"); ?></p>
                             </div>
                        <?php endif;?>
                    </div>
                </div>
                <hr>
                <form action="" method="POST">
                    <div  class="form-group">
                        <label for="expediente">Reporte:</label><br>
                            <select  style=" width:70px;height:25px" name="tipo" id="tipo" required>
                                <option value="diario"> Diario </option>
                                <option value="semanal"> Semanal </option>
                                <option value="mensual"> Mensual </option>
                            </select>
                                            
                        <input type="date" style=" width:120px;height:25px" id="fecha" name="fecha" required>             
                        
                        <button type="submit" class="btn btn-success" onclick=this.form.action="<?php echo base_url();?>mantenimiento/signosvita/generar_excel">
                            <i class="fa fa-print"></i>
                        </button>
                                    

                    </div>
                </form>

                <div class="row">
                    <div class="table-responsive col-md-12">
                        <table id="example1" class="table table-bordered table-hover" >
                            <thead >
                                <tr >
                                    <th><center>CNS</center></th>
                                    <th><center>NO_EXPEDIENTE</center></th>
                                    <th><center>PESO</center></th>
                                    <th><center>ESTATURA</center></th>
                                    <th><center>IMC</center></th>
                                    <th><center>TEMPERATURA</center></th>
                                    <th><center>FRECUENCIA CARDIACA</center></th>
                                    <th><center>FRECUENCIA RESPIRATORIA</center></th>
                                    <th><center>TENSION ARTERIAL</center></th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($signosvita)):?>
                                    <?php foreach($signosvita as $signosvitales):?>
                                        <tr align="center">
                                            <td><?php echo $signosvitales->cns;?></td>
                                            <td><?php echo $signosvitales->no_exp;?></td>
                                            <td><?php echo $signosvitales->peso;?></td>
                                            <td><?php echo $signosvitales->estatura;?></td>
                                            <td><?php echo $signosvitales->imc;?></td>
                                            <td><?php echo $signosvitales->temperatura;?></td>
                                            <td><?php echo $signosvitales->fc;?></td>
                                            <td><?php echo $signosvitales->fr;?></td>
                                            <td><?php echo $signosvitales->ta;?></td>
                                            <!--<td><?php echo $cat_procedimiento->estado;?></td>-->
      
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Categoria</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
$(document).ready(function () {
////////////////////////////////////////////////

    $('#example1').DataTable({
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
    $('.sidebar-menu').tree();
})
</script>
