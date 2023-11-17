<?php
class Model
{
    private $db;
    protected $table;

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
        $res = $this->db->query("select * from {$this->table}");
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
        $res = $this->db->query("select * from {$this->table} where id = $id");
        $data = $res->fetch_assoc();

        return $data;
    }

    public function create($data)
    {
        try {
            // Esto hace que sin importar los pares de clave y valor de la variable $data, el $query sea reutilizable.
            $keys = array_keys($data);
            $keysString = implode(", ", $keys);

            $values = array_values($data);
            $valuesString = implode("', '", $values);
            $query = "insert into {$this->table}($keysString) values ('$valuesString')";

            $res = $this->db->query($query);

            if ($res) {
                $ultimoId = $this->db->insert_id;
                $data = $this->find($ultimoId);

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
        // Esto hace que sin importar los pares de clave y valor de la variable $data, el $query sea reutilizable.
        $updatePairs = [];

        foreach ($data as $key => $value) {
            $updatePairs[] = "$key = '$value'";
        }

        session_start();
        $query = "update {$this->table} set " . implode(", ", $updatePairs) . "where id = {$_SESSION["clienteid_edit"]}";
        $this->db->query($query);
    }

    public function destroy($id)
    {
        $this->db->query("delete from {$this->table} where id = $id");
    }
}
