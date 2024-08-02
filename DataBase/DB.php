<?php
class Database
{
    private $host = 'localhost';
    private $port = 3310;
    private $username = 'root';
    private $password = '';
    private $database = 'login';
    private $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);


        if ($this->conn->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conn->connect_error);
        }
        
        $this->conn->set_charset("utf8");
    }

    public function getConnection(){
        return $this->conn;
    }
}
?>