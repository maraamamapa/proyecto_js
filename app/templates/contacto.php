<!DOCTYPE html>
 <html lang="en">
    <head>
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
 	<link rel="stylesheet" href="../../css/master2.css">
  <!-- <link rel="stylesheet" href="../../css/master.css"> -->
  <link rel="stylesheet" href="../../css/Avanzada.css">
  <link rel="stylesheet" href="../../css/hover.css">

  <script type="text/javascript">

//-- navigator.geolocation sirve para saber si puede ir el mapa --\\
  function muestraPosicion() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(imprime);
    }else {
      document.getElementById("coordenadas").innerHTML = "No podemos acceder a la geolocación";
    }
  }
  function imprime(position) {
    // document.getElementById('coordenadas').innerHTML= "Latitud: "+ position.coords.latitude +", Longitud: "+position.coords.longitude;
    var mapa = document.createElement("div");
    mapa.id = "mapa";
    mapa.style.width = "450px";
    mapa.style.height = "320px";
    document.getElementById("contenedor").appendChild(mapa);

    var coordenadas = new google.maps.LatLng(39.4620794,-0.3279259);

      var opciones = {
          zoom: 17,
          center: coordenadas,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      var objetoMapa = new google.maps.Map(document.getElementById("mapa"), opciones);

        var marcador = new google.maps.Marker({
            position: coordenadas,
                map: objetoMapa,
                    title: "Estas aquí"
                     });
  }
  google.maps.event.addDomListener(window, 'load', imprime);


  function validarDatos(){
    var formularioOk=true;
    var errores = document.getElementById('errores');

    var nombre = document.getElementById('nombre').value;
    var apellidos = document.getElementById('apellidos').value;
    var email = document.getElementById('email').value;


    var mensajeNom= document.getElementById("errorNombre");
    var mensajeApe= document.getElementById("errorApellidos");
    var mensajee= document.getElementById("errorEmail");

    if (nombre === "") {
      formularioOk=false;

        if(mensajeNom===null){
          var mensajeNom = document.createElement("p");
          mensajeNom.id="errorNombre";
          var texto = document.createTextNode("Error no hay nombre");
          mensajeNom.appendChild(texto);
          errores.appendChild(mensajeNom);
        }
    }else {
      if(mensajeNom!==null){
        errores.removeChild(mensajeNom);
      }
    }

    if (apellidos === "") {
        formularioOk=false;

        if(mensajeApe===null){
          var mensajeApe = document.createElement("p");
          mensajeApe.id="errorApellidos";
          var texto = document.createTextNode("Error no hay apellidos");
          mensajeApe.appendChild(texto);
          errores.appendChild(mensajeApe);
        }
    }else {
      if(mensajeApe!==null){
        errores.removeChild(mensajeApe);
      }
    }


    if (email === "" || email.indexOf("@")==-1) {
        formularioOk=false;

          if(mensajee===null){
            var mensajee = document.createElement("p");
            mensajee.id="errorEmail";
            var texto = document.createTextNode("Error no hay email");
            mensajee.appendChild(texto);
            errores.appendChild(mensajee);
          }
      }else {
        if(mensajee!==null){
          errores.removeChild(mensajee);
        }
      }
      if(formularioOk){
      document.getElementById("form").submit();
    }
}


</script>
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
          <li><a href="contacto.html">Direccion</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="registro.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>

      </div>
    </nav>
		</header>

    <section class="container">
		    <section class="main row">
			       <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <form id="form" action="contacto.html" method="post">
            <fieldset id="formContac">
              <legend>Contacta Con nosotros</legend>
                <label>Nombre: <input type="text" id="nombre" name="" value=""></label><br>
                <label>Apellidos: <input type="text" id="apellidos" name="" value=""></label><br>
                <label>Email: <input type="text" name="" id="email" value=""></label><br>
                <label>Comentario:  </label><br><textarea name="name" rows="5" cols="50"></textarea><br>
                <label><input type="button" onclick="validarDatos();" name="" value="Enviar"></label>
            </fieldset>
            <div id="errores"></div>
            </form>
          </div>

          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <fieldset>
              <legend>Donde encontrarnos</legend>
              <p> La Marina de València, Muelle de la Aduana s/n <br>
                   Edificio Lanzadera <br>
                  46024 Valencia <br>
                  España.
                </p>
                <div id="contenedor"></div>
            </fieldset>
          </div>

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
