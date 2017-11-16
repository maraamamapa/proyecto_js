<?php ob_start();

echo '<div class="container contenedor">

    <div class=" main row">
    <!-- Aqui estara metido el Funko que personalizemos -->
    <div id="contenedor">
    <article class="col-xs-6 col-sm-6 col-md-6col-lg-6" >

      <form id="form" action="formito.html" method="get">

        <fieldset>

          <legend><h1 style="position:relative; left:448px;">Registro</h1></legend>

          <center><label for="usuario">Usuario: <br><input type="text" id="usuario"></center></label><br>
          <center><label for="nombre">Nombre: <br><input type="text" id="nombre"></center></label><br>
          <center><label for="correo">Correo: <br><input type="text" id="correo"></center></label><br>
          <center><label for="pass1">Contraseña: <br><input type="password" id="pass1" id="" ></center></label><br>
          <center><label for="pass2">Repite Contraseña: <br><input type="password" id="pass2" id="" ></center></label><br><br>

          <input type="hidden" name="accion" value="registro">
          <center><input type="button" name="" onclick="validarDatos();" value="registrarse" class="btn btn-info"></center>

        </fieldset>



    </article>

    <!-- Aqui estara las Imagenes de cada Funko -->
    <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
      <fieldset>

      <legend> <h1>.</h1> </legend>
    <div id="errores" class="contenedor2" style="margin-top: 0;"></div>
    </div>
    </form>
    </div>
    </fieldset>
    </article>
    <script type="text/javascript" src="../../js/form.js"></script>';
$contenido = ob_get_clean(); ?>
<?php include 'layout.php' ?>
