<?php	
    $conexion = mysqli_connect("localhost","root","root","peru2") 
	or die("Error no conecta".mysqli_error($conexion));
	
	date_default_timezone_set("America/Bogota");
    mysqli_query($conexion,"SET NAMES utf8");
	mysqli_query($conexion,"SET CHARACTER_SET utf");
	$s='$';
	
	function limpiar($tags){
		$tags = strip_tags($tags);
		$tags = stripslashes($tags);
		$tags = htmlentities($tags, ENT_QUOTES, 'UTF-8');
		$tags = trim($tags);
		return $tags;
	}
?>