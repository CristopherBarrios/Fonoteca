<?php
include('../../class.php');
include('functions.php');

function nuevoPrograma() {
    $nuevo = $_POST['nuevo'];
    list(, $ubica, $tabla) = OpUbica();
    $location =  utf8_decode($ubica.$nuevo.'/');
    
	if(!file_exists($location)){
		mkdir($location);
	}
    return [$tabla, $nuevo];
}

function sqlReplace($con,$tabla,$nuevo) {
    mysqli_query($con,"SET NAMES 'utf8'");
	mysqli_query($con,"REPLACE INTO ".$tabla." (nombre) VALUES ('$nuevo')");

}

function mainPrograma($con) {
    list($tabla, $nuevo) = nuevoPrograma();
    sqlReplace($con, $tabla, $nuevo);
}




if(isset($_POST['crear'])){
    mainPrograma($con);
	header('Location:../index/index1.php');
}

if(isset($_POST['crearentre'])){
    mainPrograma($con);
    header('Location:../index/index2.php');
}

if(isset($_POST['crearmus'])){
    mainPrograma($con);
    header('Location:../index/index3.php');
}

if(isset($_POST['creardoc'])){
    mainPrograma($con);
    header('Location:../index/index4.php');
}
?>