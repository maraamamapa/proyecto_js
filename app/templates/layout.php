<!DOCTYPE html>
 <html lang="en">
    <head>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
 	<link rel="stylesheet" href="../../css/master2.css">
  <!-- <link rel="stylesheet" href="../../css/master.css"> -->
  <link rel="stylesheet" href="../../css/Avanzada.css">
  <link rel="stylesheet" href="../../css/hover.css">
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAJwVqQAj8F5JC3QKiwvEfk9gYroKsTU7w &sensor=true"></script>
     </head>
	    <body>
		<header>
      <div class="container-fluid">
			<!-- <h1>.</h1>
      <h1>.</h1> -->
      <!-- Barra de navegacion -->
      <div class="imagen_funko">
      </div>
		</div>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="inicio.php">Funko Shop</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="productos.php">Tienda</a></li>
          <li><a href="tufunko.php">Tu Funko</a></li>
          <li><a href="contacto.php">Contacto</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="formulario.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>

      </div>
    </nav>
		</header>

    <section class="container">
		    <section class="main row">
			       <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
               <?php echo $contenido ?>
			        </article>
		    </section>
	 </section>
   <br>
   <br>
   <br>
   <br>
<!-- Footer con el JSON -->
	<footer>
		<div class="container">
      <p id="demo"></p>
      <script>
          var myObj, i, j, x = "";
          myObj = {
              "muestra": [
                  { "subtitulo":"¿Quienes somos?",
                    "descripcion":[ "Somos una tienda fisica de funko pop, nos situamos en la calle Colón de Valencia y nuestra finalidad es que disfrute de su estancia y sus compras sean favorables, le esperamos ;)"] },
              ]
          }

          for (i in myObj.muestra) {
              x += "<h3>" + myObj.muestra[i].subtitulo + "</h3>";
              for (j in myObj.muestra[i].descripcion) {
                  x += myObj.muestra[i].descripcion[j] + "<br>";
              }
          }

          document.getElementById("demo").innerHTML = x;
          </script>
		</div>
	</footer>
	</div>

	<!-- JavaScript -->

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		</div>
	</body>
 </html>
