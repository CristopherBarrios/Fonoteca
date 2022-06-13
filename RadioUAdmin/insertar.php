<?php
include('class.php');
header('charset=utf-8');


//Funciones
/////////////////////////////////////////////////////////////////////////
function OpUbica() {
	$opcion = $_POST['opcion'];

	if (isset($_POST['submit']) or isset($_POST['elim'])) {
		$ubica =  'subidos/Programas/';
	} elseif (isset($_POST['submitentre']) or isset($_POST['elimentre'])) {
		$ubica = 'subidos/Entrevistas/';
	} elseif (isset($_POST['submitmus']) or isset($_POST['elimmus'])) {
		$ubica ='subidos/Musica/';
	} elseif (isset($_POST['submitdoc']) or isset($_POST['elimdoc'])) {
		$ubica ='subidos/Documentales/';
	}
	return [$opcion, $ubica];
}

function insertion() {
	list($opcion, $ubica) = OpUbica();
	$lugar = $ubica.$opcion.'/';

	$name1 = "[".$_POST['opcion']."]:   "  .$_POST['doc_name'];
	$fechal = $_POST['fechal'];
	$imagen = $lugar.$_FILES['myfile']['name'];
	$audio1 = $lugar.$_FILES['audio']['name'];

	$tmp_audio = $_FILES['audio']['tmp_name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];

	move_uploaded_file($tmp_name, utf8_decode($imagen));
	move_uploaded_file($tmp_audio, utf8_decode($audio1));

	return [$name1, $fechal, $imagen, $audio1];
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





// Programas
///////////////////////////////////////////////////////////////////////
if(isset($_POST['submit'])){
	mysqli_query($con,"SELECT * FROM progra ORDER BY nombre ASC");
	list($name1, $fechal, $imagen, $audio1) = insertion();
	$query = mysqli_query($con,"INSERT INTO programas (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
	header('Location:index1.php');
 }
if(isset($_POST['elim'])){
	mysqli_query($con,"SELECT * FROM progra ORDER BY nombre ASC");
	list($opcion, $ubica) = OpUbica();
    //base de datos
	mysqli_query($con,"DELETE FROM  progra  WHERE nombre='$opcion'");	
	mysqli_query($con,"DELETE FROM  programas WHERE name LIKE '%$opcion%';");	
	//carpeta
	elimUbica($opcion, $ubica);
	header('Location:index1.php');
}



//Entrevistas
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitentre'])){
	mysqli_query($con,"SELECT * FROM progra1 ORDER BY nombre ASC");
	list($name1, $fechal, $imagen, $audio1) = insertion();
	$query = mysqli_query($con,"INSERT INTO entrevistas (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
	header('Location:index2.php');
 }

if(isset($_POST['elimentre'])){
	mysqli_query($con,"SELECT * FROM progra1 ORDER BY nombre ASC");
	list($opcion, $ubica) = OpUbica();

	mysqli_query($con,"DELETE FROM  progra1  WHERE nombre='$opcion'");	
	mysqli_query($con,"DELETE FROM  entrevistas WHERE name LIKE '%$opcion%';");	
	elimUbica($opcion, $ubica);
	header('Location:index2.php');
}



//Musica
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitmus'])){
	mysqli_query($con,"SELECT * FROM progra2 ORDER BY nombre ASC");
	list($name1, $fechal, $imagen, $audio1) = insertion();
	$query = mysqli_query($con,"INSERT INTO musica (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
	header('Location:index3.php');
 }

if(isset($_POST['elimmus'])){
	mysqli_query($con,"SELECT * FROM progra2 ORDER BY nombre ASC");
	list($opcion, $ubica) = OpUbica();

	mysqli_query($con,"DELETE FROM  progra1  WHERE nombre='$opcion'");	
	mysqli_query($con,"DELETE FROM  musica WHERE name LIKE '%$opcion%';");
	elimUbica($opcion, $ubica);	
	
	header('Location:index3.php');
}



//Documentales
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitdoc'])){
	mysqli_query($con,"SELECT * FROM progra3 ORDER BY nombre ASC");
	list($name1, $fechal, $imagen, $audio1) = insertion();
	$query = mysqli_query($con,"INSERT INTO documentales (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
	header('Location:index4.php');	
 }

if(isset($_POST['elimdoc'])){
	mysqli_query($con,"SELECT * FROM progra3 ORDER BY nombre ASC");
	list($opcion, $ubica) = OpUbica();

	mysqli_query($con,"DELETE FROM  progra3  WHERE nombre='$opcion'");	
	mysqli_query($con,"DELETE FROM  documentales WHERE name LIKE '%$opcion%';");	
	elimUbica($opcion, $ubica);	
		
	header('Location:index4.php');
}
?>