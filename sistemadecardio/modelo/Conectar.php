<?php 

	/**
	* 
	*/
	class Conectar{
		
		public static function conexion(){

			try{

				$conexion =new PDO("mysql:host=localhost; dbname=ritmocardiaco","root","");

				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$conexion->exec("SET CHARACTER SET utf8");

			}catch(Exception $e){

				die("ERROR". $e->getMessage());
				echo "Linea de error ". $e->getLine();
			}

			return $conexion;
		}
	}
	
	//Conectar::conexion();	

 ?>