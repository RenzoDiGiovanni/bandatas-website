<?php
include "../conexion.php";
include 'control.php';
$idDisco=$_GET['id'];

$queryNombreImagen="SELECT imagen FROM discos WHERE id=$idDisco";
$resultNombreImagen=  mysqli_query($link, $queryNombreImagen);
$nombreImagen=  mysqli_fetch_array($resultNombreImagen);

echo $nombreImagen[0];

unlink("../img/$nombreImagen[0]");

$queryBorrarImg="UPDATE discos SET imagen = '' WHERE id=$idDisco";
$resultBorrarImagen=  mysqli_query($link, $queryBorrarImg);

if($resultBorrarImagen)
{
    header("location:modificarFormDiscos.php?idModificar=$idDisco");
}