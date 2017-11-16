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
