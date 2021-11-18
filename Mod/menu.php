<?php 
?>
<nav class="navbar navbar-expand-lg navbar-light bg-primary" style=" position: fixed;width: 100%;z-index: 1000;">
	<div class="container-fluid">
		<a class="navbar-brand text-white" href="../principal/">EsSalud</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<!--
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>-->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Usuarios
					</a>
					<ul class="dropdown-menu text-white" aria-labelledby="navbarDropdown">						
						<li><a class="dropdown-item" href="../usuario/admin.php">Listado de Usuarios</a></li>
						<li><a class="dropdown-item" href="../principal/index.php">Registro de programación de metas por actividad</a></li>
						<li><a class="dropdown-item" href="../principal/lineamientos.php">Registro de programación de metas por prestaciones y Lineamientos</a></li>
						<li><a class="dropdown-item" href="../usuario/admin.php">Avance de programación de metas</a></li>

					</ul>
				</li>
				<!--
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li>-->
			</ul>
			<div class="d-flex">
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
						<?php echo $_SESSION['cod_user']; ?>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="../salir.php">Salir</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav><br><br><br>