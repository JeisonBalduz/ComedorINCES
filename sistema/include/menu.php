
<div id="contenedor_menu"class="contenedor_menu navbar-light " >
	<div id="menu"class="conetenedor_menu2">
		<div id="menu-lateral" class="contenedor2">
		<a class="siscomara sidebar-brand d-flex align-items-center justify-content-center" href="principal.php">
			<div id="sisco-img" class="sidebar-brand-icon rotate-n-15">
				<img src="include/siscomara.png" class="img-thumbnail">
			</div>
		</a>
	<!-- Divider -->
		<nav >
			<ul class="ul" id="menu_principal">
				<li id="li" class="li mb-3">
					<a href="principal.php" class="">
						<img class="img" src="icons/casa.png" alt=""> 
						Inicio
					</a>
				</li>
			<?php if ($idrol ==  1 ){
				//USUARIO ADMINISTRADOR
				//SIMPLEMENTE TODO
			?>
				
				<li class="li mb-3">
					<label class="label_menu" for="drop-1">
						<a href="#">	
						<img class="img" class="img" src="icons/usuario.png" alt="">
						Beneficiario
						</a>
					</label>
					<ul id="list"class="ul mb-3 ">
						<li class="li "><a href="registro-personal.php">Registro</a></li>
						<li class="li"><a href="tabla-registro.php">Modificar</a></li>
						<li class="li"><a href="registro-tipo.php">Crear estatus</a></li>
						<li class="li"><a href="registro-ausencia.php">Ausencia justificada</a></li>	
					</ul >
				</li>
				<li class="li mb-3">
					<label class="label_menu" for="drop-2">
						<a href="#">	
							<img class="img" src="icons/sede.png" alt="">
						Dependencia
						</a>
					</label>
					<ul class="ul ">
						<li class="li"><a href="registo-sede.php">Crear dependencia</a></li>
					</ul class="ul">
				</li>
				<li class="li mb-3">
					<label class="label_menu" for="drop-2">
						<a href="#">
							<img class="img" src="icons/comedor.png" alt="">
							Comedor
						</a>
					</label>
					<ul class="ul ">
						<li class="li"><a href="reportes.php">Reporte</a></li>
						<li class="li"><a href="menu.php">Menu</a></li>
						<li class="li"><a href="registro-ticket.php">Tickect</a></li>
						<li class="li"><a href="registro_comer.php">Solicitud De Comida</a></li>
					</ul class="ul">				
				</li>
				<li class="li mb-3">
					<label class="label_menu" for="drop-2">
						<a href="" class="">
							<img class="img" src="icons/administracion.png" alt="">	
							Administracion
						</a>
					</label>
					<ul class="ul ">
						<li class="li"><a href="registro-usuario.php">Crear Usuario</a></li>
						<li class="li"><a href="tabla-usuario.php">Modificar Usuario</a></li>
						<li class="li"><a href="tabla-eliminados-registros.php">Personal eliminado</a></li>
					</ul class="ul">
				</li>
				
			<?php
			} ?>

			<?php if ($idrol ==  2 ){
				//USUARIO COMEDOR
				//ENCARGADO DE VER LOS REPORTES MENU Y TICKETS DEL COMEDOR
			?>
				<li class="li mb-3">
					<label class="label_menu" for="drop-2">
						<a href="#">
							<img class="img" src="icons/comedor.png" alt="">
							Comedor
						</a>
					</label>
					<ul class="ul ">
						<li class="li"><a href="reportes.php">Reporte</a></li>
						<li class="li"><a href="menu.php">Menu</a></li>
						<li class="li"><a href="registro-ticket.php">Tickect</a></li>
					</ul class="ul">				
				</li>

			<?php
			} ?>
			<?php if ($idrol ==  3){
				//BIENESTAR SOCIAL 
				//ENCARGADO DE LAS CARGAS DE AUSENCIA JUSTIFICADA
			?>
				<li class="li mb-3">
					<label class="label_menu" for="drop-2">
						<a href="#">
							<img class="img" src="icons/comedor.png" alt="">
							Comedor
						</a>
					</label>
					<ul class="ul ">
						<li class="li"><a href="menu.php">Menu</a></li>
					</ul class="ul">				
				</li>
				<li class="li mb-3">
					<label class="label_menu" for="drop-1">
						<a href="#">	
						<img class="img" class="img" src="icons/usuario.png" alt="">
						Beneficiario
						</a>
					</label>
					<ul id="list"class="ul mb-3 ">
						<li class="li"><a href="registro-ausencia.php">Ausencia justificada</a></li>	
					</ul >
				</li>

			<?php
			} ?>
			<?php if ($idrol ==  4){
				//ADMIN RRHH 
				//ENCARGADO DE LA CARGA DE LOS DATOS DE LOS MEIEMBROS DEL INCES
				//VER LOS REPORTES, MENU 
			?>
				<li class="li mb-3">
					<label class="label_menu" for="drop-1">
						<a href="#">	
						<img class="img" class="img" src="icons/usuario.png" alt="">
						Beneficiario
						</a>
					</label>
					<ul id="list"class="ul mb-3 ">
						<li class="li "><a href="registro-personal.php">Registro</a></li>
						<li class="li"><a href="tabla-registro.php">Modificar</a></li>
						<li class="li"><a href="registro-tipo.php">Crear estatus</a></li>
						<li class="li"><a href="registro-ausencia.php">Ausencia justificada</a></li>	
					</ul >
				</li>
				<li class="li mb-3">
					<label class="label_menu" for="drop-2">
						<a href="#">	
							<img class="img" src="icons/sede.png" alt="">
						Dependencia
						</a>
					</label>
					<ul class="ul ">
						<li class="li"><a href="registo-sede.php">Crear Dependencia</a></li>
					</ul class="ul">
				</li>
				<li class="li mb-3">
					<label class="label_menu" for="drop-2">
						<a href="#">
							<img class="img" src="icons/comedor.png" alt="">
							Comedor
						</a>
					</label>
					<ul class="ul ">
						<li class="li"><a href="reportes.php">Reporte</a></li>
						<li class="li"><a href="menu_comer.php">Menu</a></li>
					</ul class="ul">				
				</li>

			<?php
			} ?>
			<?php if ($idrol ==  5){
				//ADMIN RRHH 
				//ENCARGADO DE LA CARGA DE LOS DATOS DE LOS MEIEMBROS DEL INCES
				//VER LOS REPORTES, MENU 
			?>
				<li class="li mb-3">
					<label class="label_menu" for="drop-2">
						<a href="#">
							<img class="img" src="icons/comedor.png" alt="">
							Comedor
						</a>
					</label>
					<ul class="ul ">
						<li class="li"><a href="menu.php">Menu</a></li>
						<li class="li"><a href="registro_comer.php">Solicitud De Comida</a></li>
					</ul class="ul">				
				</li>
			<?php
			} ?>
				<li id="nosotros" class="li mb-3">
					<a href="./nosotros.php">
						<span class="mif-organization mif-3x principales">
							<img class="img" src="icons/grupo.png" alt="">
						</span>
						Nosotros
					</a>
				</li>	
				
			</ul >
			<!-- DATOS DEL RELOJ-->
			<div class="contenedor-reloj d-none d-lg-inline small text-white"> 
   				<div class="reloj"> 
					<div class="fecha"></div>
					<div names="tiempo" class="tiempo"></div> 
				</div>
			</div>
			<!-- DATOS DEL RELOJ-->
		</nav>
			

			
		</div>
	</div>		
</div>


