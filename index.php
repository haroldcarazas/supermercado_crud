<?php
// ENRUTADOR
require_once "./controllers/HomeController.php";
require_once "./controllers/ClienteController.php";

$homeController = new HomeController();
$clienteController = new ClienteController();

// Dividimos la ruta por el signo "?" para no leer los query params. Ejem: /clientes?id=1
$route = explode("?", $_SERVER["REQUEST_URI"]);

$method = $_SERVER["REQUEST_METHOD"];

if ($method === "POST") {
    switch ($route[0]) {
        case '/clientes/delete':
            $clienteController->delete($_POST["id"]);
            break;

        case '/clientes/create':
            $clienteController->store($_POST);
            break;

        case '/clientes/update':
            $clienteController->update($_POST);
            break;

        default:
            echo "NO ENCONTRAMOS LA RUTA.";
            break;
    }
}

if ($method === "GET") {
    switch ($route[0]) {
        case '/index.php':
            $homeController->index();
            break;

        case '/clientes':
            $clienteController->index();
            break;

        case '/clientes/edit':
            $clienteController->edit($_GET["id"]);
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
