<?php
include 'conexion.php';

$idAmpliar = $_GET['idAmpliacion'];

echo $idAmpliar;

$queryAmpliar = "SELECT * FROM bandas WHERE id=$idAmpliar";
echo $queryAmpliar;

$resultAmpliar = mysqli_query($link, $queryAmpliar);
$unaBanda = mysqli_fetch_array($resultAmpliar);

$queryAmpliarDisco = "SELECT * FROM discos WHERE idBanda=$idAmpliar";
echo $queryAmpliarDisco;

$resultAmpliarDisco = mysqli_query($link, $queryAmpliarDisco);

$origenAmpliado = $unaBanda['origen'];
$queryRelacionados = "SELECT * FROM bandas WHERE origen='$origenAmpliado' AND id <> $idAmpliar LIMIT 4";
echo $queryRelacionados;
$resultRelacionados = mysqli_query($link, $queryRelacionados);
$cantidadDeRelacionados = mysqli_num_rows($resultRelacionados);
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

        <title>Ampliación</title>
    </head>
    <body id="bodyAmpliacion">
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
                <div class="col-md-5 offset-md-2 datosBanda">
                    <h1><?php echo $unaBanda['nombre'] ?></h1>
                    <div class="dividirTitulo"></div>
                    <p>Géneros: <?php echo $unaBanda['generos'] ?></p>
                    <p>País de origen: <?php echo $unaBanda['origen'] ?></p>
                    <p>Período de actividad: <?php echo $unaBanda['actividad'] ?></p>
                    <p>Cantidad de discos: <?php echo $unaBanda['cantidadDiscos'] ?></p>
                    <p>Idioma: <?php echo $unaBanda['idioma'] ?></p>
                    <p>Fecha de fundación: <?php echo $unaBanda['fundacion'] ?></p>
                    <p>Primer disco: <?php echo $unaBanda['primerDisco'] ?></p>
                    <p>Último disco: <?php echo $unaBanda['ultimoDisco'] ?></p>
                    <p>Primera canción: <?php echo $unaBanda['primeraCancion'] ?></p>
                </div>
                <div class="col-md-3 imagenBanda">
                    <div><img width="100%" src="img/<?php echo $unaBanda['imagen'] ?>"></div>
                </div>
            </div>

            <div class="dividirDiscografia1"></div>
            <h2 class="discografia">DISCOGRAFÍA</h2>
            <div class="dividirDiscografia2"></div>

            <div class="contenedor">
                <div class="col-md-10 offset-md-1">
                    <div class="sliderJuntos">
                        <ul class="slider">
                            <?php
                            while ($unDisco = mysqli_fetch_array($resultAmpliarDisco)) {
                                echo "<li><article><img src='img/$unDisco[imagen]'><div class='infoDisco'><h1>$unDisco[nombre]</h1><p>Publicación: $unDisco[publicacion]</p><p>Cantidad de canciones: $unDisco[cantidadCanciones]</p><p>Canción principal: $unDisco[cancionPrincipal]</p><p>Duración: $unDisco[duracion]</p></div></article></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">                    <?php
                if ($cantidadDeRelacionados > 0) {
                    echo "<h1 class='titRelacionadas'>Bandas relacionadas</h1>";
                    ?>

                    <div class='contenedorRelacionados'>
                        <?php
                        while ($unaBandaRelacionada = mysqli_fetch_array($resultRelacionados)) {
                            echo "<a href='ampliacion.php?idAmpliacion=$unaBandaRelacionada[id]'><img src='img/$unaBandaRelacionada[imagen]' class='logosRelacionados' width='8%'></a>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <footer class="footerAmpliacion">
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