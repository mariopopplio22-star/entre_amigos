<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Entre Amigos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <!-- FontAwesome para el ícono del ojito -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body class="neon-login-body">

    <!-- Video de Fondo en Bucle (puedes cambiar la ruta de tu video mp4 en src) -->
    <!-- Video de Fondo en Bucle con atributos forzados -->
<!-- Video de Fondo en Bucle -->
<video autoplay muted loop playsinline class="video-background" id="bg-video">
    <source src="public/media/leaves_purple.mp4" type="video/mp4">
    Tu navegador no soporta videos HTML5.
</video>
<div class="video-overlay"></div>

    <!-- Música de fondo en bucle -->
    <div class="audio-player-container">
        <span>🎵 Ambiente Místico</span>
        <audio controls loop autoplay>
            <source src="public/media/background_music.mp3" type="audio/mp3">
            Tu navegador no soporta audio.
        </audio>
    </div>

    <div class="container">
        <div class="columns is-centered">
            <div class="column is-4">
                <form action="index.php?action=login" method="POST" class="neon-card">
                    <h3 class="title is-3 has-text-centered neon-title">ENTRE AMIGOS</h3>
                    <p class="has-text-centered mb-5" style="color: #b192ff; font-size: 0.9rem;">Portal de la Comunidad</p>
                    
                    <?php if(isset($error)): ?>
                        <div class="notification is-danger is-light" style="background-color: rgba(90, 20, 20, 0.8); color: #ffb3b3; border: 1px solid #ff4d4d;"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <div class="field">
                        <label class="label neon-label">Nombre de usuario</label>
                        <div class="control">
                            <input class="input neon-input" type="text" name="username" required autocomplete="off">
                        </div>
                    </div>

                    <div class="field mb-5">
                        <label class="label neon-label">Contraseña</label>
                        <div class="control password-container">
                            <input class="input neon-input" type="password" name="password" id="login-password" required>
                            <button type="button" class="toggle-password" onclick="togglePassword('login-password', 'eye-icon-login')">
                                <i id="eye-icon-login" class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="field">
                        <button type="submit" class="button neon-button is-fullwidth">ACCEDER</button>
                    </div>
                    
                    <p class="has-text-centered mt-4" style="font-size: 0.9rem;">
                        ¿No tienes cuenta? <a href="index.php?action=register" class="neon-link">Regístrate aquí</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Script JavaScript para ver/ocultar contraseña -->
    <script>
        function togglePassword(fieldId, iconId) {
            const passwordField = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(iconId);
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const video = document.getElementById("bg-video");
        if (video) {
            video.play().catch(error => {
                console.log("Reproducción automática prevenida por el navegador:", error);
            });
        }
    });
</script>
</body>
</html>