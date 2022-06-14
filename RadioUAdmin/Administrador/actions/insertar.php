<?php
include('../../class.php');
include('functions.php');
header('charset=utf-8');


//Funciones
/////////////////////////////////////////////////////////////////////////


function elimUbica($opcion, $ubica) {
	$eliminar = $ubica.$opcion;
	$eliminarLugar = $ubica.$opcion."/*";
	if($_POST['opcion']){
		foreach(glob($eliminarLugar) as $archivos_de_imagen)
		{
			unlink($archivos_de_imagen);
			//if(is_dir($archivos_de_imagen));
			//else unlink($archivos_de_imagen);
		}
		rmdir($eliminar);
	}

}

function sqlInsetInto($con, $tabla, $name1, $fechal, $imagen, $audio1) {
	mysqli_query($con,"INSERT INTO ".$tabla." (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
}

function sqlDeleteFrom($con, $tabla, $tabla2, $opcion) {
	mysqli_query($con,"DELETE FROM  ".$tabla."  WHERE nombre='$opcion'");	
	mysqli_query($con,"DELETE FROM  ".$tabla2." WHERE name LIKE '%$opcion%';");
}

function mainSubmit($con) {
	list($name1, $fechal, $imagen, $audio1, $tabla, $tabla2) = insertion();
	sqlSelectOrder($con,$tabla);
	sqlInsetInto($con,$tabla2, $name1, $fechal, $imagen, $audio1);
}

function mainElim($con) {
	list($opcion, $ubica, $tabla, $tabla2) = OpUbica();
	sqlSelectOrder($con,$tabla);
	sqlDeleteFrom($con, $tabla, $tabla2, $opcion);
	elimUbica($opcion, $ubica);
}


// Programas
///////////////////////////////////////////////////////////////////////
if(isset($_POST['submit'])){
	mainSubmit($con);
	header('Location:../index/index1.php');
 }
if(isset($_POST['elim'])){
	mainElim($con);
	header('Location:../index/index1.php');
}

//Entrevistas
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitentre'])){
	mainSubmit($con);
	header('Location:../index/index2.php');
 }

if(isset($_POST['elimentre'])){
	mainElim($con);
	header('Location:../index/index2.php');
}

//Musica
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitmus'])){
	mainSubmit($con);
	header('Location:../index/index3.php');
 }

if(isset($_POST['elimmus'])){
	mainElim($con);
	header('Location:../index/index3.php');
}

//Documentales
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitdoc'])){
	mainSubmit($con);
	header('Location:../index/index4.php');	
 }

if(isset($_POST['elimdoc'])){
	mainElim($con);
	header('Location:../index/index4.php');
}
?>