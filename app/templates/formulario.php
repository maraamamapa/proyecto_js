<?php ob_start();

echo '<div class="container">';
echo '<center>';
echo '<div id="contenedor">';
echo '<form id="form" action="formulario.php" method="get">';
echo '<fieldset>';
echo '<legend><h1>Registrate</h1></legend>';
echo    '<label for="usuario">Usuario</label><br><br>';
echo  	'<input type="text" id="usuario"><br><br>';
echo  '<label for="nombre">Nombre</label><br><br>';
echo  	'<input type="text" id="nombre"><br><br>';
echo  '<label for="correo">Correo</label><br><br>';
echo	'<input type="text" id="correo"><br><br>';
echo'<label for="pass1">Contraseña</label><br><br>';
echo  '<input type="password" id="pass1" id="" placeholder="Contraseña"><br><br>';
echo'  <label for="pass2">Repite Contraseña</label><br><br>';
echo  '<input type="password" id="pass2" id="" placeholder="Repite Contraseña"><br><br>';

echo  '<input type="hidden" name="accion" value="registro">';
echo'<input type="button" name="" onclick="validarDatos();" value="registrarse">';
echo'</fieldset>';
echo'<div id="errores">';
echo '<br>';
echo '<br>';
echo'</div>';
echo '<script type="text/javascript" src="../../js/form.js"></script>';
$contenido = ob_get_clean(); ?>
<?php include 'layout.php' ?>
