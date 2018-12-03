<?php 
	
	require_once("modelo/funciones_propias.php");

	require_once("modelo/Usuario_modelo.php");

	$user = new Usuario_modelo();


	$tabla_observaciones = $user->get_observaciones($_SESSION['USUARIO_ACTUAL']);

	$existeCodigo = false;
	if ($tabla_observaciones) {
		# code...
		$existeCodigo = true;
	}

	if($existeCodigo){

		require_once("vista/historial_vista.php");
	}else{

		header("location:index.php");
	}



 ?>