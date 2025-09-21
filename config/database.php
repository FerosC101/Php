<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'resume_app';
    private $username = 'vince';
    private $password = '426999'; 
    private $port = '5432';
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

define('DB_HOST', 'localhost');
define('DB_NAME', 'resume_app');
define('DB_USER', 'vince'); 
define('DB_PASS', '426999'); 
define('DB_PORT', '5432');

define('SESSION_TIMEOUT', 3600);
define('BCRYPT_COST', 12);
?>