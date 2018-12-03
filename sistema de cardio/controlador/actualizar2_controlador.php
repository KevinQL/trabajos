<?php 
	
	session_start();

	$id = $_SESSION['USUARIO_ACTUAL'];

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellidos'];
	$email = $_POST['email'];
	$celular = $_POST['celular'];
	$dni = $_POST['dni'];

	$peso = $_POST['pesokg'];
	$talla = $_POST['talla'];
	$alergia = $_POST['alergias'];
	$observacion = $_POST['observacion'];


	require_once("../modelo/Usuario_modelo.php");

	$user = new Usuario_modelo('../modelo/Conectar.php');

	$user->actualizar_datos_paciente($id, $peso, $talla, $alergia, $observacion);
	$user->actualizar_usuario($id, $nombre, $apellido,$email, $celular);

	echo "LOS DATOS SE ACTUALIZARON CORRECTAMENTE";

 ?>