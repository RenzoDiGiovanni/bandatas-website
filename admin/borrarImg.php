<?php
include "../conexion.php";
include 'control.php';
$idBanda=$_GET['id'];

$queryNombreImagen="SELECT imagen FROM bandas WHERE id=$idBanda";
$resultNombreImagen=  mysqli_query($link, $queryNombreImagen);
$nombreImagen=  mysqli_fetch_array($resultNombreImagen);

echo $nombreImagen[0];

unlink("../img/$nombreImagen[0]");

$queryBorrarImg="UPDATE bandas SET imagen = '' WHERE id=$idBanda";
$resultBorrarImagen=  mysqli_query($link, $queryBorrarImg);

if($resultBorrarImagen)
{
    header("location:modificarForm.php?idModificar=$idBanda");
}