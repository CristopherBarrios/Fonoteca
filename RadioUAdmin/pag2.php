<!DOCTYPE html>
<?php
include('class.php');
?>

<style type="text/css">


#cuadro{
	width: 95%;
	background: #F8F8F8 ;
	padding: 25px;
	margin: 5px auto;
	border: 3px solid #D8D8D8;
}
.tamano{
	width: 90%
}
	</style>


<script type="text/javascript">
(function(document) {
  'use strict';

  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
   };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
</script>		

<html>
<head>
	<title>Subir Archivo</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/estilos.css">
		<link rel="stylesheet" type="text/css" href="menu1.css">

</head>
<body>
<header>
			<div class="alert alert-info">
			<h3>BIENVENIDO A LA FONOTECA RADIO UNIVERSIDAD</h3>
			</div>
		</header>
		<div id="cuadro">
		<ul>
  <li><a href="index.php">PROGRAMAS</a></li>
  <li><a href="index2.php">ENTREVISTAS</a></li>
  <li><a href="index3.php">MUSICA</a></li>
  <li><a href="index4.php">DOCUMENTALES</a></li>
</ul>
<table class="table">
			<tr class="bg-primary">
				<th th colspan="5" class="bg-primary text-center">BUSCA TU PISTA DE AUDIO</th>
				<tr class="bg-info"><td><center><div class="derecha"  id="buscar"> <i><input  type="search" class="light-table-filter tamano form-control" data-table="order-table"  placeholder="BUSCA TU PISTA..."></i></div></center></td></tr>
			</tr>
				
			</table>


	<?php
include('class.php');
	$res2 =  mysql_query("SELECT * FROM progra1 ORDER BY nombre ASC");
	while($row2 = mysql_fetch_array($res2))
?>





<?php
include('class.php');

$sql = "SELECT * FROM entrevistas ORDER BY name ASC";

$res =  mysql_query($sql);

$sqli = "SELECT * FROM progra1";

$rest =  mysql_query($sqli);

?>
<div class="datagrid">
		
			<table class="order-table table">
			<thead>
				<tr class="bg-primary titulo">
				
				<th>ID</th>
				<th>IMAGEN</th>
				<th>[PROGRAMA] NOMBRE</th>
				<th>AUDIO</th>
				<th>FECHA</th>
				<th></th>
				
				</tr>
				</thead>

				<?php
					while($row = mysql_fetch_array($res)){
$fecha1=$row['fecha'];
$fecha2=date("d-m-Y",strtotime($fecha1));
					echo "<tr>
							<td>".$row['id']."</td>
							<td><img src='".$row['path']."' width='100' height='100'/></td>
							<td>".$row['name']."</td>
							<td><audio controls><source src='".$row['audio']."'/></audio controls></td>
							<td>".$fecha2. "</td>
							<td><form action='eliminarentre.php?id=".$row['id']."' method='POST' enctype='multipart/form-data'>

						
						 </tr>";
					}
				?>
			</table>
			</div>


</body>
</html>