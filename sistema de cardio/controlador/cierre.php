<?php 

	session_start();

	session_destroy();

	echo "Cerrado";
	header("location:../index.php");

 ?>