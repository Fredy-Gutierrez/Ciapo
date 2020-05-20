<script type="text/javascript">
    function mos_ocu_contr(){
        $tipo2 = document.getElementById("contra2");
        $boton2 = document.getElementById("boton");

        if($tipo2.type == "password"){
            $tipo2.type = "text";
            $boton2.value= "OCULTAR";
        }
        else{
            $tipo2.type = "password";
            $boton2.value= "MOSTRAR";
        }
    }
</script>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        USUARIO
        <small>Agregar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">

        <?php if($this->session->flashdata("errorUs")):?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <i class="icon fa fa-ban"></i>
               <font size=4 face="Helvetica" style="font-weight: bold;">&nbspERROR DE REGISTRO DE USUARIO</font>
                <p></p>
                <p> &nbsp &nbsp &nbsp&nbsp&nbsp
                    <?php echo $this->session->flashdata("errorUs"); ?>
                        
                </p>
            </div>
        <?php endif;?>
        
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <form action="<?php echo base_url();?>mantenimiento/usuarios/store" method="POST"> <!-- Aqui se guardaran los datos-->
                        
                          <table class="table table-stripped">
                               <thead>
                                <tr>
                                    <th scope="col">
                                       <div class="form-group">
                                            <label for="categoria">Empleado:</label>
                                            <select name="empleado" id="empleado" class="form-control">
                                                <?php foreach($cat_empleados as $empleado):?>
                                                    <option value="<?php echo $empleado->id_emp?>"><?php echo $empleado->nombre." ".$empleado->ape_pat." ".$empleado->ape_mat;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        
                                        
                                    </th>
                                    
                                    <th scope="col">
                                        
                                        
                                       
                                        <div class="form-group">
                                            <label for="categoria">Rol:</label>
                                            <select name="Rol" id="Rol" class="form-control">
                                                <?php foreach($cat_rol as $roles):?>
                                                    <option value="<?php echo $roles->id_tipo?>"><?php echo $roles->descripcion;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                           </table>
                          
                          
                           <table class="table table-stripped">
                        
                              <thead>
                               
                                  <tr>
                                      <th scope="col">
                                    
                                        <div class="form-group"> <!-- Se crea para la columna ID Categorias -->
                                            
                                            
                                            <label for="nom_usuario">Nombre de Usuario</label>
                                            

                                            <input type="text" value="" style="text-transform: uppercase;" autocomplete="off" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nom_usuar" name="nom_usuar" placeholder="Inserte Usuario" required > 
                                            
                                                       
                                        </div>
                                       </th>
                                       
                                       <th scope="col">
                                        <div class="form-group">
                                        <label for="contra">Contraseña</label>
                                        

                                        <div class="input-group">
                                            
                                            <input type="password" class="form-control" id="contra2" name="contra" value="" placeholder="Inserte Contraseña" required>

                                            <span class="input-group-btn">
                                                <input type="button" class="btn btn-info btn-flat" id="boton" onclick="mos_ocu_contr()" value="MOSTRAR">
                                            </span>

                                        </div>    
                                        </div>
                                       </th>
                                   
                                   </tr>
                               </thead>
                           </table>
                          
                            <div class="form-group3">
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