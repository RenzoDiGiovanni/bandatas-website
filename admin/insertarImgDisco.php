<?php
include '../conexion.php';
$idDisco=  filter_input(INPUT_POST, 'idDisco',FILTER_SANITIZE_NUMBER_INT);


$_FILES['imagen'];
var_dump($_FILES['imagen']);
$nombreImg=$_FILES['imagen']['name'];
$ubicacionTemporal= $_FILES['imagen']['tmp_name'];
$ubicacionFinal="../img/".$nombreImg;

move_uploaded_file($ubicacionTemporal, $ubicacionFinal);

$queryInsertarImg="UPDATE discos SET imagen = '$nombreImg' WHERE id=$idDisco";
echo $queryInsertarImg;
$resultInsertarImagen=  mysqli_query($link, $queryInsertarImg);

if($resultInsertarImagen)
{
    header("location:listado.php?mensaje=imagenOK");
}