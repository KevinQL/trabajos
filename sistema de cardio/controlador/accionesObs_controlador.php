<?php 

	require_once("../modelo/Usuario_modelo.php");

	$user = new Usuario_modelo("../modelo/Conectar.php");



	if (isset($_GET['traeObs'])) {
		# code...

		//funcion para traer observacion en funcion de la fecha O el id
		$obsText = $user->get_observaciones_fecha($_POST['fecha']);

		echo $obsText[0]['observacion'] ; // esto regresa la observacion para el textarea

	}else if (isset($_GET['modifica'])) {
		# code...
		$obs = $_POST['observacion'];
		$fecha = $_POST['fecha'];

		$user->actualizar_observacion($fecha, $obs);

		echo "MODIFICACION EXITOSA ";

	}else if (isset($_GET['elimina'])) {
		# code...
		$fecha = $_GET['fecha_eli'];
		$user->eliminar_observacion($fecha);

		header("location:../index.php?historial");

	}else{
		echo "NO SE ELIGIO OPCIÓN";
	}




 ?>