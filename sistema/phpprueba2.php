

<?php
	class Nombredetuclase{
		private $conexion;
		function __construct()
		{
			require_once('phpprueba.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
        }


		function Nombredetufuncion(){
			$sql = "ESCRIBIR CONSULTA";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
	}
?>

