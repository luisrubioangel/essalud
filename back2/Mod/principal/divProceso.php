<?php 
	session_start();
	include_once('../conexion.php');
	include_once('../funciones.php');
	
	$confi=mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM confi WHERE id='1'"));
	$tabla='programacion'.$confi['anno'];
	
	$valor=$_GET['i'];
	$id_mes=$_GET['id_mes'];
	$codigo=$_GET['x'];
	
	$campo='ITEM'.$id_mes;
	
	mysqli_query($conexion,"UPDATE ".$tabla." SET ".$campo."='$valor' WHERE CPTO='$codigo' and usu='".$_SESSION['cod_user']."'");
	
	
	
	
?>