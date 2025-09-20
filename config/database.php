<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'resume_app';
    private $username = 'your_db_username'; // Change this
    private $password = 'your_db_password'; // Change this
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

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'resume_app');
define('DB_USER', 'your_db_username'); // Change this
define('DB_PASS', 'your_db_password'); // Change this
define('DB_PORT', '5432');

// Security configuration
define('SESSION_TIMEOUT', 3600); // 1 hour in seconds
define('BCRYPT_COST', 12);
?>