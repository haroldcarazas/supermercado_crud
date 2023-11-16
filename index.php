<?php
// ENRUTADOR
require_once "./controllers/HomeController.php";
require_once "./controllers/ClienteController.php";

$homeController = new HomeController();
$clienteController = new ClienteController();

$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

if ($method === "POST") {
    switch ($route) {
        case '/clientes/delete':
            $clienteController->delete($_POST["id"]);
            break;

        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}

if ($method === "GET") {
    switch ($route) {
        case '/index.php':
            $homeController->index();
            break;

        case '/clientes':
            $clienteController->index();
            break;

        case '/clientes/create':
            $clienteController->create();
            break;

        case '/empleados':
            echo "Página de empleados";
            break;

        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}
