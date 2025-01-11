<?php
class Config {
    private $host = "localhost";
    private $db_name = "dggarage"; // Ganti dengan nama database yang benar
    private $username = "root"; // Ganti dengan username yang benar
    private $password = ""; // Ganti dengan password yang benar
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
