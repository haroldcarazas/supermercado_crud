<?php
class Cliente
{
    private $db;

    public function __construct()
    {
        $config = include($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

        try {
            $this->db = new mysqli(
                $config["host"],
                $config["username"],
                $config["password"],
                $config["dbname"]
            );
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function all()
    {
        $res = $this->db->query("select * from clientes");
        $data = $res->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    /**
     * Método para obtener un registro por su id.
     *
     * @param integer $id Id del usuario a buscar.
     * @return array Arreglo con los datos del usuario.
     */
    public function find($id)
    {
        $res = $this->db->query("select * from clientes where id = $id");
        $data = $res->fetch_assoc();

        return $data;
    }

    public function create($data)
    {
        try {
            $nombre = $data["nombre"];
            $apellido = $data["apellido"];
            $telefono = $data["telefono"];

            $res = $this->db->query("insert into clientes(nombre, apellido, telefono) values ('$nombre', '$apellido', '$telefono')");

            if ($res) {
                $ultimoId = $this->db->insert_id;
                $res = $this->db->query("select * from clientes where id = $ultimoId");
                $data = $res->fetch_assoc();

                return $data;
            } else {
                return "No se pudo crear el cliente";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update($data)
    {
        session_start();
        $res = $this->db->query("
            update clientes set
                nombre = '{$data["nombre"]}',
                apellido = '{$data["apellido"]}',
                telefono = '{$data["telefono"]}'
            where id = {$_SESSION["clienteid_edit"]}
        ");
    }

    public function destroy($id)
    {
        $this->db->query("delete from clientes where id = $id");
    }
}
