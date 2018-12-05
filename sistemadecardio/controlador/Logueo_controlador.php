<?php 

//Se envian datos desde el formulario que está en el archivo session.html
//Se redirecciona desde el index si es que es la primera vez que se ingresa al sistema


if (isset($_POST["enviar"])) { // recibe datos de inicio de sesion
	# code...
	$usuario=$_POST["login"];
	$password=$_POST["password"];

	
	//recreo las funciones de logueoo!!
	// o si ingresa o si nuevamente index

	require_once("../modelo/Usuario_modelo.php");

	$Loguearse = new Usuario_modelo("../modelo/Conectar.php");//modificamos la dirección debido a que el fomrulario redirecciona directamente a este archivo... con el header()
	$ingreso = $Loguearse->ingresar_sistema($usuario,$password);
	//$admin = $Loguearse->get_admin($usuario);
	if ($ingreso) {
		# code...
		session_start();
		$_SESSION["USUARIO"] = ""; // ver
		$_SESSION['USUARIO_ACTUAL']=111;
		$_SESSION['URL'] = "";
		header("location:../index.php"); //Importante!!! el formulario redirecciona a está página. por lo tanto estamos en está dirección /controlador/logueo_controlador.php. para llegar a la pagina index.php necesitamos la ruta descrita en la funcion header();
	}else{

		header("location:../index.php");

	}



}else if (isset($_POST["registrar_usuario"])) { // if para el registrooo de usuario
	# code...
	$nombre=$_POST["nombre"];
	$apellidos=$_POST["apellidos"];
	$dni=$_POST["dni"];
	$email=$_POST["email"];
	$direccion=$_POST["direccion"];
	$celular=$_POST["celular"];
	$celular2=$_POST["celular2"];
	$password=$_POST["password"];
	$tipo_usuario = "admi";

	require_once("../modelo/Usuario_modelo.php");

	$usuario = new Usuario_modelo("../modelo/Conectar.php");

	$usuario->set_usuario($nombre,$apellidos,$dni,$email,$direccion,$celular,$celular2,$password,$tipo_usuario);

	header("location:../index.php");


}else if (isset($_GET['registrar_paciente']) ) {
	# code...

	$nombre=$_POST["nombre"];
	$apellidos=$_POST["apellidos"];
	$dni=$_POST["dni"];
	$email=$_POST["email"];
	$direccion=$_POST["direccion"];
	$celular=$_POST["celular"];
	$celular2=$_POST["celular2"];
	$password="no";
	$tipo_usuario = "paciente";

	require_once("../modelo/Usuario_modelo.php");

	$usuario = new Usuario_modelo("../modelo/Conectar.php");

	$usuario->set_usuario($nombre,$apellidos,$dni,$email,$direccion,$celular,$celular2,$password,$tipo_usuario);

	echo "PACIENTE INSERTADO";


}else{

	require_once("vista/sesion.html"); //cuando no existe inicio de sesion

}

// registrarse!!!







 ?>








