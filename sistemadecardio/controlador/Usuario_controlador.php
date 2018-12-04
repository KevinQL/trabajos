<?php 


	require_once("modelo/funciones_propias.php");
	//imprime los datos de los pacientes

	require_once("modelo/Usuario_modelo.php");

	$usuario = new Usuario_modelo();

	$tabla_usuario = $usuario->get_usuarios();


	require_once("vista/pacientes_vista.php");

	
 ?>