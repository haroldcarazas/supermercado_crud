<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Producto.php";

class ProductoController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Producto();
    }

    /**
     * Muestra una vista con todos los productos.
     */
    public function index()
    {
    }

    /**
     * Muestra un formulario para crear un nuevo producto.
     */
    public function create()
    {
    }

    /**
     * Muestra un formulario para editar un producto.
     */
    public function edit($id)
    {
    }

    /**
     * Actualiza los datos de un producto y envía al usuario a /productos.
     */
    public function update($request)
    {
    }

    /**
     * Guarda el registro de un nuevo producto y envía al usuario a /productos.
     * 
     * @param array $request Datos del producto nuevo
     */
    public function store($request)
    {
    }

    /**
     * Eliminar el registro de un producto y envía al usuario a /productos.
     */
    public function delete($id)
    {
    }
}
