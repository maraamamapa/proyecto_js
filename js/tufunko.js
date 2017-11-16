var KeyUp = 119;
var KeyDown = 115;
var KeyLeft = 97;
var KeyRight = 100;

var idCAS;
/*En el momento que llame a la funcion custom (Event)*/
/*custom-Ampa*/
var eventoImprimir = new Event('imprime');/*el custom se llamara imprime*/
document.addEventListener('imprime', function (e) {
var prueba = document.getElementById('prueba');/*coge la informacion del id prueba*/
prueba.style.display='block';/*modifica de none a block*/
});
setTimeout(function(){ document.dispatchEvent(eventoImprimir);}, 6000);/*A los 6 segundos saldra el mensaje*/
/*---------------*/

window.onload = function(){/*cuando se recargue la pantalla, recarga lo que dentro*/
document.onkeypress = funcion;/*todas las funciones de onkeypress funcionen*/
}
function funcion(evento){/*funcion predefinida que detecta algun evento-es para onkeypress*/
    var contenedor =  document.getElementById(idCAS);/*el cuerpo o la cara ultima que presiones se convierte en esta segun la funcion presionar*/
      if (evento.keyCode==KeyUp) {/*keycode es segun la letra que presiones*/
        if (contenedor.offsetTop > 0) {/*si la posicion es superior a 0*/
        var actual = contenedor.offsetTop;/*gardamos a posicion actual*/
        var nuevo = actual - 5;/*le restamos los pixeles que se va a mover*/
        contenedor.style.top = nuevo + 'px';/*incorpora los nuevos pixeles tras el movimiento de la imagen*/
        }
      }else if (evento.keyCode==KeyDown) {
        var actual = contenedor.offsetTop;
        var nuevo = actual + 5;
        contenedor.style.top = nuevo + 'px';
      }else if (evento.keyCode==KeyLeft) {
        if (contenedor.offsetLeft > 0) {
        var actual = contenedor.offsetLeft;
        var nuevo = actual - 5;
        contenedor.style.left = nuevo + 'px';
      }
      }else if (evento.keyCode==KeyRight) {
        if (contenedor.offsetLeft < (300-100)) {
        var actual = contenedor.offsetLeft;
        var nuevo = actual + 5;
        contenedor.style.left = nuevo + 'px';
      }
      }
    }
function aprietaCabeza(numero) {
var contendor =document.getElementById('idContenedorCabeza');
var imagen;
var src;
var imagenCont;

if (numero==1) {
imagen = document.getElementById('imagen');
}
else if (numero==2) {
imagen = document.getElementById('imagen2');
}

src=imagen.src;
imagenCont=document.getElementById('imagenCont');
imagenCont.src=src;

}
function aprietaCuerpo(numero) {
var contendor =document.getElementById('idContenedorCabeza');
var imagen;
var src;
var imagenCont;

if (numero==1) {
imagen = document.getElementById('imagen5');
}
else if (numero==2) {
imagen = document.getElementById('imagen6');
}

src=imagen.src;
imagenCont=document.getElementById('imagenContC');
imagenCont.src=src;
}
function Presionar(elemento) {/*cuando presionas imagen, de cabeza o cuerpo, idCAS, almacena su id*/
idCAS= elemento.id;
}
