<?php
$error = "error";

$con = mysql_connect("localhost","root","") or die();
mysql_select_db("RadioUAdmin",$con) or die($error);
mysql_query("SET NAMES 'utf8'");

?>


