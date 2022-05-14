	<?php
include('class.php');

if(isset($_POST['eliminar'])){
  $id = $_REQUEST['id'];




$sql = "SELECT * FROM entrevistas";

$res =  mysql_query($sql);
$row = mysql_fetch_array($res);

  $path =$row['path'];
  $audio  =$row['audio'];

    unlink($path);
    unlink($audio);

		mysql_query("DELETE FROM entrevistas WHERE id='$id'");		
    header('Location:index2.php');

	
	}

?>
