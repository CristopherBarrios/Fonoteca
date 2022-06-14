<?php
	$mensaje="";
	if(isset($_POST["envio"])){
			include("../../php/envioCorreo.php");
			$email = new email("RadioUAudios","audiosfonoteca@gmail.com","enviosradio921");
			$email->agregar($_POST["email"], $_POST["nombre"], $_POST["asunto"], $_POST["nombre"], $_POST["correo"], $_POST["mensaje"]);
						
			if ($email->enviar('Audios_Solicitados',$contenido_html)){
							
					$mensaje= 'Mensaje enviado';
							
			}else{
						   
			   $mensaje= 'El mensaje no se pudo enviar';
			   $email->ErrorInfo;
			}
}
?>
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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SOLICITUD</title>


    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/boton.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/estilos.css">

</head>
<div id="cuadro">

<body>
<center>
<div class="">      
        <div class="row">
          <div class="col-xs-12 alert alert-info" > 
                <h2 class="title">FONOTECA</h2>
                <h3 class="title-description">Llene el siguiente formulario para solicitar un audio</h3>
            </div>
        </div>
    </div>

    <header>
     <div id="logo"><img src="../../pictures/usac.png"/ ></div>
    </header>
   
    	<section>
        	<div>
            
                <form id="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="application/x-www-form-urlencoded" name="envio">
                    
                    <div class="form-group">
                            <td>
                            	<label for="email"></label>
                            </td>
                            <td>
                            	<input type="hidden" name="email" id="email" value="audiosfonoteca@gmail.com" autofocus maxlength="50" size="20"  class="form-control">
                            </td></div><br>

                            <div class="form-group"><td>
                            	<label for="nombre">NOMBRE COMPLETO</label>
                            </td>
                            <td>
                            	<input type="text" name="nombre" id="nombre" placeholder="Nombre" autofocus maxlength="50" size="20"  class="form-control" required>
                                <input name="envio" value="si" hidden="hidden">
                            </td></div>
                            
                            <div class="form-group">
                  <label for="asunto">INSTITUCIÓN</label>
                  <input id="asunto" type="text" name="asunto" placeholder="Institucion a la que pertenece" class="form-control" required>
                </div><br>
                
                <div class="form-group">
                  <label for="correo">E-MAIL</label>
                  <input id="correo" type="email" name="correo" placeholder="E-mail" class="form-control" required>
                </div><br>

                
                <div class="form-group">
                  <label for="mensaje">DESCRIPCIÓN</label>
                  <textarea id="mensaje" name="mensaje" placeholder="Descripcion del pedido" class="form-control" rows="6" required></textarea>
                </div><br>


                <button type="submit" class="btn submit-btn formdefaultbut ripple-effect" id="id123-button-send" value="ENVIAR">ENVIAR</button>

                <button type="reset" class="btn submit-btn formdefaultbut ripple-effect" id="id123-button-send" value="BORRAR">BORRAR</button>

                
                <div id="resultado"></div>
                   
            	</form>
            </div>
            <?php
				echo $mensaje;
			?>
        </section>
        <aside>
        
        </aside>
    </div>
    <footer>
    
    </footer>
     
</body>
</html>