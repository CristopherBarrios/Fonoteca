<!DOCTYPE html>



<html>
<head>
	<title>Subir Archivo</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilos.css">
</head>
<body>


<style type="text/css">


#cuadro{
	width: 90%;
	background: #F8F8F8 ;
	padding: 25px;
	margin: 5px auto;
	border: 3px solid #D8D8D8;
}
.tamano{
	width: 90%
}
	</style>
<header>
			<div class="alert alert-info">
			<h3>BIENVENIDO ADMINISTRADOR</h3>
			</div>

		</header>

					<div id="cuadro">
	<?php
include('class.php');
$id = $_REQUEST['id'];

$sql = "SELECT * FROM programas WHERE id='$id'";

$res =  mysql_query($sql);
$row = mysql_fetch_array($res);

?>
<form action="process_modi.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">

				<table class="table">
				<tr><th colspan="5" class="bg-primary text-center" >MODIFICA EL REGISTRO</th></tr>
				<tr class="bg-primary">
				<th>IMAGEN</th>
				<th>NOMBRE: <?php
				 echo  $row['name'];?></th>
				<th>AUDIO</th>
				<th>FECHA</th>
				<th></th>
				</tr>
				<tr class="bg-info">
				<td><input REQUIRED name="myfile" type="file" class="form-control"  accept="image/*"  >

				<br><center><?php 
				echo '<img src="'.$row["path"].'" width="100" height="100"/>';?></center></td>

				<td>
				 <input REQUIRED name="doc_name" type="text" class="form-control" placeholder="Nombre" value=""><br>
				 <center><select required name="opcion" class="btn">
<option hidden value="PROGRAMA">→→→PROGRAMA←←←</option>

	<?php
include('class.php');
	$res2 =  mysql_query("SELECT * FROM progra ORDER BY nombre ASC");
	while($row2 = mysql_fetch_array($res2))
{?>

<option value="<?php echo $row2['nombre']?>"> <?php echo $row2['nombre'];?></option>";
<?php } ?>
</select></center></td>

				<td><input REQUIRED name="audio" type="file" class="form-control" accept="audio/*"><br><center><?php  
				echo '<audio controls><source src="'.$row["audio"].'"/>';?></center></td>


				<td><input REQUIRED name="fechal" type="date" class="form-control" placeholder="Fecha" value="<?php  
				echo $fecha = $row['fecha'];?>"></td>

				<td><input  name="modificar" type="submit" class="btn btn-success" value="MODIFICAR" > </td>
				</tr>


				
				
				</table>
				<br>
				<br>
				
			</form>






</body>
</html>