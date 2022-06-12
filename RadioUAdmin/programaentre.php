<?php
include('class.php');

if(isset($_POST['crear'])){
  $nuevo = $_POST['nuevo'];

  $location =  utf8_decode('subidos/Entrevistas/'.$_POST['nuevo'].'/');

mysqli_query($con,"SET NAMES 'utf8'");


    if(!file_exists($location)){

        mkdir($location);
      }


    mysqli_query($con,"REPLACE INTO progra1 (nombre) VALUES ('$nuevo')");

    header('Location:index2.php');
}


?>