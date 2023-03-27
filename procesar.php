<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $email = $_GET['email'];
        $genero = $_GET['genero'];
        $mensaje = $_GET['mensaje'];
        
        $destinatario="bandatas@gmail.com";
        $asunto="Mail enviado por $nombre";
        $textoCorreo= "nombre:$nombre genero:$genero";
        
        mail($destinatario, $asunto, $textoCorreo);
        ?>
        <h2>Enviado con éxito</h2>
    </body>
</html>
