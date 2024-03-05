var Botondesabilitar = document.getElementById("butonDesabilitar");
var BotonHabilitar = document.getElementById("butonMenu");

var inputs1 = document.getElementById("texto1");
var inputs2 = document.getElementById("texto2");
var inputs3 = document.getElementById("texto3");
var inputs4 = document.getElementById("texto4");
var inputs5 = document.getElementById("texto5");
var inputs6 = document.getElementById("texto6");

BotonHabilitar.addEventListener('click', function(){

  inputs1.disabled = false;
  inputs2.disabled = false;
  inputs3.disabled = false;
  inputs4.disabled = false;
  inputs5.disabled = false;
  inputs6.disabled = false;

  window.scrollTo(0, 0);
  console.log(inputs1);
  console.log(inputs2);
  console.log(inputs3);
  console.log(inputs4);
  console.log(inputs5);
  console.log(inputs6);
});

var Botondesabilitar = document.getElementById("butonDesabilitar");
var BotonHabilitar = document.getElementById("butonMenu");

const botonCambiarMenu = document.getElementById("butonMenu");
botonCambiarMenu.addEventListener('click', function (){
  console.log("funcionando");
  let $textArea = document.querySelectorAll('.text-comida');
  let $divArea = document.querySelectorAll('.div-text-menuComida');
  $textArea.forEach(el => (
    el.style.display = 'block'

  ));
  $divArea.forEach(el => (
    el.style.display = 'none'

  ));
 
})
const botonActualizarMenu = document.getElementById("actualizar_menu");
botonActualizarMenu.addEventListener('click', function (){
  console.log("funcionando");
  let $textArea = document.querySelectorAll('.text-comida');
  $textArea.forEach(el => (
    el.style.display = 'none'

  ));
  let $divArea = document.querySelectorAll('.div-text-menuComida');
  $divArea.forEach(el => (
    el.style.display = 'inline'

  ));
  
 
})

const $divArea = document.querySelectorAll(".div-text-menuComida");

 let $mayorheight = 0;
 let $valorHeightfinal2 = "";

  $divArea.forEach(el => {

    let $height = getComputedStyle(el).getPropertyValue("height");

    let $newheight = $height.slice(0, -2);

    let $newheightNumber = parseInt($newheight)
    
    if($mayorheight < $newheightNumber){
      $mayorheight = $newheightNumber;
    }
    
    $valorHeightfinal = $mayorheight.toString() + "px";
     // Sumar 200 al valor de $mayorheight y convertir el resultado en una cadena con la unidad de medida "px"
  $valorHeightfinal2 = (parseInt($mayorheight) + 90).toString() + "px";

  });
 
  console.log($valorHeightfinal2);
  
  $divArea.forEach(el => {
    el.style.height = $valorHeightfinal2;
  })

  let elementos = document.querySelectorAll(".div-text-menuComida");

  // Iterar sobre cada elemento y agregar una etiqueta <br> después del signo
  for (let i = 0; i < elementos.length; i++) {
    let elemento = elementos[i];
    let contenido = elemento.innerHTML;
    let nuevoContenido = contenido.replace(/\./g, ".<br>");
    elemento.innerHTML = nuevoContenido;
    console.log(elemento);
  }


  function capturarPantalla() {
    // Seleccionar el elemento que se capturará en la pantalla
    const contenido = document.getElementById("div");
  
    // Llamar a la función html2canvas para tomar una captura de pantalla de contenido
    html2canvas(contenido).then(canvas => {
      // Crear un enlace de descarga para la imagen de la captura de pantalla
      const enlaceDescarga = document.createElement("a");
      enlaceDescarga.download = "captura-de-pantalla.png";
      enlaceDescarga.href = canvas.toDataURL("image/png");
  
      // Hacer clic en el enlace de descarga para descargar la imagen
      enlaceDescarga.click();
    });
  }
/*
$divArea.forEach(el => {

  el.textContent

  for (var i = 0; i < el.textContent.length; i++) {
    
    }
})

*/

/*

let texto = "HOLA"

textoCaracter = texto.length;

for (let i = 0; i < textoCaracter - 1; i++) {
  const element = textoCaracter[];
   
  console.log(element)
}


sexo.length.forEach(el => {
  console.log(el)
})

console.log(sexo.length)

*/