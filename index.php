<?php
include "conexion.php";

$queryRandom = "SELECT id, nombre FROM bandas ORDER BY RAND() LIMIT 4";
$resultRandom = mysqli_query($link, $queryRandom);
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

        <title>Bandatas</title>
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
        <div class="buscadorSimple">
            <form action="catalogo.php" class="form-inline">
                <input name="buscar" class="form-control mr-sm-2" type="search" placeholder="Nombre de la banda..." aria-label="Search">
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Buscar">
            </form>
        </div>
        <div class="inicio">
            <img src="img/Inicio.jpg" style="height: 100vh; width: 100%" alt=""/>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <h1 class="titPrincipal">LO MEJOR DEL ROCK URUGUAYO</h1>
                    <p class="descripcionPrincipal">
                        El rock uruguayo está influenciado por géneros musicales propios del país, como el candombe o la murga, así como también por géneros propios de la región del Río de la Plata, como el tango o la milonga. De esta fusión, surge dicho estilo musical.
                    </p>
                    <a href="catalogo.php?genero=Rock&pais=Uruguay"><input type="submit" class="botonAmpliar" value="Ampliar"></a>
                </div>
                <div class="col-md-3">
                    <img src="img/LVP4.jpg" width="100%" alt=""/>
                </div>
                <div class="col-md-3">
                    <img src="img/NTVG1.jpg" width="100%" alt=""/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <h2 class='titIdiomas'>INGLÉS</h2>
                    <a href="catalogo.php?idioma=Inglés"><img src="img/ingles.png" width="100%" class="imagenIdioma" alt=""/></a>
                </div>
                <div class="col-md-5">
                    <h2 class="titIdiomas">ESPAÑOL</h2>
                    <a href="catalogo.php?idioma=Español"><img src="img/espanol.png" width="100%" class="imagenIdioma" alt=""/></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 dividirRandom">
                    <h2></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <?php
                while ($unaBandaRandom = mysqli_fetch_array($resultRandom)) {

                    $idBandaRandom = $unaBandaRandom['id'];
                    $queryImagenesRandom = "SELECT imagen FROM bandas WHERE id=$idBandaRandom LIMIT 1";
                    $resultImagenRandom = mysqli_query($link, $queryImagenesRandom);
                    $unaImagenRandom = mysqli_fetch_array($resultImagenRandom);

                    echo "<div class='col-md-2'><a href='ampliacion.php?idAmpliacion=$unaBandaRandom[id]'><img src='img/$unaImagenRandom[imagen]' width='60%' class='logoRandom'></a></div>";
                }
                ?>
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
