<?php
$clave = "mi_clave_secreta";
$clave_encriptada = openssl_encrypt($clave, "AES-256-CBC", "mi_llave_secreta", 0, "mi_vector_inicial");
echo "Clave encriptada: " . $clave_encriptada;
?>