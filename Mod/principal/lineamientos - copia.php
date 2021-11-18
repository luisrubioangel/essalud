<?php 
	session_start();
	include_once('../conexion.php');
	include_once('../funciones.php');
	if($_SESSION['cod_user']<>NULL or $_SESSION['cod_user']<>''){
	}else{
		echo '<meta http-equiv="refresh" content="0;url=/Mod/error.php">';
	}
	$meses = array('','	LP1', 'LP2', 'LP3', 'LP4', 'LP7',);
	$confi=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM confi WHERE id='1'"));
	$tabla='programacion'.$confi['anno'];
?>

<!doctype html>
<html lang="en">
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
		<div style="width: 1780px;overflow-x: auto;white-space: nowrap;font-size:14px;">
			<div id="divProceso"></div>
			<form name="form" action="" method="post">
			<input type="hidden" name="procesar" value="1">
			<table class="table table-bordered table-hover">
				<tr class="table-secondary">
					<td><strong>CODIGO</strong></td>
					<td width="100px"><strong>DESCRIPCION</strong></td>
					<td><strong>Unidad<br>Medida</strong></td>
					<td><strong>Ejecutado<br>2019</strong></td>
					<td><strong>Ejecutado<br>2020</strong></td>
					<td><strong>Ejecutado<br>JUN 2021</strong></td>
					<?php 
						for ($id_mes = 1; $id_mes <= 5; $id_mes++) { 
							echo '<td><strong>'.$meses[$id_mes].'</strong></td>';
						}
					?>
					<td><center><strong>Total</strong></center></td>
					<td><div align="right"><strong>Tarifa</strong></div></td>
					<td><div align="right"><strong>Total s/</strong></div></td>
				</tr>
				<?php 
					
				
					$ss=mysqli_query($conexion,"SELECT * FROM producto ORDER BY actividad LIMIT 10");
					while($rr=mysqli_fetch_array($ss)){
						
						$sql=mysqli_query($conexion,"SELECT id FROM ".$tabla." WHERE CPTO='".$rr['Cod_Pres_SES']."' and usu='".$_SESSION['cod_user']."'");
						if($row=mysqli_fetch_array($sql)){
							
						}else{
							mysqli_query($conexion,"INSERT INTO ".$tabla." (CPTO,usu) VALUES ('".$rr['Cod_Pres_SES']."','".$_SESSION['cod_user']."')");
						}
						
						$nombre=$rr['actividad'];
						$mitad = strlen($nombre ) / 2; //Cantidad de letras en $nombre dividida entre 2 
						$parte1 = substr($nombre , 0, $mitad); 
						$parte2 = substr($nombre , $mitad); 						
				?>
				<tr>
					<td><?php echo $rr['Cod_Pres_SES']; ?></td>
					<td><?php echo $parte1.'<br>'.$parte2; ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<?php 
						$total=0;
						for ($id_mes = 1; $id_mes <= 5; $id_mes++) { 
							$campo='ITEM'.$id_mes;
							$valor=consultar($campo,$tabla,"CPTO='".$rr['Cod_Pres_SES']."' and usu='".$_SESSION['cod_user']."'");
							if($valor==''){$valor=0;}
							$total=$total+$valor;
							$divProceso=$rr['Cod_Pres_SES'].'_'.$id_mes;
					?>
						<script>
							function divProceso<?php echo $divProceso; ?>(valor){
								$(document).ready(function(){
									$("#divProceso").load("divProceso.php?i=" + valor + "&x=<?php echo $rr['Cod_Pres_SES']; ?>" + "&id_mes=<?php echo $id_mes ?>");
								});
							}
						</script>
						
					<?php					
							echo '<td><input type="number" class="form-control" name="mes'.$id_mes.'" autocomplete="off" min="0" onchange="divProceso'.$divProceso.'(this.value);"
							value="'.$valor.'" style="font-size:10px"></td>';
						}
					?>
					<td><center><?php echo $total; ?></center></td>
					<td><div align="right"></div></td>
					<td><div align="right"></div></td>
				</tr>
				<?php } ?>
			</table>
			<button type="submit" class="btn btn-primary" style="width:98%!important"><strong>Registrar</strong></button>
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