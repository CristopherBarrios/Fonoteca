<?php
include('class.php');
header('charset=utf-8');

if(isset($_POST['submit'])){
	$doc_name = $_POST['doc_name'];

	mysqli_query($con,"SELECT * FROM progra ORDER BY nombre ASC");

	$opcion = $_POST['opcion'];
	$ubica =  'subidos/Programas/';
	$lugar = $ubica.$opcion.'/';

	$imagen = $_FILES['myfile']['name'];
	$audio1 = $_FILES['audio']['name'];

	$name1 = "[".$_POST['opcion']."]:   "  .$_POST['doc_name'];

	$fechal = $_POST['fechal'];

	$audio = $_FILES['audio']['name'];
	$tmp_audio = $_FILES['audio']['tmp_name'];

	$name = $_FILES['myfile']['name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];

	move_uploaded_file($tmp_name, $lugar.$imagen);
	move_uploaded_file($tmp_audio, $lugar.$audio1);
	$query = mysqli_query($con,"INSERT INTO programas (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
	header('Location:index1.php');

 }

if(isset($_POST['elim'])){
	mysqli_query($con,"SELECT * FROM progra ORDER BY nombre ASC");

    //base de datos

	mysqli_query($con,"DELETE FROM  progra  WHERE nombre='$opcion'");	
	mysqli_query($con,"DELETE FROM  programas WHERE name LIKE '%$opcion%';");	
	//carpeta
	$eliminar= $ubica.$opcion;
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
	$doc_name = $_POST['doc_name'];
	mysqli_query($con,"SELECT * FROM progra1 ORDER BY nombre ASC");
	$opcion = $_POST['opcion'];

	$location = 'subidos/Entrevistas/'.$_POST['opcion'].'/';
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
	$query = mysql_query("INSERT INTO entrevistas (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");

	header('Location:index2.php');
 }

if(isset($_POST['elimentre'])){

mysql_query("SELECT * FROM progra1 ORDER BY nombre ASC");

//base de datos

$opcion = $_POST['opcion'];

mysql_query("DELETE FROM  progra1  WHERE nombre='$opcion'");	
mysql_query("DELETE FROM  entrevistas WHERE name LIKE '%$opcion%';");	
//carpeta
$eliminar='subidos/Entrevistas/'.$_POST['opcion'];

if( $_POST['opcion']){
foreach(glob($eliminar."/*") as $archivos_de_imagen)
  {
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

mysql_query("SELECT * FROM progra2 ORDER BY nombre ASC");
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
		$query = mysql_query("INSERT INTO musica (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
		header('Location:index3.php');
 }

if(isset($_POST['elimmus'])){




mysql_query("SELECT * FROM progra2 ORDER BY nombre ASC");

//base de datos

$opcion = $_POST['opcion'];

mysql_query("DELETE FROM  progra1  WHERE nombre='$opcion'");	
mysql_query("DELETE FROM  musica WHERE name LIKE '%$opcion%';");	
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

mysql_query("SELECT * FROM progra3 ORDER BY nombre ASC");
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
		$query = mysql_query("INSERT INTO documentales (name,fecha,path,audio) VALUES ('$name1','$fechal','$imagen','$audio1')");
		header('Location:index4.php');
		
 }

if(isset($_POST['elimdoc'])){




mysql_query("SELECT * FROM progra3 ORDER BY nombre ASC");

//base de datos

$opcion = $_POST['opcion'];

mysql_query("DELETE FROM  progra3  WHERE nombre='$opcion'");	
mysql_query("DELETE FROM  documentales WHERE name LIKE '%$opcion%';");	
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

