<?php 

//Se envian datos desde el formulario que está en el archivo session.html
//Se redirecciona desde el index si es que es la primera vez que se ingresa al sistema


if (isset($_POST["enviar"])) {
	# code...
	$usuario=$_POST["login"];
	$password=$_POST["password"];

	//require_once("modelo/Usuario_modelo.php");
	
	//recreo las funciones de logueoo!!

	// o si ingresa o si nuevamente index

			try {
				$conexion = new PDO("mysql:host=localhost; dbname=ritmocardiaco", 'root','');

				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//--------------------

				$sql = "SELECT * FROM USUARIO WHERE Correo = :login AND Celular = :password";

				$resultado = $conexion -> prepare($sql);

				$login = htmlentities(addslashes($_POST["login"]));  //evitar sqlinyection

				$password = htmlentities(addslashes($_POST["password"]));

				$resultado ->bindValue(":login", $login);  //asocia valores
				$resultado ->bindValue(":password", $password);

				$resultado -> execute();

				$numero_registros = $resultado -> rowCount();

				if ($numero_registros) {
					# code...

					session_start();

					$_SESSION["USUARIO"] = $_POST["login"];

					header("location:../index.php"); //Importante!!! el formulario redirecciona a está página. por lo tanto estamos en está dirección /controlador/logueo_controlador.php. para llegar a la pagina index.php necesitamos la ruta descrita en la funcion header();
					echo "INGRESOO!!! XD";

				}else{

					header("location:../index.php");
					echo "NO INGRESOO!!! :C";

					
				}

			}catch(Exception $e) {
				
				die("Error: " . $e->getMessage());

			}



}else{

	require_once("vista/sesion.html");
}







 ?>