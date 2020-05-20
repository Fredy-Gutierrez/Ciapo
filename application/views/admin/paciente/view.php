<p><strong>Número de expediente:</strong> <?php echo $paciente->no_exp; ?></p>
<p><strong>Curp:</strong> <?php echo $paciente->curp; ?></p>
<p><strong>Nombre:</strong> <?php echo $paciente->nombrepx; ?></p>
<p><strong>Apellido Paterno:</strong> <?php echo $paciente->ape_pat; ?></p>
<p><strong>Apellido Materno:</strong> <?php echo $paciente->ape_mat; ?></p>
<p><strong>Fecha de Nacimiento:</strong> <?php echo $paciente->fecha_nac; ?></p>
<p><strong>Fecha de Ingreso:</strong> <?php echo $paciente->fecha_ingr; ?></p>
<p><strong>Sexo:</strong> <?php echo $paciente->sexo; ?></p>
<p><strong>Número de Poliza:</strong> <?php echo $paciente->no_poliza; ?></p>
<p><strong>Vigencia de la Poliza:</strong> <?php echo $paciente->fin_poliza; ?></p>
<p><strong>Estado:</strong> <?php if($paciente->estado == "t"):?><td>Activo</td><?php endif; ?></p>

                                            
