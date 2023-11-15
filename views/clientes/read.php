<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>

<body>
    <h1>Clientes</h1>
    <p>Aquí verás a todos los clientes de tu supermercado.</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($clientes as $cliente) {
            ?>
                <tr>
                    <td><?= $cliente["id"] ?></td>
                    <td><?= $cliente["nombre"] ?></td>
                    <td><?= $cliente["apellido"] ?></td>
                    <td><?= $cliente["telefono"] ?></td>
                    <td>
                        <a href="/clientes/edit">Editar</a>
                        <form action="" method="post" style="display: inline;">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>