<?php 


/**
* 
*/

class Usuario_modelo{
	
	private $db;
	private $usuarios;
	private $observaciones;

	function __construct($url="modelo/Conectar.php"){ //
		# code...
		require_once($url);
		$this->db=Conectar::conexion();

		$this->usuarios=array();

		$this->observaciones=array();

	}

	public function get_usuarios(){ // * modificar para crear la páginación. Recibir por parametro el número para el inicio de la páginación
		# code...
		$consulta = $this->db->query("SELECT * FROM USUARIO");

		while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
			# code...
			$this->usuarios[] = $registro;
		}

		return $this->usuarios;

	}

	public function ingresar_sistema($user, $password){

		$login = htmlentities(addslashes($user));
		$password = htmlentities(addslashes($password));

		$consulta = $this->db->prepare("SELECT * FROM USUARIO WHERE Correo = :login AND Contrasena = :password");

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


	public function set_usuario($nombre,$apellidos,$dni,$email,$direccion,$celular,$constrasena,$tipo_usuario){

		$sql = "INSERT INTO USUARIO (DNI, Nombre, Apellido, Direccion, Correo, Celular, Contrasena, Tipo_usuario) VALUES (:dni, :nombre, :apellidos, :direccion, :email, :celular, :constrasena, :tipo_usuario)";

		$consulta = $this->db->prepare($sql);

		$consulta->execute(array(":dni" => $dni, ":nombre" => $nombre, ":apellidos" => $apellidos, ":direccion" => $direccion, ":email" => $email, ":celular" => $celular, ":constrasena" => $constrasena, ":tipo_usuario" => $tipo_usuario));

	}


	public function set_observacion($obs, $id_user){

		$sql = "INSERT INTO observaciones (id, observacion, id_usuario) VALUES (NULL,:obs, :id_usuario)";
		$consulta = $this->db->prepare($sql);
		$consulta->execute(array(':obs' => $obs, "id_usuario" => $id_user));

	}

	public function get_observaciones($id){
		$consulta = $this->db->query("SELECT * FROM observaciones WHERE id_usuario=$id");

		while ($registro_obs = $consulta->fetch(PDO::FETCH_ASSOC)) {
			# code...
			$this->observaciones[] = $registro_obs;
		}

		return $this->observaciones;
	}

	public function mensaje_de_aliento(){
		return "VAMO Ptito LA LENYN, TU PUEDES!!!";
	}

}


////jeecutar solo cuando todo esté predido :v 
//$person = new Usuario_modelo("../modelo/Conectar.php");
//echo $person->set_observacion("lalalalal",12324);

 ?>


