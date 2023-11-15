<?php
// ENRUTADOR
require_once "./controllers/HomeController.php";
require_once "./controllers/ClienteController.php";

$homeController = new HomeController();
$clienteController = new ClienteController();

$route = $_SERVER["REQUEST_URI"];

switch ($route) {
    case '/index.php':
        $homeController->index();
        break;

    case '/clientes':
        $clienteController->index();
        break;

    case '/empleados':
        echo "Página de empleados";
        break;

    default:
        echo "NO ENCONTRAMOS LA RUTA.";
        break;
}
