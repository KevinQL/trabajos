<?php 


/**
* 
*/

class Usuario_modelo{
	
	private $db;
	private $usuarios;
	private $usuario;
	private $observaciones;

	function __construct($url="modelo/Conectar.php"){ //
		# code...
		require_once($url);
		$this->db=Conectar::conexion();

		$this->usuarios=array();

		$this->usuario=array();

		$this->observaciones=array();

	}

	public function get_usuarios(){ // * modificar para crear la páginación. Recibir por parametro el número para el inicio de la páginación
		# code...
		$consulta = $this->db->query("SELECT * FROM usuario WHERE Tipo_usuario = 'paciente'");

		while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
			# code...
			$this->usuarios[] = $registro;
		}

		return $this->usuarios;

	}

	public function get_usuario($id){ // * modificar para crear la páginación. Recibir por parametro el número para el inicio de la páginación
		# code...
		$consulta = $this->db->query("SELECT * FROM usuario WHERE DNI=$id");

		while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
			# code...
			$this->usuario[] = $registro;
		}

		return $this->usuario;

	}
/**/
	public function get_admin($email){ 
		# code...
		$consulta = $this->db->query("SELECT * FROM usuario WHERE Correo='$email'");

		$admin = array();
		while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
			# code...
			$admin[] = $registro;
		}

		return $admin;

	}

	public function ingresar_sistema($user, $password){

		$login = htmlentities(addslashes($user));
		$password = htmlentities(addslashes($password));

		$consulta = $this->db->prepare("SELECT * FROM usuario WHERE Correo = :login AND Contrasena = :password AND Tipo_usuario = 'admin'");

		$consulta->bindValue(":login", $login);
		$consulta->bindValue(":password", $password);

		$consulta->execute();

		$num_registro = $consulta->rowCount();

		if ($num_registro) {
			# code...
			return true;
		}else{
			return false;
		}


	}

	public function ingresar_sistema_pv($user,$password){

		$consulta = $this->db->query("SELECT * FROM usuario WHERE Correo= '$user' AND Tipo_usuario = 'admin'");

		$result = false;
		while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
			# code...		
			if (password_verify($password, $registro['Contrasena'])) {
				# code...
				$result = true;
			}
		}

		return $result;
//-------------	
	}


	public function set_usuario($nombre,$apellidos,$dni,$email,$direccion,$celular,$celular2,$constrasena,$tipo_usuario){

		$sql = "INSERT INTO usuario (DNI, Nombre, Apellido, Direccion, Correo, Celular, celular2, Contrasena, Tipo_usuario) VALUES (:dni, :nombre, :apellidos, :direccion, :email, :celular,:celular2, :constrasena, :tipo_usuario)";

		$consulta = $this->db->prepare($sql);
		//encriptandooo
		$contrasenia = password_hash($constrasena,PASSWORD_DEFAULT);

		$consulta->execute(array(":dni" => $dni, ":nombre" => $nombre, ":apellidos" => $apellidos, ":direccion" => $direccion, ":email" => $email, ":celular" => $celular, ":celular2" => $celular2, ":constrasena" => $contrasenia, ":tipo_usuario" => $tipo_usuario));

		//tabla datos_usuario
		$this->db->query("INSERT INTO datos_paciente (id, peso, talla, alergia, observacion, dni_usuario) VALUES (NULL,NULL,NULL,NULL,NULL,$dni)");

	}

	public function actualizar_datos_paciente($dni, $peso, $talla, $alergia, $observacion){

		$sql = "UPDATE datos_paciente SET peso=:peso, talla=:talla, alergia=:alergia, observacion=:observacion WHERE dni_usuario = :dni";

		$consulta = $this->db->prepare($sql);

		$consulta->execute(array(":dni" => $dni, ":peso" => $peso, ":talla" => $talla, ":alergia" => $alergia, ":observacion" => $observacion));

	}

	public function get_datos_paciente($dni_user){
		$consulta = $this->db->query("SELECT * FROM datos_paciente WHERE dni_usuario=$dni_user");

		$datos_paciente = array();
		while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
			# code...
			$datos_paciente[] = $registro;
		}

		return $datos_paciente;
	}

	public function actualizar_usuario($dni, $nombre, $apellidos, $email, $celular, $celular2){

		$sql = "UPDATE usuario SET Nombre=:nombre, Apellido=:apellidos, Correo=:email, Celular=:celular, celular2=:celular2 WHERE DNI = :dni";

		$consulta = $this->db->prepare($sql);

		$consulta->execute(array(":dni" => $dni, ":nombre" => $nombre, ":apellidos" => $apellidos, ":email" => $email, ":celular" => $celular, ":celular2" => $celular2));

	}


	public function set_observacion($obs, $id_user){

		$sql = "INSERT INTO observaciones (id, observacion, id_usuario) VALUES (NULL,:obs, :id_usuario)";
		$consulta = $this->db->prepare($sql);
		$consulta->execute(array(':obs' => $obs, "id_usuario" => $id_user));

	}

	public function actualizar_observacion($fecha, $obs){

		$sql = "UPDATE observaciones SET observacion=:obs WHERE fecha = :fecha";
		$consulta = $this->db->prepare($sql);
		$consulta->execute(array(":fecha" => $fecha, ":obs" => $obs));
	}

	public function eliminar_observacion($fecha){
		$this->db->query("DELETE FROM observaciones  WHERE fecha='$fecha'");
	}

	public function get_observaciones($id){
		$consulta = $this->db->query("SELECT * FROM observaciones WHERE id_usuario=$id ORDER BY fecha DESC");

		while ($registro_obs = $consulta->fetch(PDO::FETCH_ASSOC)) {
			# code...
			$this->observaciones[] = $registro_obs;
		}

		return $this->observaciones;
	}

	public function get_observaciones_fecha($fecha){

		$consulta = $this->db->query("SELECT observacion FROM observaciones WHERE fecha='$fecha'"); // para las fechas usar comillas simples :O

		$obs_fecha = array();

		while ($registro_obs = $consulta->fetch(PDO::FETCH_ASSOC)) {
			# code...
			$obs_fecha[] = $registro_obs;
		}

		return $obs_fecha;
	}




	public function existe_usuario($id){
		$consulta = $this->db->query("SELECT * FROM usuario WHERE DNI=$id");

		while ($registro_obs = $consulta->fetch(PDO::FETCH_ASSOC)) {
			# code...
			$this->observaciones[] = $registro_obs;
		}

		return $this->observaciones;
	}


}


 ?>


