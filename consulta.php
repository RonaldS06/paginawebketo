<?php
    //Primer bloque de variables y valores
    $destino = 'keto@keto.com.ar';  //a donde va a llegar.
    $origen_nombre = ''; //dominio que envia el mail.
    $origen_mail=''; //lo manda el mismo mail al que llega, independientemente de la info del usuario.
    $subject='Consultas en keto.com.ar'; // Asunto de todos los mensajes que llegan desde el form.
    $adondevoy='gracias.html'; // página de redireccionamiento.
    // Se utilizan variables en parte porque facilita su reutilización.

    // Todo esto hace referencia a como se va a ver el mail.
    $headers = "from: $origen_nombre <$origen_mail>\r\n"; 
    $headers .= "Reply-To: $origen_mail\r\n";
    $headers .= "Return-Path: $origen_nombre <$origen_mail>\r\n";
    
    $mensaje=''; //Con este bloque llega el mensaje del usuario.

        foreach($_POST as $k => $v){
            if($k!='Submit' && $k!='Enviar'){
                $mensaje.=ucfirst($k).": $v\n";
            }
        }

    ini_set('sendmail_from',$origen_mail); //establece un valor.
    mail($destino,$subject,$mensaje,$headers);
    header("Location:$adondevoy"); // redirecciona al finalizar el envío.

?>