<?php


session_start();

if (isset($_SESSION["USUARIO"])) {
	# code...
	if (isset($_GET['paciente'])) {
		# code...
		//opción de págian de pacientes
		require_once("controlador/Usuario_controlador.php");

	}else if (isset($_GET['historial'])) {
		# code...
		require_once("controlador/historial_controlador.php");

	}else if (isset($_GET['actualizar'])) {
		# code...
		require_once("controlador/actualizar_controlador.php");
	}else if(isset($_GET['registro'])){
		#
		require_once("controlador/Opcion_registro.php");
	}
	else{
		//pagina de inicio INTCAP
		require_once("controlador/inicio_controldor.php");
	}





// si no existe la variable $_SESSION entoces se ejecutará la linea del else
}else{

	if (isset($_GET["registrar"])) {
		# code...
		require_once("vista/registrarse.html");
	}else{
		// también devuelve la página de inicio de sesion
		require_once("controlador/Logueo_controlador.php");
	}


}



 ?>
