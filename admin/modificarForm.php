<?php
include 'control.php';
if (!isset($_GET['idModificar'])) {
    header("location:listado.php?mensaje=errorModificar");
}
include '../conexion.php';

$queryBanda = "SELECT * FROM bandas WHERE id= $_GET[idModificar]";

$resultBanda = mysqli_query($link, $queryBanda);
$unaBanda = mysqli_fetch_array($resultBanda);

$queryImagenes = "SELECT imagen FROM bandas WHERE id=$_GET[idModificar]";
$resultImagenes = mysqli_query($link, $queryImagenes);
$cantidadImagenes = mysqli_num_rows($resultImagenes);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <link href="estilosAdmin.css" rel="stylesheet" type="text/css"/>

        <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Assistant:300,400,600,700,800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Modificar Banda</title>
    </head>
    <body>
        <nav class="volver">
            <a href="listado.php?mensaje=bienvenido">Volver al Listado</a>
        </nav>
        <h1 class="titSQL">Modificar Banda</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="modificarBanda.php" method="get" class="formSQL">
                        <input type="hidden" name="id" value="<?php echo $unaBanda['id']; ?>">

                        <label for="nombre" class="labelSQL">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $unaBanda['nombre']; ?>" class="inputSQL"><br>

                        <label for="generos" class="labelSQL">Géneros</label>
                        <input type="text" name="generos" id="generos" value="<?php echo $unaBanda['generos']; ?>" class="inputSQL"><br>

                        <label for="generoPrincipal" class="labelSQL">Género Principal</label>
                        <input type="text" name="generoPrincipal" id="generoPrincipal" value="<?php echo $unaBanda['generoPrincipal']; ?>" class="inputSQL"><br>

                        <label for="actividad" class="labelSQL">Actividad</label>
                        <input type="text" name="actividad" id="actividad" value="<?php echo $unaBanda['actividad']; ?>" class="inputSQL"><br>

                        <label for="origen" class="labelSQL">Origen</label>
                        <input type="text" name="origen" id="origen" value="<?php echo $unaBanda['origen']; ?>" class="inputSQL"><br>

                        <label for="cantidadDiscos" class="labelSQL">Cantidad de discos</label>
                        <input type="text" name="cantidadDiscos" id="cantidadDiscos" value="<?php echo $unaBanda['cantidadDiscos']; ?>" class="inputSQL"><br>

                        <label for="idioma" class="labelSQL">Idioma</label>
                        <input type="text" name="idioma" id="idioma" value="<?php echo $unaBanda['idioma']; ?>" class="inputSQL"><br>

                        <label for="fundacion" class="labelSQL">Fundación</label>
                        <input type="date" name="fundacion" id="fundacion" value="<?php echo $unaBanda['fundacion']; ?>" class="inputSQL"><br>

                        <label for="primerDisco" class="labelSQL">Primer disco</label>
                        <input type="text" name="primerDisco" id="primerDisco" value="<?php echo $unaBanda['primerDisco']; ?>" class="inputSQL"><br>

                        <label for="ultimoDisco" class="labelSQL">Último disco</label>
                        <input type="text" name="ultimoDisco" id="ultimoDisco" value="<?php echo $unaBanda['ultimoDisco']; ?>" class="inputSQL"><br>

                        <label for="primeraCancion" class="labelSQL">Primera canción</label>
                        <input type="text" name="primeraCancion" id="primeraCancion" value="<?php echo $unaBanda['primeraCancion']; ?>" class="inputSQL"><br>

                        <label for="imagen" class="labelSQL">Imagen</label>
                        <input type="text" name="imagen" id="imagen" value="<?php echo $unaBanda['imagen']; ?>" class="inputSQL"><br>

                        <input type="submit" value="Modificar" class="botonSQL">
                    </form>
                </div>
            </div>
        </div>

        <hr class="dividirSQL">
        <?php
        if ($cantidadImagenes > 0) {
            while ($unaImagen = mysqli_fetch_array($resultImagenes)) {
                echo "<img src='../img/$unaImagen[imagen]' alt='' class='imagenSQL'>";
                echo "<a href='borrarImg.php?id=$unaBanda[id]'><button class='botonEliminarImg'>Borrar imagen</button></a>";
            }
        }
        ?>
    </body>
</html>
