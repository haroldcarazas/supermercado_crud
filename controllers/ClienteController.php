<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Cliente.php";

class ClienteController
{
    public function index()
    {
        $clienteModel = new Cliente();
        $clientes = $clienteModel->all();

        // var_dump($clientes);
        include $_SERVER["DOCUMENT_ROOT"] . "/views/clientes/read.php";
    }
}