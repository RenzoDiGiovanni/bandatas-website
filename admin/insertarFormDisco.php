<?php
include 'control.php';
include '../conexion.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">

        <link href="estilosAdmin.css" rel="stylesheet" type="text/css"/>

        <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Assistant:300,400,600,700,800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Insertar Disco</title>
    </head>
    <body>
        <nav class="volver">
            <a href="listado.php?mensaje=bienvenido">Volver al Listado</a>
        </nav>
        <h1 class="titSQL">Ingresar nuevo disco</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="ingresarDisco.php" method="get" class="formSQL">
                        <label for="idBanda" class="labelSQL">ID Banda</label>
                        <input type="text" required name="idBanda" id="idBanda" class="inputSQL"><br>     

                        <label for="nombre" class="labelSQL">Nombre</label>
                        <input type="text" required name="nombre" id="nombre" class="inputSQL"><br>

                        <label for="publicacion" class="labelSQL">Publicación</label>
                        <input type="date" required name="publicacion" id="publicacion" class="inputSQL"><br>

                        <label for="cantidadCanciones" class="labelSQL">Cantidad de canciones</label>
                        <input type="text" required name="cantidadCanciones" id="cantidadCanciones" class="inputSQL"><br>

                        <label for="cancionPrincipal" class="labelSQL">Canción principal</label>
                        <input type="text" required name="cancionPrincipal" id="cancionPrincipal" class="inputSQL"><br>

                        <label for="duracion" class="labelSQL">Duración</label>
                        <input type="text" required name="duracion" id="duracion" class="inputSQL"><br>

                        <label for="imagen" class="labelSQL">Imagen</label>
                        <input type="text" name="imagen" id="imagen" class="inputSQL"><br>

                        <input type="submit" value="Insertar" class="botonSQL">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
