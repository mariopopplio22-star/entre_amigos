<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $userData = $this->user->findByUsername($username);

            if ($userData && password_verify($password, $userData['password_hash'])) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['username'] = $userData['username'];
                $_SESSION['role'] = $userData['nombre_rol'];
                $_SESSION['profile_picture'] = $userData['profile_picture'];

                header("Location: index.php?action=dashboard");
                exit();
            } else {
                $error = "Usuario o contraseña incorrectos.";
                include __DIR__ . '/../views/login.php';
            }
        } else {
            include __DIR__ . '/../views/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            if ($this->user->register($username, $password_hash)) {
                header("Location: index.php?action=login&registered=success");
                exit();
            } else {
                $error = "No se pudo registrar el usuario. El nombre ya podría estar en uso.";
                include __DIR__ . '/../views/register.php';
            }
        } else {
            include __DIR__ . '/../views/register.php';
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}
?>