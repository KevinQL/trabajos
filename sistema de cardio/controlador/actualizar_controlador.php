<?php 
	
	//LA SESSION YA SE INICIO EN EL ARCHIVO index.php!!
	
	require_once("modelo/funciones_propias.php");

	require_once("modelo/Usuario_modelo.php");

	$user = new Usuario_modelo();


	$tabla_usuario = $user->existe_usuario($_SESSION['USUARIO_ACTUAL']);

	$existeUsuario = false;
	if ($tabla_usuario) {
		# code...
		$existeUsuario = true;
	}

	if($existeUsuario){

		$tabla_paciente = $user->get_usuario($_SESSION['USUARIO_ACTUAL']);
		$tabla_datos_paciente = $user->get_datos_paciente($_SESSION['USUARIO_ACTUAL']);

		require_once("vista/actualizar_vista.php");
	}else{

		header("location:index.php");
	}



 ?>