	<?php
include('class.php');

if(isset($_POST['eliminar'])){
  $id = $_REQUEST['id'];




$sql = "SELECT * FROM programas";

$res =  mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);

  $path =$row['path'];
  $audio  =$row['audio'];

    unlink($path);
    unlink($audio);

		mysqli_query($con,"DELETE FROM programas WHERE id='$id'");		
    header('Location:index1.php');

	
	}

?>
