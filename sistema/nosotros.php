<?php
session_start();
include("php/rol.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
     <!--CSS De Bootstrap-->
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--CSS Del Menú-->
    <link rel="stylesheet" href="css/menus.css">
    <!--CSS De Los Botones-->
    <link rel="stylesheet" href="css/botones.css">
    <!-- CSS del nostros  -->
    <link rel="stylesheet" href="css/nosotros.css">
    <!--JS De Bootstrap-->
    <script src="js/libreriasJS/bootstrap.bundle.min.js"></script>
    <!--Icono de la pagina -->
    <link rel="icon" href="include/inces.png">
</head>
<body>
<?php include("include/header.php");?>
<main class="contenedor-primario d-flex conteiner-fluid">
    <div class="contendor-segundario conteiner-fluid">
        <div class="tabla">
            <h3 id="texto_crear" class="texto"></h3>
        </div>
        <section class="contenedor-section d-flex  ">
            <!-- Jeison -->          
                <div class="card" id="formulario">
                    <div class="head">
                        <div class="circle"></div>
                        <div class="img">
                            <img src="./img/20430033_1535652299832332_647730034335863291_n.png" alt="">
                        </div>
                    </div>

                    <div class="description">
                        <h3>Jeison Balduz</h3>
                        <h4>Programador Y Diseñador</h4>
                        <p>
                            Jeison balduz estudiante de ingenería en informática de la
                            Universidad Politecnica Territorial de Aragua Federico Brito
                            Figeroa(UPTA) elaborador del programa
                            siscomara para el comedor del inces sede la romana.
                        </p>
                        
                    </div>

                    
                </div>

                <div class="card">
                    <div class="head">
                        <div class="circle"></div>
                        <div class="img">
                            <img src="./img/David.jpg" alt="">
                        </div>
                    </div>

                    <div class="description">
                        <h3>David Miranda</h3>
                        <h4>Programador Y Diseñador</h4>
                        <p>
                            David Miranda estudiante de ingenería en informática de la
                            Universidad Politecnica Territorial de Aragua Federico Brito
                            Figeroa(UPTA) elaborador del programa
                            siscomara para el comedor del inces sede la romana.
                        </p>
                    </div>
                    
                </div>

                <div class="card">
                    <div class="head">
                        <div class="circle"></div>
                        <div class="img ">
                            <img class="img3" src="php/reportes/repimg/inces2.0.png" alt="">
                        </div>
                    </div>

                    <div class="description">
                        <h3>Inces</h3>
                        <h4>Comunidad</h4>
                        <p>
                            Ayudantes en la creación del sistema Siscomara del comercio del 
                            INCES en la sede La Romana, como en el diseño y la estructura del programa.  
                        </p>
                    </div>
                </div>      
        </section>
    </div>
    <footer class="contenedor-upta d-flex ">
        <div>
            <p>&copy Universidad Politécnica Territorial de Aragua Federico Brito Figuero(UPTA).</p>
            <p>&copy INCES la Romana</p>
        </div>
    </footer>
</main>

</body>
</html>
<!-- Cerrar sesion -->
<script src="js/cerrar-sesion.js"></script>
<script src="js/cambiar_menu.js"></script>
<script src="js/menu_2.0.js"></script>
<script type="text/javascript">

var texto = "! E L A B O R A D O R E S ";
var i = 0;

function escribirTexto() {
  if (i < texto.length) {
    document.getElementById("texto_crear").innerHTML += texto.charAt(i);
    i++;
    setTimeout(escribirTexto, 150); // Velocidad de escritura en milisegundos
  }
}

escribirTexto();

const boton = document.getElementById('boton-1');
const formulario = document.getElementById('formulario');
const fondo = document.createElement('div');
fondo.id = 'fondo';

boton.addEventListener('click', () => {
	formulario.classList.toggle('mostrado');
	fondo.classList.toggle('mostrado');
});

document.body.appendChild(fondo);
</script>
<!-- Jeison  
<div class="contenedor-img">
                <div class="contenedor-nombre">
                    <h4>Jeison Balduz</h4>
                </div>
                <img src="img/20430033_1535652299832332_647730034335863291_n.png" alt="">
                <p class="mostrar-contenido">
                    Jeison balduz estudiante de ingeneria en informatica de la
                    universidad politecnica territorial de aragua federico Brito
                    figeroa(UPTA) elaborador del progrma
                    siscomara para el comedor del inces sede la romana
                </p>
            </div>
         
            <div class="contenedor-img">
                <div class="contenedor-nombre">
                    <h4>David Miranda</h4>
                </div>
                <img src="img/20430033_1535652299832332_647730034335863291_n.png" alt="">
                <p class="mostrar-contenido">
                    David Miranda estudiante de ingeneria en informatica de la
                    universidad politecnica territorial de aragua federico Brito
                    figeroa(UPTA) elaborador del programa
                    siscomara para el comedor del inces sede la romana
                </p>
            </div>
 
            <div class="contenedor-img">
                <div class="contenedor-nombre">
                    <h4>Inces</h4>
                </div>
                <img src="php/reportes/repimg/inces2.0.png" alt="">
                <p class="mostrar-contenido">
                   Ayudantes en la creacion del sistema del comer del inces
                   sede la romana siscomara como en el diseño y la estructura del programa   
 
                </p>
            </div>
            -->    