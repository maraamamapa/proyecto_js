<?php ob_start();

echo '<div class="container contenedor">';

echo '<div class="main row">';
echo'<div id="prueba" style="display:none" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">';
echo '<p><b>Estas Perdido?</b></p>';
echo '<p><b>Controles:</b>';
echo 'Arriba:W Abajo:S Izquieda:A Derecha:D</p>';
echo '<b>Para selecionar cual mover darle click en la Cabeza o el Cuerpo</b>';
echo '</div>';

echo'</div>';
echo'<div class=" main row">';
echo '<!-- Aqui estara metido el Funko que personalizemos -->';
echo '<article class="col-xs-3 col-sm-3 col-md-3 col-lg-3 " >';
echo '<h3>Tu Funko POP Personalizado:</h3>';
echo '<div id="idContenedorCabeza" style="position:relative;">';
echo '<img id="imagenCont" src="" alt="" width="350" height="350" onclick="Presionar(this)">';
echo '</div>';

echo '<div id="idContenedorCuerpo" style="position:relative;">';
echo '<img id="imagenContC" src="" alt="" width="600px" height="600px" onclick="Presionar(this)">';
echo '</div>';
echo '</article>';

echo '<article class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></article>';
echo '<!-- Aqui estara las Imagenes de cada Funko -->';
echo '<article class="col-xs-8 col-sm-8 col-md-8 col-lg-8" >';
echo '<!-- Mostramos las imagenes de las cabeza -->';
echo '<div id="contenedorDeCabezas"class="contenedor2">';
echo '<h1 style="position:absolute; top:-60px;">Mostrar cabezas</h1>';
echo '<hr>';

echo ' <img id="imagen" onclick="aprietaCabeza(1);" src="../../img/1.png" alt="" style="position:relative; top:-50px;"width="50" height="50">';
echo '<img id="imagen2" onclick="aprietaCabeza(2);" src="../../img/2cabeza.png" alt="" width="50" height="50" style="position:relative; top:-30px;">';
echo '</div>';
echo '<!-- Imagenes de los cuerpos -->';
echo '<div id="contenedorDeCuerpo" class="contenedor2">';
echo '<h1 style="position:relative; top:-65px;">MostrarCuerpos</h1>';
echo '<hr>';
echo '<img id="imagen5" onclick="aprietaCuerpo(1);" src="../../img/2cuerpo.png" alt=""  width="75" height="75" style="position:relative; top:-60px;">';
echo '<img id="imagen6" onclick="aprietaCuerpo(2);" src="../../img/1-cuerpo.png" alt=""  width="75" height="75" style="position:relative; top:-60px;">';
echo '</div>';
echo '</article>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<script type="text/javascript" src="../../js/tufunko.js"></script>';
echo'<script src="http://code.jquery.com/jquery-latest.js"></script>';
echo'<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>';
$contenido = ob_get_clean(); ?>

<?php include 'layout.php' ?>
