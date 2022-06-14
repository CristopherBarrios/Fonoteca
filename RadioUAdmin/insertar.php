<?php
include('class.php');
header('charset=utf-8');


//Funciones
/////////////////////////////////////////////////////////////////////////
function OpUbica() {
	$opcion = $_POST['opcion'];

	if (isset($_POST['submit']) or isset($_POST['elim'])) {
		$ubica =  'subidos/Programas/';
		$tabla =  "progra";
		$tabla2 = "programas";
	} elseif (isset($_POST['submitentre']) or isset($_POST['elimentre'])) {
		$ubica = 'subidos/Entrevistas/';
		$tabla =  "progra1";
		$tabla2 = "entrevistas";
	} elseif (isset($_POST['submitmus']) or isset($_POST['elimmus'])) {
		$ubica ='subidos/Musica/';
		$tabla =  "progra2";
		$tabla2 = "musica";
	} elseif (isset($_POST['submitdoc']) or isset($_POST['elimdoc'])) {
		$ubica ='subidos/Documentales/';
		$tabla =  "progra3";
		$tabla2 = "documentales";
	}
	return [$opcion, $ubica,$tabla, $tabla2];
}

function insertion() {
	list($opcion, $ubica, $tabla, $tabla2) = OpUbica();
	$lugar = $ubica.$opcion.'/';

	$name1 = "[".$_POST['opcion']."]:   "  .$_POST['doc_name'];
	$fechal = $_POST['fechal'];
	$imagen = $lugar.$_FILES['myfile']['name'];
	$audio1 = $lugar.$_FILES['audio']['name'];

	$tmp_audio = $_FILES['audio']['tmp_name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];

	move_uploaded_file($tmp_name, utf8_decode($imagen));
	move_uploaded_file($tmp_audio, utf8_decode($audio1));

	return [$name1, $fechal, $imagen, $audio1, $tabla, $tabla2];
}

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

function sqlSelectOrder($con, $tabla) {
	mysqli_query($con,"SELECT * FROM ".$tabla." ORDER BY nombre ASC");
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
	header('Location:index1.php');
 }
if(isset($_POST['elim'])){
	mainElim($con);
	header('Location:index1.php');
}

//Entrevistas
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitentre'])){
	mainSubmit($con);
	header('Location:index2.php');
 }

if(isset($_POST['elimentre'])){
	mainElim($con);
	header('Location:index2.php');
}

//Musica
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitmus'])){
	mainSubmit($con);
	header('Location:index3.php');
 }

if(isset($_POST['elimmus'])){
	mainElim($con);
	header('Location:index3.php');
}

//Documentales
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitdoc'])){
	mainSubmit($con);
	header('Location:index4.php');	
 }

if(isset($_POST['elimdoc'])){
	mainElim($con);
	header('Location:index4.php');
}
?>