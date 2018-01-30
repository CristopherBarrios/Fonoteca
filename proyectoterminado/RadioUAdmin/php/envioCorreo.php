<?php
require ('class.phpmailer.php');
include("class.smtp.php");


class Email  extends PHPMailer{

  
    //datos de remitente
    var $tu_email;
    var $tu_nombre;
    var $tu_password;

    /**
 * Constructor de clase
 */
    public function __construct($tu_nombre,$tu_email,$tu_password)
    {
      //configuracion general
     $this->IsSMTP(); // protocolo de transferencia de correo
     $this->Host = 'smtp.gmail.com';  // Servidor GMAIL
     $this->Port = 465; //puerto
     $this->SMTPAuth = true; // Habilitar la autenticación SMTP
     $this->Username = $this->tu_email=$tu_email;
     $this->Password = $this->tu_password=$tu_password;
     $this->SMTPSecure = 'ssl';  //habilita la encriptacion SSL
     //remitente
     $this->From = $this->tu_email;
     $this->FromName = $this->tu_nombre=$tu_nombre;
	   $this->CharSet='UTF8';
    }

    /**
 * Metodo encargado del envio del e-mail
 */
    public function enviar($asunto , $contenido)
    {
      
       $this->WordWrap = 50; // Ajuste de texto
       $this->IsHTML(true); //establece formato HTML para el contenido
       $this->Subject =$asunto;
       $this->Body    =  $contenido; //contenido con etiquetas HTML
       $this->AltBody =  strip_tags($contenido); //Contenido para servidores que no aceptan HTML
	   
       return $this->Send() ;
   }
   public function agregar($correo,$nombre = ''){
	   $this->addAddress($correo,$nombre);
	}

}
	
	$contenido_html =  "<div><center>
              <h1>Solicitud de Audios</h1>
              <h3>Datos de la persona que solicita los audios</h3></center><hr>
            <table>
            <h3>DATOS</h3>
							<tr>
								<td>Nombre:   </td> 
                <td>".$_POST['nombre']."</td>                          
              </tr>
              <tr>
               <td>Institucion:   </td> 
                <td>".$_POST['asunto']."</td>                
              </tr>
               <tr>
               <td>E-mail:   </td> 
               <td>".$_POST['correo']."</td>
               </tr>
               <tr>
               <td>Mensaje:   </td> 
               <td>".$_POST['mensaje']."</td>
               </tr>
							  
              </table>
              <hr><br><br>
							
			    		</div>";
?>