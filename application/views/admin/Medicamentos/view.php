<p><strong>#ID:</strong> <?php echo $cat_medicamentos ->idmed; ?></p>
<p><strong>Clave:</strong> <?php echo $cat_medicamentos ->clave; ?></p>
<p><strong>Nombre:</strong> <?php echo $cat_medicamentos ->nombregen;00 ?></p>
<p><strong>Tabulador:</strong> Medicamento<!--<?php echo $cat_medicamentos ->idtab; ?>*/--></p>
<?php if($cat_medicamentos ->estado == "t"):?>
	<p><strong>Estado: </strong>Activo</p>
<?php endif;?>
<?php if($cat_medicamentos ->estado == "f"):?>
	<p><strong>Estado: </strong>Inactivo</p>
<?php endif;?>
<!--<p><strong>Estado:</strong> <?php echo $medicamentos->estado; ?></p>-->