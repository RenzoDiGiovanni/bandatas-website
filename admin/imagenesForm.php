<?php
if (!isset($_GET['idBanda'])) {
    header("location:listado.php?mensaje=errorImagen");
}
$idBanda = $_GET['idBanda'];
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">

        <link href="estilosAdmin.css" rel="stylesheet" type="text/css"/>

        <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Assistant:300,400,600,700,800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Cargar Imagen</title>
    </head>
    <body>
        <nav class="volver">
            <a href="listado.php?mensaje=bienvenido">Volver al Listado</a>
        </nav>
        <h1 class="titSQL">Agregar imagen banda</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="insertarImg.php" method="POST" enctype="multipart/form-data" class="formSQL">
                        <input name="idBanda" type="hidden" value="<?php echo $idBanda; ?>">
                        <input type="file" name="imagen" class="botonSQL"><br>

                        <input type="submit" value="Subir imagen" class="botonSQL">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
