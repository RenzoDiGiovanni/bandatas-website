<?php
include '../conexion.php';
include 'control.php';

$nombreIngresado = filter_input(INPUT_GET, 'nombre', FILTER_DEFAULT);

$generosIngresado = filter_input(INPUT_GET, 'generos', FILTER_SANITIZE_STRING);

$generoPrincipalIngresado = filter_input(INPUT_GET, 'generoPrincipal', FILTER_SANITIZE_STRING);

$origenIngresado = filter_input(INPUT_GET, 'origen', FILTER_SANITIZE_STRING);

$actividadIngresada = filter_input(INPUT_GET, 'actividad', FILTER_DEFAULT);

$cantidadDiscosIngresado = filter_input(INPUT_GET, 'cantidadDiscos', FILTER_SANITIZE_NUMBER_INT);

$idiomaIngresado = filter_input(INPUT_GET, 'idioma', FILTER_SANITIZE_STRING);

$fundacion = $_GET['fundacion'];

$primerDiscoIngresado = filter_input(INPUT_GET, 'primerDisco', FILTER_DEFAULT);

$ultimoDiscoIngresado = filter_input(INPUT_GET, 'ultimoDisco', FILTER_DEFAULT);

$primeraCancionIngresada = filter_input(INPUT_GET, 'primeraCancion', FILTER_DEFAULT);

$imagenIngresada = filter_input(INPUT_GET, 'imagen', FILTER_DEFAULT);

$queryInsertar="INSERT INTO bandas VALUES (' ','$nombreIngresado', '$generosIngresado', '$generoPrincipalIngresado', '$origenIngresado', '$actividadIngresada', '$cantidadDiscosIngresado', '$idiomaIngresado', '$fundacion', '$primerDiscoIngresado', '$ultimoDiscoIngresado', '$primeraCancionIngresada', '$imagenIngresada')";
echo $queryInsertar;

$insertadoOK= mysqli_query($link, $queryInsertar);
echo $insertadoOK;
if($insertadoOK)
{
    header("location:listado.php?mensaje=insertadoOK");
}
 else {
   header("location:listado.php?mensaje=insertadoMAL");
}
