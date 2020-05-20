<p><strong>ID de Usuario:</strong> <?php echo $usuario->id_usuario; ?></p>
<p><strong>Nombre:</strong> <?php echo $usuario->usuario; ?></p>

<p><strong>ID de Rol:</strong> <?php echo $usuario->id_rol; ?></p>
<p><strong>ID de Empleado:</strong> <?php echo $usuario->id_emp; ?></p>

<?php if($usuario->estado== "t") :?>
    <p><strong>Estado:</strong> <?php echo "Activo" ?></p>
<?php endif;?>


