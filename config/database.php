<?php
class Database {
    private string $host = "localhost";
    private string $db_name = "tp8";
    private string $username = "root";
    private string $password = "";

    public function connect(): mysqli {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        $conn->set_charset("utf8mb4");
        return $conn;
    }
}
