<?php
include "conexion.php";

if(isset($_GET['idioma']) || isset($_GET['genero']) || isset($_GET['pais'])) {
    $sql = "SELECT nombre, imagen, id FROM bandas WHERE ";
    if(isset($_GET['idioma']) && isset($_GET['genero']) && isset($_GET['pais'])) {
        $sql .= "idioma='".$_GET['idioma']."' AND generoPrincipal='".$_GET['genero']."' AND origen='".$_GET['pais']."'";
    }
    else if(isset($_GET['idioma']) && isset($_GET['genero']) && !isset($_GET['pais'])) {
        $sql .= "idioma='".$_GET['idioma']."' and generoPrincipal='".$_GET['genero']."'";
    }
    else if(isset($_GET['idioma']) && !isset($_GET['genero']) && isset($_GET['pais'])) {
        $sql .= "idioma='".$_GET['idioma']."' and origen='".$_GET['pais']."'";
    }
    else if(!isset($_GET['idioma']) && isset($_GET['genero']) && isset($_GET['pais'])) {
        $sql .= "generoPrincipal='".$_GET['genero']."' and origen='".$_GET['pais']."'";
    }
    else if(isset($_GET['genero']) && !isset($_GET['pais']) && !isset($_GET['idioma'])) {
        $sql .= "generoPrincipal='".$_GET['genero']."'";
    }
    else if(!isset($_GET['genero']) && isset($_GET['pais']) && !isset($_GET['idioma'])) {
        $sql .= "origen='".$_GET['pais']."'";
    }
    else if(!isset($_GET['genero']) && !isset($_GET['pais']) && isset($_GET['idioma'])) {
        $sql .= "idioma='".$_GET['idioma']."'";
    }
    
    $resultCatalogo= mysqli_query($link, $sql);
}
else {
    $sql = "SELECT nombre, imagen, id FROM bandas";
    
    $resultCatalogo= mysqli_query($link, $sql);
}

$queryMenuIdioma = "SELECT DISTINCT idioma FROM bandas ORDER BY idioma";
$resultMenuIdioma = mysqli_query($link, $queryMenuIdioma);

$queryMenuOrigen = "SELECT DISTINCT origen FROM bandas ORDER BY origen";
$resultMenuOrigen = mysqli_query($link, $queryMenuOrigen);

$queryMenuGenero = "SELECT DISTINCT generoPrincipal FROM bandas ORDER BY generoPrincipal";
$resultMenuGenero = mysqli_query($link, $queryMenuGenero);

if(isset($_GET['buscar'])){
$textoBuscar=$_GET['buscar'];
$queryBuscadorSimple="SELECT * FROM bandas WHERE nombre LIKE '%$textoBuscar%'";
echo $queryBuscadorSimple;
$resultCatalogo =  mysqli_query($link, $queryBuscadorSimple);
}

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
        
        <title>Catálogo</title>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <form method="GET" action="">
                        <div class="cajaIdiomas">
                            <h3 class="titFiltros">Idioma</h3>
                            <div class="dividirFiltros"></div>
                            <?php
                            while ($unIdioma = mysqli_fetch_array($resultMenuIdioma)) {
                                echo "<div class='contenedorInput'><input type='radio' id='idioma' name='idioma' class='inputFiltros' value='$unIdioma[idioma]'>$unIdioma[idioma]</div>";
                            }
                            ?>
                        </div>             
                        <div class="cajaGeneros">
                            <h3 class="titFiltros">Género</h3>
                            <div class="dividirFiltros"></div>
                            <?php
                            while ($unGenero = mysqli_fetch_array($resultMenuGenero)) {
                                echo "<div class='contenedorGenero'><input type='radio' id='genero' name='genero' class='inputFiltros' value='$unGenero[generoPrincipal]'>$unGenero[generoPrincipal]</div>";
                            }
                            ?>
                        </div>  
                        <div class="cajaPaises">
                            <h3 class="titFiltros">País</h3>
                            <div class="dividirFiltros"></div>
                            <select name="pais" class="selectPais">
                                <?php
                                while ($origen = mysqli_fetch_array($resultMenuOrigen)) {
                                    echo "<option>$origen[origen]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <input type="submit" value="Buscar" class="botonBuscar">
                    </form>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <?php
                        
                        if(isset($resultCatalogo))
                        {
                            while ($unaBanda = mysqli_fetch_array($resultCatalogo)) {
                                echo "<div class='col-md-3 cajaLogos'><a href='ampliacion.php?idAmpliacion=$unaBanda[id]' class='nombreBanda'><img src='img/$unaBanda[imagen]' class='imagenLogos'><p>$unaBanda[nombre]</p></a></div>";
                            }     
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
