
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Nota Medica
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">

                <?php if(empty($this->session->userdata("id_med"))):?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><i class="icon fa fa-ban"></i>¡NO ES MEDICO!, Si lo es registre sus datos en el apartado de medicos, hasta el momento se deshabilitaran los botones para GUARDAR INFORMACIÓN</p>
                    </div>
                <?php endif;?>

                <?php if ($this->session->userdata("rol")=="Medico") {?>

                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>mantenimiento/notamedica/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Nota Inicial</a>
                        <a href="<?php echo base_url();?>mantenimiento/notamedica/consecuente1" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Nota Subsecuente</a>
                        <!--<a href="<?php echo base_url();?>mantenimiento/notamedica/index" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Ver Activos</a>-->
                    </div>
                </div>

                <?php } ?>
                <hr>
                <div class="row">

                    <form action="<?php echo base_url();?>mantenimiento/notamedica/searchnota" method="POST">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                    <th scope="col">
                                   <div  class="form-group">
                                        <label for="expediente">NO. DE EXPEDIENTE DEL PACIENTE:</label>
                                        
                                        <input type="nummber" id="no_rec" name="no_rec" required>
                                    
                                        <button type="submit" class="btn btn-success btn-flat">BUSCAR</button>

                                    </div>
                                </th>
                                </tr>
                               </thead>      
                            </table>
                        </form>

                    <div class="table-responsive col-md-12">
                        <table id="example2" class="table table-responsive table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Curp</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Fecha</th>
                                    <th>Evolución</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(!empty($notas_medicas)):?>
                                    <?php 
                                    $x=0;
                                    foreach($notas_medicas as $notas_medicas):?>
                                        <tr>
                                            <td><?php echo $notas_medicas->curp;?></td>
                                            <td><?php echo $notas_medicas->nombrepx;?></td>
                                            <td><?php echo $notas_medicas->ape_pat;?></td>
                                            <td><?php echo $notas_medicas->ape_mat;?></td>
                                            <td><?php echo $notas_medicas->fecha;?></td>
                                            <td><?php echo $notas_medicas->evolucion;?></td>

                                            
                                                <td>
                                                    <div class="btn-group">
                                                       
                                                        <a href="<?php echo base_url()?>mantenimiento/notamedica/pdfl/<?php echo $notas_medicas->id_nota;?>/<?php echo $notap;?><?php if(!empty($notas_medicas->idreceta)){?>/<?php echo $notas_medicas->idreceta; }else{echo "/"."0";}?>" class="btn btn-info"><span class="fa fa-print"></span></a>

                                                        <?php 
                                                            if ($this->session->userdata("rol")=="Medico") {
                                                                # code...
                                                            
                                                        ?>

                                                        <?php if($x<1) {?>

                                                        <a href="<?php echo base_url()?>mantenimiento/notamedica/edit/<?php echo $notas_medicas->id_nota;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>

                                                        <?php 
                                                        }
                                                        $x=1;
                                                         ?>

                                                     <?php } ?>

                                                        <!--

                                                        <a href="<?php echo base_url();?>mantenimiento/notamedica/delete/<?php echo $notas_medicas->id_nota;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>-->
                                                    </div>
                                                </td>
                                            
                                            
                                        
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
        <h4 class="modal-title">Informacion del paciente</h4>
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


