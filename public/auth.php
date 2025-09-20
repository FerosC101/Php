<?php
require_once 'config/database.php';

class Auth {
    private $conn;
    private $database;

    public function __construct() {
        $this->database = new Database();
        $this->conn = $this->database->getConnection();
        
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login($username, $password) {
        try {
            $query = "SELECT id, username, email, password_hash FROM users WHERE username = :username OR email = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (password_verify($password, $row['password_hash'])) {
                    // Create session
                    $this->createSession($row['id'], $row['username'], $row['email']);
                    return true;
                }
            }
            return false;
        } catch(PDOException $exception) {
            error_log("Login error: " . $exception->getMessage());
            return false;
        }
    }

    private function createSession($user_id, $username, $email) {
        // Generate session token
        $session_token = bin2hex(random_bytes(32));
        $expires_at = date('Y-m-d H:i:s', time() + SESSION_TIMEOUT);

        try {
            // Store session in database
            $query = "INSERT INTO user_sessions (user_id, session_token, expires_at) VALUES (:user_id, :session_token, :expires_at)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':session_token', $session_token);
            $stmt->bindParam(':expires_at', $expires_at);
            $stmt->execute();

            // Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['session_token'] = $session_token;
            $_SESSION['logged_in'] = true;
            $_SESSION['login_time'] = time();

        } catch(PDOException $exception) {
            error_log("Session creation error: " . $exception->getMessage());
        }
    }

    public function isLoggedIn() {
        if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
            return false;
        }

        // Check session timeout
        if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > SESSION_TIMEOUT) {
            $this->logout();
            return false;
        }

        // Validate session token in database
        if (isset($_SESSION['session_token'])) {
            return $this->validateSessionToken($_SESSION['session_token']);
        }

        return false;
    }

    private function validateSessionToken($token) {
        try {
            $query = "SELECT us.*, u.username FROM user_sessions us 
                     JOIN users u ON us.user_id = u.id 
                     WHERE us.session_token = :token AND us.expires_at > NOW()";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            return $stmt->rowCount() == 1;
        } catch(PDOException $exception) {
            error_log("Session validation error: " . $exception->getMessage());
            return false;
        }
    }

    public function logout() {
        // Remove session from database
        if (isset($_SESSION['session_token'])) {
            try {
                $query = "DELETE FROM user_sessions WHERE session_token = :token";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':token', $_SESSION['session_token']);
                $stmt->execute();
            } catch(PDOException $exception) {
                error_log("Logout error: " . $exception->getMessage());
            }
        }

        // Destroy session
        session_destroy();
        session_start();
        session_regenerate_id(true);
    }

    public function requireLogin() {
        if (!$this->isLoggedIn()) {
            header("Location: login.php");
            exit();
        }
    }

    public function register($username, $email, $password) {
        try {
            // Check if user already exists
            $query = "SELECT id FROM users WHERE username = :username OR email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return ['success' => false, 'message' => 'Username or email already exists'];
            }

            // Hash password
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $query = "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password_hash)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password_hash', $password_hash);
            $stmt->execute();

            return ['success' => true, 'message' => 'User registered successfully'];

        } catch(PDOException $exception) {
            error_log("Registration error: " . $exception->getMessage());
            return ['success' => false, 'message' => 'Registration failed'];
        }
    }

    public function cleanExpiredSessions() {
        try {
            $query = "DELETE FROM user_sessions WHERE expires_at < NOW()";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        } catch(PDOException $exception) {
            error_log("Session cleanup error: " . $exception->getMessage());
        }
    }
}
?>