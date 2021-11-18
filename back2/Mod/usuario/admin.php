<?php 
	session_start();
	include_once('../conexion.php');
	include_once('../funciones.php');
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
		<!-- MyTable -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
		<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
		
		<script>
			$(document).ready(function() {
				$('#table_id').DataTable();
			} );
		</script>
		<title>Administrar Usuarios</title>
	</head>
	<body>
		<?php include_once('../menu.php'); ?>
		
		<div align="center"><div style="width:95%;!important">
			<h3>Administrar Informacion de Usuarios</h3>
			
			<div class="card">
				<div class="card-body">
					<table id="table_id" class="display" style="width:100%">
						<thead>
							<tr class="table-secondary">
								<th>Usuario</th>
								<th>Nombre del Usuario</th>
								<th>Activo</th>
								<th>Red</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$ss=mysqli_query($conexion,"SELECT * FROM username ORDER BY DESCRIPCION_RED");
								while($rr=mysqli_fetch_array($ss)){
									if($rr['ACTIVO']=='1'){
										$activo='SI';
									}elseif($rr['ACTIVO']=='0'){
										$activo='NO';
									}
							?>
							<tr>
								<td><?php echo $rr['IDNAME']; ?></td>
								<td><?php echo $rr['RED_IPRESS_LARGO']; ?></td>
								<td><?php echo $activo; ?></td>
								<td><?php echo $rr['DESCRIPCION_RED']; ?></td>
								<td>
									<center>
										<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#e<?php echo $rr[0]; ?>">
											<strong>Admin</strong>
										</button>
									</center>
								</td>
							</tr>
							
							<div class="modal fade" id="e<?php echo $rr[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<form name="form" action="" method="post">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Administrar Informacion</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<h3 class="text-success"><?php echo $rr['RED_IPRESS_LARGO']; ?></h3>
											
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="far fa-times-circle"></i> <strong>Cerrar</strong></button>
											<button type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i> <strong>Aceptar</strong></button>
										</div>
									</div>
								</div>
								</form>
							</div>
							
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		
		<!-- Optional JavaScript; choose one of the two! -->

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!--
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		-->
	</body>
</html>