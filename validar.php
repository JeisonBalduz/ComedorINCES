<?php
                   
                        session_start();
                            if (empty($_SESSION['usuario'])) {
                                header('location: index.php');
                                
                            } else {
                                if (!empty($_POST)) {
                                    if (empty($_POST['usuario']) || empty($_POST['contraseña'])) {
                                        ?>
                                        <script type="text/javascript">
                                            Swal.fire({
                                            title: 'ERROR!',
                                            text: ' Por fover coloque un usuario y contraseña',
                                            icon: 'error',
                                            confirmButtonText: 'Aceptar',
                                            allowOutsideClick: false,
                                            allowEnterKey: false,
                                            confirmButtonColor:'#dc3545',
                                            footer:'Para salir de la alarma presione el boton'
                                            });
                                        </script>
                                        <?php
                                    } else {
                                        
                                        $conexion=mysqli_connect("localhost","root","","inces2");
                                        $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
                                        $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);
                                        $query = mysqli_query($conexion, "SELECT  * FROM usuario  WHERE usuario = '$usuario' AND contraseña = '$contraseña'");
                                        mysqli_close($conexion);
                                        $resultado = mysqli_num_rows($query);
                                        $_SESSION['usuario'] = $usuario;
                                        if ($resultado > 0) {
                                         
                                            header('location: sistema/principal.php');
                                        }else{
                                            
                                                ?>
                                                <script type="text/javascript">
                                                    Swal.fire({
                                                    title: 'Usuario o contraseña erroneos',
                                                    icon: 'error',
                                                    confirmButtonText: 'Aceptar',
                                                    allowOutsideClick: false,
                                                    allowEnterKey: false,
                                                    confirmButtonColor:'#dc3545',
                                                    footer:'Para salir de la alarma presione el boton'
                                                    });
                                                </script>
                                                <?php
                                               
                                                
                                        }
                                    }
                                }
                            }
                    ?>