<?php
include('class.php');
header('charset=utf-8');




function insertion() {
	$opcion = $_POST['opcion'];
	$ubica =  'subidos/Programas/';
	$lugar = $ubica.$opcion.'/';

	$imagen = $lugar.$_FILES['myfile']['name'];
	$audio1 = $lugar.$_FILES['audio']['name'];

	$name1 = "[".$_POST['opcion']."]:   "  .$_POST['doc_name'];

	$fechal = $_POST['fechal'];

	$tmp_audio = $_FILES['audio']['tmp_name'];

	$tmp_name = $_FILES['myfile']['tmp_name'];

	move_uploaded_file($tmp_name, utf8_decode($imagen));
	move_uploaded_file($tmp_audio, utf8_decode($audio1));

	return [$name1, $fechal, $imagen, $audio1, $opcion, $ubica];
}

if(isset($_POST['submit'])){
	mysqli_query($con,"SELECT * FROM progra ORDER BY nombre ASC");
	list($name1, $fechal, $imagen, $audio1, $opcion, $ubica) = insertion();
	$query = mysqli_query($con,"INSERT INTO programas (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
	header('Location:index1.php');
 }

if(isset($_POST['elim'])){
	mysqli_query($con,"SELECT * FROM progra ORDER BY nombre ASC");
	list($name1, $fechal, $imagen, $audio1, $opcion, $ubica) = insertion();

    //base de datos

	mysqli_query($con,"DELETE FROM  progra  WHERE nombre='$opcion'");	
	mysqli_query($con,"DELETE FROM  programas WHERE name LIKE '%$opcion%';");	
	//carpeta
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
	header('Location:index1.php');
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitentre'])){
	mysqli_query($con,"SELECT * FROM progra1 ORDER BY nombre ASC");
	list($name1, $fechal, $imagen, $audio1, $opcion, $ubica) = insertion();
	$query = mysqli_query($con,"INSERT INTO entrevistas (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
	header('Location:index2.php');
 }

if(isset($_POST['elimentre'])){
	mysqli_query($con,"SELECT * FROM progra1 ORDER BY nombre ASC");
	list($name1, $fechal, $imagen, $audio1, $opcion, $ubica) = insertion();

//base de datos

	mysqli_query($con,"DELETE FROM  progra1  WHERE nombre='$opcion'");	
	mysqli_query($con,"DELETE FROM  entrevistas WHERE name LIKE '%$opcion%';");	
//carpeta
	$eliminar = $ubica.$opcion;
	$eliminarLugar = $ubica.$opcion."/*";

	if( $_POST['opcion']){
		foreach(glob($eliminar."/*") as $archivos_de_imagen) {
			if(is_dir($archivos_de_imagen));
			else unlink($archivos_de_imagen);
		}
		rmdir($eliminar);
}		
header('Location:index2.php');
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitmus'])){
	$doc_name = $_POST['doc_name'];

mysqli_query($con,"SELECT * FROM progra2 ORDER BY nombre ASC");
$opcion = $_POST['opcion'];

	$location = 'subidos/Musica/'.$_POST['opcion'].'/';
	$imagen = $location.$_FILES['myfile']['name'];
	$audio1 = $location.$_FILES['audio']['name'];




	$name1 = "[".$_POST['opcion']."]:   "  .$_POST['doc_name'];
	$fechal = $_POST['fechal'];
	$audio = $_FILES['audio']['name'];
	$tmp_audio = $_FILES['audio']['tmp_name'];

	$name = $_FILES['myfile']['name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];

		move_uploaded_file($tmp_name, utf8_decode($imagen));
		move_uploaded_file($tmp_audio, utf8_decode($audio1));
		$query = mysqli_query($con,"INSERT INTO musica (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
		header('Location:index3.php');
 }

if(isset($_POST['elimmus'])){




mysqli_query($con,"SELECT * FROM progra2 ORDER BY nombre ASC");

//base de datos

$opcion = $_POST['opcion'];

mysqli_query($con,"DELETE FROM  progra1  WHERE nombre='$opcion'");	
mysqli_query($con,"DELETE FROM  musica WHERE name LIKE '%$opcion%';");	
//carpeta
$eliminar='subidos/Musica/'.$_POST['opcion'];

if( $_POST['opcion']){
foreach(glob($eliminar."/*") as $archivos_de_imagen)
  {
    if(is_dir($archivos_de_imagen));
    else unlink($archivos_de_imagen);
  }
  rmdir($eliminar);
}		
header('Location:index3.php');
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submitdoc'])){
	$doc_name = $_POST['doc_name'];

mysqli_query($con,"SELECT * FROM progra3 ORDER BY nombre ASC");
$opcion = $_POST['opcion'];

	$location = 'subidos/Documentales/'.$_POST['opcion'].'/';
	$imagen = $location.$_FILES['myfile']['name'];
	$audio1 = $location.$_FILES['audio']['name'];




	$name1 = "[".$_POST['opcion']."]:   "  .$_POST['doc_name'];
	$fechal = $_POST['fechal'];
	$audio = $_FILES['audio']['name'];
	$tmp_audio = $_FILES['audio']['tmp_name'];

	$name = $_FILES['myfile']['name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];

		move_uploaded_file($tmp_name, utf8_decode($imagen));
		move_uploaded_file($tmp_audio, utf8_decode($audio1));
		$query = mysqli_query($con,"INSERT INTO documentales (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
		header('Location:index4.php');
		
 }

if(isset($_POST['elimdoc'])){




mysqli_query($con,"SELECT * FROM progra3 ORDER BY nombre ASC");

//base de datos

$opcion = $_POST['opcion'];

mysqli_query($con,"DELETE FROM  progra3  WHERE nombre='$opcion'");	
mysqli_query($con,"DELETE FROM  documentales WHERE name LIKE '%$opcion%';");	
//carpeta
$eliminar='subidos/Documentales/'.$_POST['opcion'];

if( $_POST['opcion']){
foreach(glob($eliminar."/*") as $archivos_de_imagen)
  {
    if(is_dir($archivos_de_imagen));
    else unlink($archivos_de_imagen);
  }
  rmdir($eliminar);
}		
header('Location:index4.php');
}

?>

