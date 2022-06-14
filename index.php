<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="RadioUAdmin/css/style1.css"> 
    <link rel="stylesheet" href="RadioUAdmin/css/efectos.css">
    <link rel="stylesheet" href="RadioUAdmin/css/letras1.css">
  </head>
  <body>
    <div id="wrap">
      <div id="regbar">
        <div id="navthing">
          <h2><a href="#" id="loginform">Administrador</a> | <a href="RadioUAdmin/Usuario/pedir/pedir.php">Contactanos</a></h2>
          <div class="login">
            <div class="arrow-up"></div>
            <div class="formholder">
              <div class="randompad">
                <form action="RadioUAdmin/RegistroValidarAdmin/validar.php" method="post">
                  <label>Email</label>
                  <input type="email" name="mail" placeholder="example@example.com" />
                  <label >Password</label>
                  <input type="password" name="pass" placeholder="Password" />
                  <input type="submit" name="submit" value="Aceptar" />
                </form>
                <form method="post" action="" >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="RadioUAdmin/js/index.js"></script>
<?php
		if(isset($_POST['submit'])){
			require("RadioUAdmin/RegistroValidarAdmin/registro.php");
		}
	?>
<!--Fin formulario registro -->
</td>
</tr>
</table>
</div></center></div></center>
<div class="">
  <center><table>
    <tr>
      <td><img src="RadioUAdmin/pictures/usac.png" width="135" height="135"></td>
      <td><h1>Fonoteca Radio Universidad  </h1></td>
      <td><img src="RadioUAdmin/pictures/usac1.png" width="135" height="135"></td>
    </tr>
  </table></center>
</div>
</head>
<body id="bd" class="bd fs6 com_content  body homepage" style="position: relative; min-height: 100%; top: 0px;">
<center>
  <div align="center">
    <div id="contenedor">
      <div id="cabecera"> 
      </div>
    </div>
  </div>



  <header>
    <div class="contenedor" id="uno">
      <a href="RadioUAdmin/Usuario/index/pag1.php"><img class="icon" src="RadioUAdmin/pictures/programa.png" alt="Enviar"></a>
      <p class="texto">Programas</p>
		</div>

		<div class="contenedor" id="dos">
		<a href="RadioUAdmin/Usuario/index/pag2.php"><img class="icon" src="RadioUAdmin/pictures/entre.png" alt="Enviar"></a>	
			<p class="texto">Entrevistas</p>
		</div>

		<div class="contenedor" id="tres">
			<a href="RadioUAdmin/Usuario/index/pag3.php"><img class="icon" src="RadioUAdmin/pictures/musica.png" alt="Enviar"></a>
			<p class="texto">Musica</p>
		</div>

		<div class="contenedor" id="cuatro">
		<a href="RadioUAdmin/Usuario/index/pag4.php"><img class="icon" src="RadioUAdmin/pictures/grupo.png" alt="Enviar"></a>
			<p class="texto">Documentales</p>
		</div>
	</header>
</center>	
</body>
</html>
