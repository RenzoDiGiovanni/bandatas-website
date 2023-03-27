<?php
include 'control.php';
if (!isset($_GET['idModificar'])) {
    header("location:listado.php?mensaje=errorModificar");
}
include '../conexion.php';

$queryDisco = "SELECT * FROM discos WHERE id=$_GET[idModificar]";

$resultDisco = mysqli_query($link, $queryDisco);
$unDisco = mysqli_fetch_array($resultDisco);

$queryImagenes = "SELECT imagen FROM discos WHERE id=$_GET[idModificar]";
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

        <title>Modificar Disco</title>
    </head>
    <body>
        <nav class="volver">
            <a href="listado.php?mensaje=bienvenido">Volver al Listado</a>
        </nav>
        <h1 class="titSQL">Modificar Disco</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="modificarDisco.php" method="get" class="formSQL">
                        <input type="hidden" name="id" value="<?php echo $unDisco['id']; ?>">

                        <label for="idBanda" class="labelSQL">ID Banda</label>
                        <input type="text" name="idBanda" id="idBanda" value="<?php echo $unDisco['idBanda']; ?>" class="inputSQL"><br>     

                        <label for="nombre" class="labelSQL">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $unDisco['nombre']; ?>" class="inputSQL"><br>

                        <label for="publicacion" class="labelSQL">Publicación</label>
                        <input type="date" name="publicacion" id="publicacion" value="<?php echo $unDisco['publicacion']; ?>" class="inputSQL"><br>

                        <label for="cantidadCanciones" class="labelSQL">Cantidad de canciones</label>
                        <input type="text" name="cantidadCanciones" id="cantidadCanciones" value="<?php echo $unDisco['cantidadCanciones']; ?>" class="inputSQL"><br>

                        <label for="cancionPrincipal" class="labelSQL">Canción principal</label>
                        <input type="text" name="cancionPrincipal" id="cancionPrincipal" value="<?php echo $unDisco['cancionPrincipal']; ?>" class="inputSQL"><br>

                        <label for="duracion" class="labelSQL">Duración</label>
                        <input type="text" name="duracion" id="duracion" value="<?php echo $unDisco['duracion']; ?>" class="inputSQL"><br>

                        <label for="imagen" class="labelSQL">Imagen</label>
                        <input type="text" name="imagen" id="imagen" value="<?php echo $unDisco['imagen']; ?>" class="inputSQL"><br>

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
                echo "<a href='borrarImgDisco.php?id=$unDisco[id]'><button class='botonEliminarImg'>Borrar imagen</button></a>";
            }
        }
        ?>
    </body>
</html>
