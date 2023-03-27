<?php
include '../conexion.php';
include 'control.php';

$idBandaIngresado = filter_input(INPUT_GET, 'idBanda', FILTER_SANITIZE_NUMBER_INT);

$nombreDiscoIngresado = filter_input(INPUT_GET, 'nombre', FILTER_DEFAULT);

$publicacion = $_GET['publicacion'];

$cantidadCancionesIngresado = filter_input(INPUT_GET, 'cantidadCanciones', FILTER_SANITIZE_NUMBER_INT);

$cancionPrincipalIngresada = filter_input(INPUT_GET, 'cancionPrincipal', FILTER_DEFAULT);

$duracionIngresada = filter_input(INPUT_GET, 'duracion', FILTER_DEFAULT);

$imagenDiscoIngresada = filter_input(INPUT_GET, 'imagen', FILTER_DEFAULT);

$queryInsertarDisco="INSERT INTO discos VALUES (' ','$idBandaIngresado', '$nombreDiscoIngresado', '$publicacion', '$cantidadCancionesIngresado', '$cancionPrincipalIngresada', '$duracionIngresada', '$imagenDiscoIngresada')";
echo $queryInsertarDisco;

$insertadoOK= mysqli_query($link, $queryInsertarDisco);
echo $insertadoOK;
if($insertadoOK)
{
    header("location:listado.php?mensaje=insertadoOK");
}
 else {
   header("location:listado.php?mensaje=insertadoMAL");
}
