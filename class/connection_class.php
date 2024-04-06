<?php

class DBConnection {

    private $host;
    private $user;
    private $password;
    private $db;
    private $conn;

    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db = "company";

        // Crear conexión
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);

        // Verificar la conexión
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

?>
