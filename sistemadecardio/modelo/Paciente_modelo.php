<?php 

/**
* 
*/
class Paciente_modelo{
	
	private $db;
	private $pacientes;

	function __construct(){
		# code...
		require_once("modelo/Conectar.php");
		$this->db = Conectar::conexion();

		$this->pacientes=array();

	}

	// función que devuelve un aray asociativo de la tabla paciente
	public function get_paciente(){
		# code...
		$consulta = $this->db->query("SELECT * FROM PACIENTE");

		while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
			# code...
			$this->pacientes[]=$registro;
		}

		return $this->pacientes;

	}


}

 ?>