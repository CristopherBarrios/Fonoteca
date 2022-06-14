<?php
include('../../class.php');
include('functions.php');

function sqlSelectTablaUnlink($con,$tabla2) {
    $res =  mysqli_query($con, "SELECT * FROM ".$tabla2."");
    $row = mysqli_fetch_array($res);
  
    $path = $row['path'];
    $audio  = $row['audio'];
  
    unlink($path);
    unlink($audio);
}

function sqlDeleteTabla($con,$tabla2) {
    $id = $_REQUEST['id'];
    mysqli_query($con,"DELETE FROM ".$tabla2." WHERE id='$id'");

}

function mainUnlink($con) {
    list(, , , $tabla2) = OpUbica();
    sqlSelectTablaUnlink($con,$tabla2);
    sqlDeleteTabla($con,$tabla2);
}

if(isset($_POST['eliminar'])){
	mainUnlink($con);
    header('Location:../index/index1.php');
}
/////////////////////////////////////////////////////////////////////

if(isset($_POST['eliminarentre'])){
    mainUnlink($con);
    header('Location:../index/index2.php');
}
////////////////////////////////////
if(isset($_POST['eliminarmus'])){
    mainUnlink($con);
    header('Location:../index/index3.php');
}
////////////////////////////////////////
if(isset($_POST['eliminardoc'])){
    mainUnlink($con);
    header('Location:../index/index4.php');
}        
?>