
<?php

require("../class.php");

$username = $_POST['mail'];
$pass = $_POST['pass'];



$sql2 = mysqli_query($con,"SELECT * FROM login WHERE email='$username'");
if($f2 = mysqli_fetch_array($sql2)) {
	if($pass==$f2['pasadmin']) {
		echo '<script>alert("INSERTE CONTRASEÑA")</script> ';
		echo "<script>location.href='../../index.php'</script>";
		}
}

$sql = mysqli_query($con,"SELECT * FROM login WHERE email='$username'");
if($f=mysqli_fetch_array($sql)) {
	if($pass==$f['password']) {
		header("Location: ../Administrador/index/index1.php");
	} else {
		echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		echo "<script>location.href='../index/index.php'</script>";
	}
} else {
	echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
	echo "<script>location.href='../../index.php'</script>";	
}
?>