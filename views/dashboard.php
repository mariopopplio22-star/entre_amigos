<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?action=login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Entre Amigos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="#"><b>Entre Amigos</b></a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <span>Hola, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b> [<?php echo htmlspecialchars($_SESSION['role']); ?>]</span>
                <a href="index.php?action=logout" class="button is-danger is-small ml-3">Cerrar Sesión</a>
            </div>
        </div>
    </nav>
    <section class="section">
        <div class="container">
            <h1 class="title">Bienvenido a la web de Entre amigos</h1>
            <p>Espera a la siguiente actualización</p>
        </div>
    </section>
</body>
</html>