<?php

include 'control.php';
include '../conexion.php';

$idModificarDisco = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$idBandaIngresado = filter_input(INPUT_GET, 'idBanda', FILTER_SANITIZE_NUMBER_INT);

$nombreDiscoIngresado = filter_input(INPUT_GET, 'nombre', FILTER_DEFAULT);

$publicacion = $_GET['publicacion'];

$cantidadCancionesIngresado = filter_input(INPUT_GET, 'cantidadCanciones', FILTER_SANITIZE_NUMBER_INT);

$cancionPrincipalIngresada = filter_input(INPUT_GET, 'cancionPrincipal', FILTER_DEFAULT);

$duracionIngresada = filter_input(INPUT_GET, 'duracion', FILTER_DEFAULT);

$imagenDiscoIngresada = filter_input(INPUT_GET, 'imagen', FILTER_DEFAULT);

echo $idModificarDisco . $idBandaIngresado . $nombreDiscoIngresado . $publicacion . $cantidadCancionesIngresado . $cancionPrincipalIngresada . $duracionIngresada . $imagenDiscoIngresada;
$queryModificarDisco = "UPDATE discos SET idBanda=$idBandaIngresado, nombre='$nombreDiscoIngresado', publicacion='$publicacion', cantidadCanciones=$cantidadCancionesIngresado, cancionPrincipal='$cancionPrincipalIngresada', duracion='$duracionIngresada', imagen='$imagenDiscoIngresada' WHERE id=$idModificarDisco";

echo $queryModificarDisco;

$resultModificarDisco = mysqli_query($link, $queryModificarDisco);

if ($resultModificarDisco) {
    header("location:listado.php?mensaje=modificadoOK");
} else {
    header("location:listado.php?mensaje=errorModificado");
}