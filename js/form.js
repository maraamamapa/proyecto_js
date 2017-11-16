// funcion setTimeout('validarDatos()',3000);    tiempo para que cuando se cumpla la funcion validarDatos se ejecuta
setTimeout('validarDatos()',30000);

function validarPasw(pass1,pass2){
  return pass1===pass2;
}

  function validarDatos(){
    //variable formularioOk=true para diferentes opciones, y se ejecute el ultimo if
    var formularioOk=true;
    //iniicamos errores, y volcamos con getElement el valor de div
    var errores = document.getElementById('errores');
    //iniciamos variables para acceder al valor de campos formulario, y volcamos datos con getElement.value;
      var usuario = document.getElementById('usuario').value;
      var nombre = document.getElementById('nombre').value;
      var email = document.getElementById('correo').value;
    var pass1 = document.getElementById('pass1').value;
    var pass2 = document.getElementById('pass2').value;
    //variables de error independiente de cada campo, si su valor=== null utilizamos funciones del dom para crear elementos-nodos y con apenChild damos valor y removeChild para eliminar.
      var mensajeu= document.getElementById("errorUser");
      var mensajen= document.getElementById("errorNombre");
      var mensajee= document.getElementById("errorEmail");
      var mensajePass= document.getElementById("errorPass");
    // comprovamos el .value de las variables y se monta logica de validacion...y mensajeu === null se ejecuta
      if (usuario === "") {
        formularioOk=false;
          if(mensajeu===null){
            var mensajeu = document.createElement("p");
            mensajeu.id="errorUser";
            var texto = document.createTextNode("Error no hay usuario");
            mensajeu.appendChild(texto);
            errores.appendChild(mensajeu);
          }
      }else {
        if(mensajeu!==null){
          errores.removeChild(mensajeu);
        }
      }
      // comprovamos el .value de las variables y se monta logica de validacion...y mensajeu === null se ejecuta
      if (nombre === "") {
          formularioOk=false;

          if(mensajen===null){
            var mensajen = document.createElement("p");
            mensajen.id="errorNombre";
            var texto = document.createTextNode("Error no hay nombre");
            mensajen.appendChild(texto);
            errores.appendChild(mensajen);
          }
      }else {
        if(mensajen!==null){
          errores.removeChild(mensajen);
        }
      }

      // comprovamos el .value de las variables y se monta logica de validacion...y mensajeu === null se ejecuta

      // index-of== busca el dato filtrado @ y si devuelve -1 es que email no contiene ese dato y devuelve -1
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
          // si no devuelve null, que tiene valor correcto elimina con removeChild elemento-nodo- mandamos a div errores
          if(mensajee!==null){
            errores.removeChild(mensajee);
          }
        }
        //comprobamos la variable contraseña, usando una funcion que recibe dos parametros y comprueba que sean iguales....
        var contrasena = validarPasw(pass1,pass2);
        if(!contrasena){
          formularioOk=false;
          var mensajePass = document.createElement("p");
          mensajePass.id="errorContaseñas";
          var texto = document.createTextNode("Error contraseñas diferentes");
          mensajePass.appendChild(texto);
          errores.appendChild(mensajePass);
        }else{
          if (contrasena!==null) {
            if (mensajePass!=null)
              errores.removeChild(mensajePass);
          }
        }
        //formularioOK = DEBE ESTAR TRUE, si los campos estan rellenos, accedemos al id form y se ejecuta el submit, FUNCION onclick='validarDatos();'
      if(formularioOk){
        document.getElementById("form").submit();
        alert('Datos correctos');
      }
  }
