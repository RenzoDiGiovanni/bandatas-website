<?php

session_start();
if (!isset($_SESSION['logueado'])) {
    header("location:index.php?mensaje=noLogueado");
} else {

    $esteMomento = date("Y-n-j H:i:s");

    $cantidadSegundosFechaGuardada = strtotime($_SESSION['horaGuardada']);

    $cantidadSegudosEsteMomento = strtotime($esteMomento);
    $diferencia = $cantidadSegudosEsteMomento - $cantidadSegundosFechaGuardada;

    if ($diferencia > 120) {
        session_destroy();
        $_SESSION[] = array();
        header("location:index.php?mensaje=cerradoPorTiempo");
    } else {
        $_SESSION['horaGuardada'] = $esteMomento;
    }
}
