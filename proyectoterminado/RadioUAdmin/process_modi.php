<?php
include('class.php');

if(isset($_POST['modificar'])){

	$id = $_REQUEST['id'];
	$doc_name = $_POST['doc_name'];
	$fechal = $_POST['fechal'];
	$audio = $_FILES['audio']['name'];
	$tmp_audio = $_FILES['audio']['tmp_name'];

	$name = $_FILES['myfile']['name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];

	$name1 = "[".$_POST['opcion']."]:   "  .$_POST['doc_name'];


mysql_query("SELECT * FROM progra ORDER BY nombre ASC");
$opcion = $_POST['opcion'];

		$location = 'subidos/Programas/'.$_POST['opcion'].'/';
		$imagen = $location.$_FILES['myfile']['name'];
		$audio1 = $location.$_FILES['audio']['name'];


		move_uploaded_file($tmp_name, utf8_decode($imagen));
		move_uploaded_file($tmp_audio, utf8_decode($audio1));

	$sql = "SELECT * FROM programas";

$res =  mysql_query($sql);
$row = mysql_fetch_array($res);

  $path =$row['path'];
  $audio  =$row['audio'];

	mysql_query("UPDATE programas SET name='$name1', fecha='$fechal' , path='$imagen' , audio='$audio1' WHERE id='$id'");

		header('Location:index1.php');
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['modificarentre'])){

	$id = $_REQUEST['id'];
	$doc_name = $_POST['doc_name'];
	$fechal = $_POST['fechal'];
	$audio = $_FILES['audio']['name'];
	$tmp_audio = $_FILES['audio']['tmp_name'];

	$name = $_FILES['myfile']['name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];

	$name1 = "[".$_POST['opcion']."]:   "  .$_POST['doc_name'];


mysql_query("SELECT * FROM progra1 ORDER BY nombre ASC");
$opcion = $_POST['opcion'];

		$location = 'subidos/Entrevistas/'.$_POST['opcion'].'/';
		$imagen = $location.$_FILES['myfile']['name'];
		$audio1 = $location.$_FILES['audio']['name'];


		move_uploaded_file($tmp_name, utf8_decode($imagen));
		move_uploaded_file($tmp_audio, utf8_decode($audio1));

	$sql = "SELECT * FROM entrevistas";

$res =  mysql_query($sql);
$row = mysql_fetch_array($res);

  $path =$row['path'];
  $audio  =$row['audio'];

	mysql_query("UPDATE entrevistas SET name='$name1', fecha='$fechal' , path='$imagen' , audio='$audio1' WHERE id='$id'");

		header('Location:index2.php');
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['modificarmus'])){

	$id = $_REQUEST['id'];
	$doc_name = $_POST['doc_name'];
	$fechal = $_POST['fechal'];
	$audio = $_FILES['audio']['name'];
	$tmp_audio = $_FILES['audio']['tmp_name'];

	$name = $_FILES['myfile']['name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];

	$name1 = "[".$_POST['opcion']."]:   "  .$_POST['doc_name'];


mysql_query("SELECT * FROM progra2 ORDER BY nombre ASC");
$opcion = $_POST['opcion'];

		$location = 'subidos/Musica/'.$_POST['opcion'].'/';
		$imagen = $location.$_FILES['myfile']['name'];
		$audio1 = $location.$_FILES['audio']['name'];


		move_uploaded_file($tmp_name, utf8_decode($imagen));
		move_uploaded_file($tmp_audio, utf8_decode($audio1));

	$sql = "SELECT * FROM musica";

$res =  mysql_query($sql);
$row = mysql_fetch_array($res);

  $path =$row['path'];
  $audio  =$row['audio'];

	mysql_query("UPDATE musica SET name='$name1', fecha='$fechal' , path='$imagen' , audio='$audio1' WHERE id='$id'");

		header('Location:index3.php');
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['modificardoc'])){

	$id = $_REQUEST['id'];
	$doc_name = $_POST['doc_name'];
	$fechal = $_POST['fechal'];
	$audio = $_FILES['audio']['name'];
	$tmp_audio = $_FILES['audio']['tmp_name'];

	$name = $_FILES['myfile']['name'];
	$tmp_name = $_FILES['myfile']['tmp_name'];

	$name1 = "[".$_POST['opcion']."]:   "  .$_POST['doc_name'];


mysql_query("SELECT * FROM progra3 ORDER BY nombre ASC");
$opcion = $_POST['opcion'];

		$location = 'subidos/Documentales/'.$_POST['opcion'].'/';
		$imagen = $location.$_FILES['myfile']['name'];
		$audio1 = $location.$_FILES['audio']['name'];


		move_uploaded_file($tmp_name, utf8_decode($imagen));
		move_uploaded_file($tmp_audio, utf8_decode($audio1));

	$sql = "SELECT * FROM documentales";

$res =  mysql_query($sql);
$row = mysql_fetch_array($res);

  $path =$row['path'];
  $audio  =$row['audio'];

	mysql_query("UPDATE documentales SET name='$name1', fecha='$fechal' , path='$imagen' , audio='$audio1' WHERE id='$id'");

		header('Location:index4.php');
	}


	

?>	
	