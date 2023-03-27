<?php
include "../conexion.php";
include 'control.php';
if(isset($_GET['idEliminar']))
{    
    $queryEliminarDisco="DELETE FROM discos WHERE id=$_GET[idEliminar]";
    $resultEliminarDisco=  mysqli_query($link, $queryEliminarDisco);
    if($resultEliminarDisco)
    {
        header("location:listado.php?mensaje=eliminadoOk");
    }
}
else{
    header("location:listado.php?mensaje=errorEliminar");
}