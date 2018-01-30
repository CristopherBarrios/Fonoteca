<?php
include('class.php');

if(isset($_POST['crear'])){
	$nuevo = $_POST['nuevo'];

	$location =  utf8_decode('subidos/Programas/'.$_POST['nuevo'].'/');

mysql_query("SET NAMES 'utf8'");


		if(!file_exists($location)){

				mkdir($location);
			}


		mysql_query("REPLACE INTO progra (nombre) VALUES ('$nuevo')");

		header('Location:index1.php');
}




?>