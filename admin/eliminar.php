<?php
include "../conexion.php";
include 'control.php';
if(isset($_GET['idEliminar']))
{    
    $queryImagenesBorrar="SELECT imagen FROM bandas WHERE id=$_GET[idEliminar]";
    $resultImagenesBorrar=  mysqli_query($link, $queryImagenesBorrar);
    $cantidadImagenesBorrar=  mysqli_num_rows($resultImagenesBorrar);
    if($cantidadImagenesBorrar>0)
    {
        while($unaimagenBorrar=  mysqli_fetch_array($resultImagenesBorrar))
    {
        unlink("../img/$unaimagenBorrar[0]");
    }
    $queryEliminarImagenes="DELETE FROM bandas WHERE id=$_GET[idEliminar]";
    $resultImagenesEliminarTodas=  mysqli_query($link, $queryEliminarImagenes);
    }
    
    $queryEliminar="DELETE FROM bandas WHERE id=$_GET[idEliminar]";
    $resultEliminar=  mysqli_query($link, $queryEliminar);
    if($resultEliminar)
    {
        header("location:listado.php?mensaje=eliminadoOk");
    }
}
else{
    header("location:listado.php?mensaje=errorEliminar");
}
