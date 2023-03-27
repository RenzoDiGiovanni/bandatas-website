<?php
include "../conexion.php";
$usuario=$_POST['usuario'];
$contrasenia=$_POST['contrasenia'];

$queryValidarUsuario="SELECT * FROM administradores WHERE usuario='$usuario' AND contrasenia='$contrasenia'";
$resultValidarUsuario=  mysqli_query($link, $queryValidarUsuario);

$cantidadUsuarios=  mysqli_num_rows($resultValidarUsuario);
if($cantidadUsuarios===1)
{
    $datosUsuario=  mysqli_fetch_array($resultValidarUsuario);
    session_start();
    $_SESSION['logueado']="OK";
    $_SESSION['nombre']=$datosUsuario['nombre'];
    $_SESSION['horaGuardada']=date("Y-n-j H:i:s");
    
    header("location:listado.php?mensaje=bienvenido");
}
else{
    header("location:index.php?mensaje=noValido");
}       