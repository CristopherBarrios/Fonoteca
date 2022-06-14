<?php
function OpUbica() {
	$opcion = $_POST['opcion'];

	if (isset($_POST['submit']) or isset($_POST['elim']) or isset($_POST['modificar']) or isset($_POST['eliminar']) or isset($_POST['crear'])) {
		$ubica =  '../../subidos/Programas/';
		$tabla =  "progra";
		$tabla2 = "programas";
	} elseif (isset($_POST['submitentre']) or isset($_POST['elimentre']) or isset($_POST['modificarentre']) or isset($_POST['eliminarentre']) or isset($_POST['crearentre'])) {
		$ubica = '../../subidos/Entrevistas/';
		$tabla =  "progra1";
		$tabla2 = "entrevistas";
	} elseif (isset($_POST['submitmus']) or isset($_POST['elimmus']) or isset($_POST['modificarmus']) or isset($_POST['eliminarmus']) or isset($_POST['crearmus'])) {
		$ubica ='../../subidos/Musica/';
		$tabla =  "progra2";
		$tabla2 = "musica";
	} elseif (isset($_POST['submitdoc']) or isset($_POST['elimdoc']) or isset($_POST['modificardoc']) or isset($_POST['eliminardoc']) or isset($_POST['creardoc'])) {
		$ubica ='../../subidos/Documentales/';
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

    $id = $_REQUEST['id'];

	return [$name1, $fechal, $imagen, $audio1, $tabla, $tabla2, $id];
}

function sqlSelectOrder($con, $tabla) {
	mysqli_query($con,"SELECT * FROM ".$tabla." ORDER BY nombre ASC");
}
?>