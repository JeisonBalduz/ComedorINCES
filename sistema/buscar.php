<?php

//

	include("php/conexion.php");
	
	if(isset($_POST['buscar'])){ 
		if (!empty($_POST['cedula'])){
			$cedula = $_POST['cedula'];
		
			$valores = array();
			$valores['existe'] = "0";
			
			
	
			//CONSULTAR
			  $resultados = $conexion -> query ("SELECT * FROM personal
			  INNER JOIN sedes ON personal.idsede = sedes.idsede
			  INNER JOIN estatus ON personal.idestatus = estatus.idestatus 
			  WHERE activo = '1' AND cedula = '$cedula'
	
		  ");
			  while($consulta = mysqli_fetch_array($resultados))
			  {
				  $valores['existe'] = "1";
				  $valores['idpersonal'] = $consulta['idpersonal'];
				  $valores['nombre'] = $consulta['nombre'];
				$valores['apellido'] = $consulta['apellido'];
				  $valores['sede'] = $consulta['sede'];
				  $valores['estatus'] = $consulta['estatus'];		    
			  }
			  sleep(1);
				  $valores = json_encode($valores);
				echo $valores;
		}else{
			exit();
		}
    	
    }




// Buscar Cliente



?>
