<?php
	include("connect_bd.php");

	$sql = "SELECT * FROM bc_usuarios 
	WHERE usuario = '{$_POST['usuario']}' 
		AND senha = '{$_POST['senha']}'";

	$resultado = mysql_query($sql);
	$row = mysql_fetch_assoc($resultado);

	if (isset($row['usuario'])) {
		session_start();
		$_SESSION['id'] = $row['id'];
		$_SESSION['usuario'] = $row['usuario'];
	}

	header('location: /bancocentral/index.php');
