<?php
$error = "error";

$con = mysqli_connect("localhost","root","") or die();
mysqli_select_db($con,"radiouadmin") or die($error);
mysqli_query($con,"SET NAMES 'utf8'");

?>


