<?php
!isset($cliente) && header("Location: /clientes");

session_start();
$_SESSION["clienteid_edit"] = $cliente["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <h1>Editar cliente</h1>

    <form action="/clientes/update" method="post">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $cliente["nombre"] ?>">
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="<?= $cliente["apellido"] ?>">
        </div>
        <div>
            <label for="telefono">Teléfono:</label>
            <input type="number" id="telefono" name="telefono" value="<?= $cliente["telefono"] ?>">
        </div>

        <button type="submit">Guardar</button>
    </form>


    <a href="/clientes">VER LISTA DE CLIENTES</a>
</body>

</html>