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

        <title>Insertar Banda</title>
    </head>
    <body>
        <nav class="volver">
            <a href="listado.php?mensaje=bienvenido">Volver al Listado</a>
        </nav>
        <h1 class="titSQL">Ingresar nueva banda</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="ingresarBanda.php" method="get" class="formSQL">

                        <div class="form-group">
                            <label for="nombre" class="labelSQL">Nombre</label>
                            <input type="text" required name="nombre" id="nombre" class="inputSQL"><br>
                        </div>

                        <label for="generos" class="labelSQL">Géneros</label>
                        <input type="text" required name="generos" id="generos" class="inputSQL"><br>

                        <label for="generoPrincipal" class="labelSQL">Género Principal</label>
                        <input type="text" required name="generoPrincipal" id="generoPrincipal" class="inputSQL"><br>

                        <label for="actividad" class="labelSQL">Actividad</label>
                        <input type="text" required name="actividad" id="actividad" class="inputSQL"><br>

                        <label for="origen" class="labelSQL">Origen</label>
                        <input type="text" required name="origen" id="origen" class="inputSQL"><br>

                        <label for="cantidadDiscos" class="labelSQL">Cantidad de discos</label>
                        <input type="text" required name="cantidadDiscos" id="cantidadDiscos" class="inputSQL"><br>

                        <label for="idioma" class="labelSQL">Idioma</label>
                        <input type="text" required name="idioma" id="idioma" class="inputSQL"><br>

                        <label for="fundacion" class="labelSQL">Fundación</label>
                        <input type="date" required name="fundacion" id="fundacion" class="inputSQL"><br>

                        <label for="primerDisco" class="labelSQL">Primer disco</label>
                        <input type="text" required name="primerDisco" id="primerDisco" class="inputSQL"><br>

                        <label for="ultimoDisco" class="labelSQL">Último disco</label>
                        <input type="text" required name="ultimoDisco" id="ultimoDisco" class="inputSQL"><br>

                        <label for="primeraCancion" class="labelSQL">Primera canción</label>
                        <input type="text" required name="primeraCancion" id="primeraCancion" class="inputSQL"><br>

                        <label for="imagen" class="labelSQL">Imagen</label>
                        <input type="text" name="imagen" id="imagen" class="inputSQL"><br>

                        <input type="submit" value="Insertar" class="botonSQL">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
