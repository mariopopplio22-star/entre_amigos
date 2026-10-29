<?php
class User {
    private $conn;
    private $table_name = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Buscar usuario por nombre de usuario (incluyendo su rol)
    public function findByUsername($username) {
        $query = "SELECT u.*, r.nombre_rol FROM " . $this->table_name . " u 
                  INNER JOIN roles r ON u.role_id = r.id 
                  WHERE u.username = :username LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Registrar un nuevo usuario (Por defecto se asigna el rango más bajo ID 1: Estudiantes de Hexside)
    public function register($username, $password_hash) {
        $query = "INSERT INTO " . $this->table_name . " (username, password_hash, role_id) VALUES (:username, :password_hash, 1)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password_hash", $password_hash);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>