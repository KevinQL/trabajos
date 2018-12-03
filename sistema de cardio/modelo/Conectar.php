<?php 

	/**
	* 
	*/
	class Conectar{
		
		public static function conexion(){

			try{

				$conexion =new PDO("mysql:host=localhost; dbname=ritmocardiaco","root","");
				//$conexion =new PDO("mysql:host=178.33.162.219; dbname=avuxtsqa_ritmocardiaco","avuxtsqa_lenyn","L3n1n3l118L3n1n3l118");

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