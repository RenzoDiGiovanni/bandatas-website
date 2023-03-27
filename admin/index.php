<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">

        <link href="estilosAdmin.css" rel="stylesheet" type="text/css"/>

        <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Assistant:300,400,600,700,800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Login</title>
    </head>
    <body>
        <h1 class="titLogin">LOGIN</h1>
        <?php
        if (isset($_GET['mensaje'])) {
            $mensaje = $_GET['mensaje'];
            switch ($mensaje) {
                case "noValido": {
                        echo "<h2 class='alertaLogin'> Su usuario y contraseña no son correctos</h2>";
                        break;
                    }
                case "noLogueado": {
                        echo "<h2 class='alertaLogin'> Para ingresar debes loguearte primero</h2>";
                        break;
                    }
                case "cerrado": {
                        echo "<h2 class='alertaLogin'> Se ha cerrado su sesión</h2>";
                        break;
                    }
            }
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="validarUsuario.php" method="POST" class="formLogin">
                        <div class="contenedorLogin">
                            <label for="usuario" class="labelSQL">Usuario</label>
                            <input type="text" id="usuario" name="usuario" class="inputSQL"><br>
                        </div>
                        <div class="contenedorLogin">
                            <label for="contrasenia" class="labelSQL">Contraseña</label>
                            <input type="password" id="contrasenia" name="contrasenia" class="inputSQL"><br>
                        </div>
                        <input type="submit" value="Ingresar" class="botonLogin">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
