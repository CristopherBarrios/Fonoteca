<?php
include('../../class.php');
include('functions.php');


function sqlUpdate($con, $tabla2, $name1, $fechal, $imagen, $audio1, $id) {
	mysqli_query($con,"UPDATE ".$tabla2." SET name='$name1', fecha='$fechal' , path='$imagen' , audio='$audio1' WHERE id='$id'");

}

function mainUpdate($con) {
	list($name1, $fechal, $imagen, $audio1, $tabla, $tabla2, $id) = insertion();
	sqlSelectOrder($con, $tabla);
	sqlUpdate($con, $tabla2, $name1, $fechal, $imagen, $audio1, $id);
}



if(isset($_POST['modificar'])){
	mainUpdate($con);
	header('Location:../index/index1.php');
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['modificarentre'])){
	mainUpdate($con);
	header('Location:../index/index2.php');
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['modificarmus'])){
	mainUpdate($con);
	header('Location:../index/index3.php');
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['modificardoc'])){
	mainUpdate($con);
	header('Location:../index/index4.php');
	}
?>	