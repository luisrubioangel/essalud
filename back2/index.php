<?php 
	session_start();
	include_once('mod/conexion.php');
	include_once('mod/funciones.php');
?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<!-- ICONOS --->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<title>Hello, world!</title>
	</head>
	<body class="text-center">
		
		<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				user-select: none;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
			
			html,
			body {
			  height: 100%;
			}

			body {
			  display: flex;
			  align-items: center;
			  padding-top: 40px;
			  padding-bottom: 40px;
			  background-color: #f5f5f5;
			}

			.form-signin {
			  width: 100%;
			  max-width: 330px;
			  padding: 15px;
			  margin: auto;
			}

			.form-signin .checkbox {
			  font-weight: 400;
			}

			.form-signin .form-floating:focus-within {
			  z-index: 2;
			}

			.form-signin input[type="email"] {
			  margin-bottom: -1px;
			  border-bottom-right-radius: 0;
			  border-bottom-left-radius: 0;
			}

			.form-signin input[type="password"] {
			  margin-bottom: 10px;
			  border-top-left-radius: 0;
			  border-top-right-radius: 0;
			}
			
		</style>
		
		<main class="form-signin" style="width:55%;!important">
			<?php 
			
				if(!empty($_POST['usu']) and !empty($_POST['pass'])){
					$usu=limpiar($_POST['usu']);
					$pass=limpiar($_POST['pass']);
					$pass=claves($pass);
					
					$ss=mysqli_query($conexion,"SELECT * FROM username WHERE IDNAME='$usu' and pass='$pass'");
					if($rr=mysqli_fetch_array($ss)){
						if($rr['ACTIVO']=='1'){
							$_SESSION['cod_user']=$usu;
							echo mensajes('Bienvenido al Sistema','azul');
							echo '<meta http-equiv="refresh" content="1;url=Mod/principal/">';

						}else{
							echo mensajes('El Usuario no se encuentra activado','rojo');
						}
					}else{
						echo mensajes('El Usurio o Contraseña son incorrectas','rojo');
					}
				}
			?>
			<form name="" action="" method="post">
				<img class="mb-4" src="img/logo.jpg" alt="" width="210" height="150">
				<h1 class="h3 mb-3 fw-normal">Ingresar al Sistema</h1>

				<div class="form-floating">
					<input type="text" name="usu" class="form-control" id="floatingInput" placeholder="name@example.com">
					<label for="floatingInput">Usuario</label>
				</div>
				<div class="form-floating">
					<input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password">
					<label for="floatingPassword">Contraseña</label>
				</div>
				<!--
				<div class="checkbox mb-3">
					<label>
						<input type="checkbox" value="remember-me"> Remember me
					</label>
				</div>
				-->
				<button class="w-100 btn btn-lg btn-primary" type="submit"><i class="fas fa-key"></i> <strong>Entrar</strong></button>
				
			</form>
		</main>

		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!--
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		-->
	</body>
</html>