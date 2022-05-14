<?php
include('class.php');

if(isset($_POST['crear'])){
	$nuevo = $_POST['nuevo'];

	$location =  utf8_decode('subidos/Documentales/'.$_POST['nuevo'].'/');

mysql_query("SET NAMES 'utf8'");


		if(!file_exists($location)){

				mkdir($location);
			}


		mysql_query("REPLACE INTO progra3 (nombre) VALUES ('$nuevo')");

		header('Location:index4.php');
}


?>