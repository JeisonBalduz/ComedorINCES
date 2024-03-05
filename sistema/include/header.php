
<div id="content-wrapper" >
	<div id="content">
		<nav id="nav" class="navbar navbar-expand navbar-light  text-white topbar mb-4 static-top shadow">
		
		
			<div id="conten-img"class="sidebar-brand-icon rotate-n-15">
				<img  src="include/inces.png" class="img-thumbnail">
			</div>
			
			<div class="input-group d-none d-lg-inline small">
				<h6>Sistema del comedor del inces aragua</h6>
				<p class="ml-auto"><strong>Venezuela</strong></p>
			</div>
			
			<ul class="navbar-nav ml-auto">
				<div class="topbar-divider d-none d-sm-block"></div>
						<!-- Dropdown - User Information -->
				<li id="lista" class="nav-item dropdown" >
          			<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<span class="mr-2 d-none d-lg-inline small text-white"><?php echo $_SESSION['usuario'];  ?></span> 
          			</a>
          			<ul id="lista2"class="dropdown-menu">
            			<li class="d-flex li-header">
							<a href="php/cerrar_sesion.php " class="a-header">
								<img src="icons/cerrar-sesion.png" alt=""> Cerrar Sesion
							</a>
						</li>
          			</ul>
        		</li>
			</ul>
				
				
							
			<div class="img_menu">
				<button id="menu2" >
					<img  src="icons/menu.png" alt="">
				</button>
			</div>
				
							

		</nav>
		
	</div>
</div>
<?php include_once "menu_2.0.php"; ?>

