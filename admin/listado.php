<?php
include "../conexion.php";
include "control.php";
$queryListado = "SELECT * FROM bandas";
$resultListado = mysqli_query($link, $queryListado);

$queryListadoDiscos = "SELECT * FROM discos";
$resultListadoDiscos = mysqli_query($link, $queryListadoDiscos);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="estilosAdmin.css" rel="stylesheet" type="text/css"/>

        <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Assistant:300,400,600,700,800&display=swap" rel="stylesheet">

        <title>Listado</title>
    </head>
    <body>
        <header>
            <nav>
                <a href="insertarForm.php" class="nuevaBanda">Insertar Nueva Banda</a>
                <a href="insertarFormDisco.php" class="nuevoDisco">Insertar Nuevo Disco</a>
                <a href="cerrarSesion.php" class="cerrarSesion">Cerrar Sesión</a>
            </nav>
        </header>
        <?php
        if (isset($_GET['mensaje'])) {
            $mensaje = $_GET['mensaje'];
            switch ($mensaje) {
                case "errorEliminar": {
                        echo "<h2 class='alertaListado'>No se pudo eliminar, debes seleccionar una Banda/Disco</h2>";
                        break;
                    }
                case "errorModificar": {
                        echo "<h2 class='alertaListado'>No se pudo acceder al elemento, debes seleccionar una Banda/Disco</h2>";
                        break;
                    }
                case "eliminadoOk": {
                        echo "<h2 class='alertaListado'>Se ha eliminado correctamente</h2>";
                        break;
                    }
                case "insertadoOK": {
                        echo "<h2 class='alertaListado'>Se ha insertado correctamente</h2>";
                        break;
                    }
                case "modificadoOK": {
                        echo "<h2 class='alertaListado'>Se ha modificado correctamente</h2>";
                        break;
                    }
                case "imagenOK": {
                        echo "<h2 class='alertaListado'>Se ha agregado una imagen</h2>";
                        break;
                    }
                case "bienvenido": {
                        echo "<h2 class='alertaListado'>¡Bienvenido/a!</h2>";
                        break;
                    }
            }
        }
        ?>
        <h1 class="titListado">Listado de Bandas</h1>
        <table>
            <tr>
                <th>ID</th>
                <th></th>
                <th></th>
                <th></th>
                <th>Nombre</th>
                <th>Género Principal</th>
                <th>Origen</th>
                <th>Idioma</th>
                <th>Primer disco</th>
                <th>Último disco</th>
                <th>Primera canción</th>
                <th>Imagen</th>
            </tr>
            <?php
            while ($unaBandaListada = mysqli_fetch_array($resultListado)) {
                echo "<tr>";
                echo "<td>$unaBandaListada[id]</td>";
                echo "<td><a href='eliminar.php?idEliminar=$unaBandaListada[id]' class='eliminar'>Eliminar</a></td>";
                echo "<td><a href='modificarForm.php?idModificar=$unaBandaListada[id]' class='modificar'>Modificar</a></td>";
                echo "<td><a href='imagenesForm.php?idBanda=$unaBandaListada[id]' class='agregar'>Agregar imágenes</a></td>";
                echo "<td>$unaBandaListada[nombre]</td>";
                echo "<td>$unaBandaListada[generoPrincipal]</td>";
                echo "<td>$unaBandaListada[origen]</td>";
                echo "<td>$unaBandaListada[idioma]</td>";
                echo "<td>$unaBandaListada[primerDisco]</td>";
                echo "<td>$unaBandaListada[ultimoDisco]</td>";
                echo "<td>$unaBandaListada[primeraCancion]</td>";
                echo "<td>$unaBandaListada[imagen]</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <h1 class="titListado">Listado de Discos</h1>
        <table>
            <tr>
                <th>ID</th>
                <th></th>
                <th></th>
                <th></th>
                <th>ID Banda</th>
                <th>Nombre</th>
                <th>Publicación</th>
                <th>Cantidad de canciones</th>
                <th>Canción principal</th>
                <th>Duración</th>
                <th>Imagen</th>
            </tr>
            <?php
            while ($unDiscoListado = mysqli_fetch_array($resultListadoDiscos)) {
                echo "<tr>";
                echo "<td>$unDiscoListado[id]</td>";
                echo "<td><a href='eliminarDisco.php?idEliminar=$unDiscoListado[id]' class='eliminar'>Eliminar</a></td>";
                echo "<td><a href='modificarFormDiscos.php?idModificar=$unDiscoListado[id]' class='modificar'>Modificar</a></td>";
                echo "<td><a href='imagenesFormDisco.php?idDisco=$unDiscoListado[id]' class='agregar'>Agregar imágenes</a></td>";
                echo "<td>$unDiscoListado[idBanda]</td>";
                echo "<td>$unDiscoListado[nombre]</td>";
                echo "<td>$unDiscoListado[publicacion]</td>";
                echo "<td>$unDiscoListado[cantidadCanciones]</td>";
                echo "<td>$unDiscoListado[cancionPrincipal]</td>";
                echo "<td>$unDiscoListado[duracion]</td>";
                echo "<td>$unDiscoListado[imagen]</td>";
                echo "</tr>";
            }
            ?>
        </table>

    </body>
</html>
