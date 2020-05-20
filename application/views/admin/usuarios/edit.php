<script type="text/javascript">
    
    function mos_ocul_contra() {
        
        //alert("No existe dicha Receta \nIntentalo de nuevo");
        $tipo = document.getElementById("contra");
        $boton = document.getElementById("boton");

        if($tipo.type == "password"){
            $tipo.type = "text";
            $boton.value= "OCULTAR";
            //tipo.value = <?php echo $usuario->pass?>;
        }else{
            $tipo.type = "password";
            $boton.value= "MOSTRAR";
        }
    }

</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        USUARIO
        <small>EDITAR</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">

                        <?php if($this->session->flashdata("errorUs")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fa fa-ban"></i>
                                <font size=4 face="Helvetica" style="font-weight: bold;">&nbspERROR DE ACTUALIZACIÓN DE USUARIO</font>
                                <p></p>
                                <p>&nbsp&nbsp&nbsp <?php echo $this->session->flashdata("errorUs"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        
                        <form action="<?php echo base_url();?>mantenimiento/usuarios/update" method="POST"> <!-- Editar -->
                            <input type="hidden" value="<?php echo $usuario->id_usuario;?>" name="id_User">
                            <table class="table table-stripped">
                        
                              <thead>
                               
                                  <tr>
                                      <th scope="col">
                                    
                                        <div class="form-group"> <!-- Se crea para la columna ID Categorias -->
                                            
                                            
                                        
                                            <label for="nom_usuario">Nombre de Usuario</label>
                                            <input type="text" style="text-transform: uppercase;" class="form-control" id="nom_usuario" name="nom_usuario" value="<?php echo $usuario->usuario?>" onchange="javascript:this.value=this.value.toUpperCase();" placeholder="Inserte Usuario" required>
                                            
                                                       
                                        </div>
                                       </th>
                                       
                                       <th scope="col">
                                        
                                        <div class="form-group">
                                        <label for="contra">Contraseña</label>
                                        <!--
                                        <input type="text" class="form-control" id="contra" name="contra" value="<?php echo $usuario->pass?>" required>-->

                                        <div class="input-group input-group">
                                            <input type="password" class="form-control" id="contra" name="contra" value="<?php echo $usuario->pass?>" placeholder="Inserte Contraseña" required>
                                            <span class="input-group-btn">
                                                <input type="button" class="btn btn-info btn-flat" id="boton" onclick="mos_ocul_contra()" value="MOSTRAR">
                                            </span>
                                        </div>    
                                        </div>
                                        
                                        
                                        </th>
                                   
                                   </tr>
                               </thead>
                           </table>
                            
                            
                            <!--<div class="form-group">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $usuario->descripcion?>">
                            </div>
                            -->
                            <div class="form-group">
                                <label for="Estado">Estado:      </label>
                                
                                <?php if($usuario->estado== "t") :?>
                                    <label class="radio-inline">
                                        <input type="radio" id="estado" name="estado" value="true" checked>   Activo
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" id="estado" name="estado" value="false" >   Inactivo
                                    </label>

                                    
                                <?php endif;?>

                                <?php if($usuario->estado== "f") :?>
                                    <label class="radio-inline">
                                        <input type="radio" id="estado" name="estado" value="true" >   Activo
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" id="estado" name="estado" value="false" checked>   Inactivo
                                    </label>
                                <?php endif;?>
                                
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