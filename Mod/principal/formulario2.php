<?php
session_start();
include_once('../conexion.php');
include_once('../funciones.php'); 
if($_SESSION['cod_user']<>NULL or $_SESSION['cod_user']<>''){
}else{
	echo '<meta http-equiv="refresh" content="0;url=/Mod/error.php">';
}
$lineamientos = array('','LP1', 'LP2', 'LP3', 'LP4', 'LP7',);
$confi=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM confi WHERE id='1'"));
//tabla='producto'.$confi['anno'];
$tabla='producto';
if($_SERVER['REQUEST_METHOD']==='POST'){
	$valores="'".$_POST["Cod_Pres_SES"];
	$valores.="','".$_POST ["Descripcion_SES"]."','". $_POST["cod_pro_tari"]."','";
	$valores.=$_POST["Des_Codigo_Tari"]."','".$_POST["FONAFE"]."','";
	$valores.=$_POST["cta_contable"]."','".$_POST["des_cuenta_conta"]."'";

	$Columas="Cod_Pres_SES,Descripcion_SES,cod_pro_tari,Des_Codigo_Tari,FONAFE,cta_contable,des_cuenta_conta";
	$query="INSERT INTO ".$tabla."(".$Columas.")";
	$query.=" VALUES (".$valores.")";
	mysqli_query($conexion,$query);

	

	
}
?>
<!doctype html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		/* Chrome, Safari, Edge, Opera */
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		/* Firefox */
		input[type=number] {
			-moz-appearance: textfield;
		}
	</style>
	<title>Bienvenido!</title>
</head>

<body>

	<?php include_once('../menu.php'); ?>
	<div style="width: 100%;overflow-x: auto;white-space: nowrap;">

		<main style="max-width: 40%;overflow-x: auto;white-space: nowrap;margin:15rem 25%;" class="">

			<form method="POST">
				<h2 style="text-align: center;">Formulario de produccion</h2>
				<div class="form-group" style="margin: 10px 20px;">
					<label for="Cod_Pres_SES">Cod_Pres_SES</label>
					<input type="text" class="form-control" id="Cod_Pres_SES" name="Cod_Pres_SES" placeholder="Cod_Pres_SES">
				</div>
				<div class="form-group" style="margin: 10px 20px;">
					<label for="Descripcion_SES">Descripcion_SES</label>
					<input type="text" class="form-control" id="Descripcion_SES" name="Descripcion_SES" placeholder="Descripcion_SES">
				</div>
				<div class="form-group" style="margin: 10px 20px;">
					<label for="Descripcion_SES" >cod_pro_tari</label>
					<input type="text" class="form-control" id="cod_pro_tari" name="cod_pro_tari" placeholder="cod_pro_tari">
				</div>
				<div class="form-group" style="margin: 10px 20px;">
					<label for="Des_Codigo_Tari">Des_Codigo_Tari</label>
					<input type="text" class="form-control" id="cod_pro_tari" name="Des_Codigo_Tari" placeholder="Des_Codigo_Tari">
				</div>
				<div class="form-group" style="margin: 10px 20px;">
					<label for="FONAFE">FONAFE</label>
					<input type="text" class="form-control" id="FONAFE" name="FONAFE" placeholder="FONAFE">
				</div>
				<div class="form-group" style="margin: 10px 20px;">
					<label for="cta_contable">cta_contable</label>
					<input type="text" class="form-control" id="cta_contable" name="cta_contable" placeholder="cta_contable">
				</div>

				<div class="form-group" style="margin: 10px 20px;">
					<label for="des_cuenta_conta">des_cuenta_conta</label>
					<input type="text" class="form-control" id="des_cuenta_conta" name="des_cuenta_conta" placeholder="des_cuenta_conta">
				</div>
				<br>
				
				
				<button type="submit" class="btn btn-primary mb-2" style="margin: 10px 20px;">Confirm identity</button>
			</form>
	</div>




	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		-->

	<!------------------------------------------------------------------------------------------>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!------------------------------------------------------------------------------------------>

</body>

</html>