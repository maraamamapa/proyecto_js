var KeyUp = 119;
var KeyDown = 115;
var KeyLeft = 97;
var KeyRight = 100;

var idCAS;
var eventoImprimir = new Event('imprime');
document.addEventListener('imprime', function (e) {
var prueba = document.getElementById('prueba');
prueba.style.display='block';
});
setTimeout(function(){ document.dispatchEvent(eventoImprimir);}, 6000);


window.onload = function(){
document.onkeypress = funcion;
}
function funcion(evento){
    var contenedor =  document.getElementById(idCAS);
      if (evento.keyCode==KeyUp) {
if (contenedor.offsetTop > 0) {
        var actual = contenedor.offsetTop;
        var nuevo = actual - 5;
        contenedor.style.top = nuevo + 'px';
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
function Presionar(elemento) {
idCAS= elemento.id;
}
