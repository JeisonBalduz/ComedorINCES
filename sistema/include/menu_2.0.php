<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú despegable</title>
    <link rel="stylesheet" href="css/menu_2.0.css">
</head>
<body>
    
    <nav class="nav" id="menu_todo">
        <ul class="list">
            <div class="contendor__siscomara">
                <div>
                    <img src="include/siscomara.png" alt="logo de siscomara">
                </div>
            </div>
            <div class="contendor__lista__item">
                <li class="list__item">
                    <div class="list__button">
                        <img src="icons/casa.png" class="list__img">
                        <a href="./principal.php" class="nav__link">Inicio</a>
                    </div>
                </li>
                <?php 
                    if($idrol == 1){
                       ?>
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="icons/usuario.png" class="list__img">
                                <a href="#" class="nav__link">Beneficiaro</a>
                                <img src="icons/proximo.png" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="./registro-personal.php" class="nav__link nav__link--inside">Registro Personal</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./tabla-registro.php" class="nav__link nav__link--inside">Modificar </a>
                                </li>

                                <li class="list__inside">
                                    <a href="./registro-tipo.php" class="nav__link nav__link--inside">Crear Estatus</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./registro-ausencia.php" class="nav__link nav__link--inside">Ausencia Justificada</a>
                                </li>
                            </ul>

                        </li>
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="icons/sede.png" class="list__img">
                                <a href="#" class="nav__link">Dependencia</a>
                                <img src="icons/proximo.png" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="./registo-sede.php" class="nav__link nav__link--inside">Crear Dependencia</a>
                                </li>
                            </ul>

                        </li>
                        
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="icons/comedor.png" class="list__img">
                                <a href="#" class="nav__link">Comedor</a>
                                <img src="icons/proximo.png" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="./registro_comer.php" class="nav__link nav__link--inside">Solicitud De Comida</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./registro-ticket.php" class="nav__link nav__link--inside">Pedir Tickets</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./reportes.php" class="nav__link nav__link--inside">Reporte</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./menu_comer.php" class="nav__link nav__link--inside">Menu</a>
                                </li>
                            </ul>

                        </li>

                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="icons/administracion.png" class="list__img">
                                <a href="#" class="nav__link">Administrador</a>
                                <img src="icons/proximo.png" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="./registro-usuario.php" class="nav__link nav__link--inside">Crear Usuario</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./tabla-usuario.php" class="nav__link nav__link--inside">Usuarios Creados</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./tabla-eliminados-registros.php" class="nav__link nav__link--inside">Personal Eliminado</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./solicitud_ticket.php" class="nav__link nav__link--inside">Solicitudes ticket</a>
                                </li>
                            </ul>

                        </li> 
                       <?php 
                    }
                    if($idrol == 2){
                        ?>
                        
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="icons/comedor.png" class="list__img">
                                <a href="#" class="nav__link">Comedor</a>
                                <img src="icons/proximo.png" class="list__arrow">
                            </div>

                            <ul class="list__show">

                                <li class="list__inside">
                                    <a href="./registro-ticket.php" class="nav__link nav__link--inside">Pedir Tickets</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./menu_comer.php" class="nav__link nav__link--inside">Menu</a>
                                </li>
                            </ul>

                        </li>
                        
                        <?php 
                     }

                     if($idrol == 3){
                        ?>
                         <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="icons/usuario.png" class="list__img">
                                <a href="#" class="nav__link">Beneficiaro</a>
                                <img src="icons/proximo.png" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="./registro-ausencia.php" class="nav__link nav__link--inside">Ausencia Justificada</a>
                                </li>
                            </ul>

                        </li>
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="icons/comedor.png" class="list__img">
                                <a href="#" class="nav__link">Comer</a>
                                <img src="icons/proximo.png" class="list__arrow">
                            </div>

                            <ul class="list__show">

                                <li class="list__inside">
                                    <a href="./menu_comer.php" class="nav__link nav__link--inside">Menu</a>
                                </li>
                            </ul>

                        </li>
                        
                        <?php 
                     }
                     if($idrol == 4){
                        ?>
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="icons/usuario.png" class="list__img">
                                <a href="#" class="nav__link">Beneficiaro</a>
                                <img src="icons/proximo.png" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="./registro-personal.php" class="nav__link nav__link--inside">Registro Personal</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./tabla-registro.php" class="nav__link nav__link--inside">Modificar </a>
                                </li>

                                <li class="list__inside">
                                    <a href="./registro-tipo.php" class="nav__link nav__link--inside">Crear Estatus</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./registro-ausencia.php" class="nav__link nav__link--inside">Ausencia Justificada</a>
                                </li>
                            </ul>

                        </li>
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="icons/sede.png" class="list__img">
                                <a href="#" class="nav__link">Dependencia</a>
                                <img src="icons/proximo.png" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="./registo-sede.php" class="nav__link nav__link--inside">Crear Dependencia</a>
                                </li>
                            </ul>

                        </li>
                         
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="icons/comedor.png" class="list__img">
                                <a href="#" class="nav__link">Comer</a>
                                <img src="icons/proximo.png" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="./reportes.php" class="nav__link nav__link--inside">Reporte</a>
                                </li>

                                <li class="list__inside">
                                    <a href="./menu_comer.php" class="nav__link nav__link--inside">Menú</a>
                                </li>
                            </ul>

                        </li>
                        
                        <?php 
                     }
                     if($idrol == 5){
                        ?>
                         
                        <li class="list__item list__item--click">
                            <div class="list__button list__button--click">
                                <img src="icons/comedor.png" class="list__img">
                                <a href="#" class="nav__link">Comer</a>
                                <img src="icons/proximo.png" class="list__arrow">
                            </div>

                            <ul class="list__show">
                                <li class="list__inside">
                                    <a href="./registro_comer.php" class="nav__link nav__link--inside">Solicitud De Comida</a>
                                </li>
                                
                                <li class="list__inside">
                                    <a href="./menu_comer.php" class="nav__link nav__link--inside">Menu</a>
                                </li>
                            </ul>

                        </li>
                        
                        <?php 
                     }
                ?>

                <li class="list__item">
                    <div class="list__button">
                        <img src="icons/grupo.png" class="list__img">
                        <a href="./nosotros.php" class="nav__link">Nosotros</a>
                    </div>
                </li>
            </div>
        </ul>
    </nav>

    
    <script src="main.js"></script>
</body>
</html>