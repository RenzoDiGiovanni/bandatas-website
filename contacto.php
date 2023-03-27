<?php
include "conexion.php";

$queryGeneroPrincipal = "SELECT DISTINCT generoPrincipal FROM bandas ORDER BY generoPrincipal";
$resultGeneroPrincipal = mysqli_query($link, $queryGeneroPrincipal);
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Assistant:300,400,600,700,800&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="estilos.css" rel="stylesheet" type="text/css"/>

        <title>Contacto</title>
    </head>
    <body>
        <nav class="navbar navbar-light fixed-top" style="background-color: #212121;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="img/Bandatas.png" alt="logo">
                </a>
                <div class="navbar-brand">
                    <a href="catalogo.php" style="padding-right: 32px">
                        CATÁLOGO
                    </a>
                    <a href="contacto.php">
                        CONTACTO
                    </a>
                </div>
            </div>
        </nav>
        <div class="container contacto">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="procesar.php" method="GET" class="formContacto">
                        <div class="form-group">
                            <label for="inputNombre">Nombre</label>
                            <input type="text" name="nombre" required class="form-control inputContacto" id="inputNombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="inputApellido">Apellido</label>
                            <input type="text" name="apellido" required class="form-control inputContacto" id="inputApellido" placeholder="Apellido">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" name="email" required class="form-control inputContacto" id="inputEmail" placeholder="Email">
                        </div>
                        <div class="form-group cajaGeneroContacto">
                            <label>Género favorito: </label>
                            <select name="genero" class="generoContacto">

                                <?php
                                while ($generoPrincipal = mysqli_fetch_array($resultGeneroPrincipal)) {
                                    echo "<option>$generoPrincipal[generoPrincipal]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputMensaje">Mensaje</label>
                            <textarea name="mensaje" class="form-control inputContacto" id="inputMensaje"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary botonEnviar">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        <footer>
            <div>
                <img src="img/LogoFooter.png" width="80px" height="16px" alt=""/>
            </div>
            <div>
                <img src="img/Instagram.png" width="24px" height="24px" alt=""/>
                <img src="img/Facebook.png" width="24px" height="24px" alt=""/>
                <img src="img/Twitter.png" width="29px" height="24px" alt=""/>
                <img src="img/YouTube.png" width="32px" height="24px" alt=""/>
            </div>
        </footer>
    </body>
</html>
