<?php 
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style=" position: fixed;width: 100%;z-index: 1000;">
	<div class="container-fluid">
		<a class="navbar-brand" href="../principal/">SoftUnicorn</a>
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
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Usuarios
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">						
						<li><a class="dropdown-item" href="../usuario/admin.php">Listado de Usuarios</a></li>
					</ul>
				</li>
				<!--
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li>-->
			</ul>
			<div class="d-flex">
				<h4><?php echo $_SESSION['cod_user']; ?></h4>
			</div>
		</div>
	</div>
</nav><br><br><br>