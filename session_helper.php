<?php
    // Iniciar sesión si no está iniciada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        // PHP_SESSION_NONE - Las sesiones están habilitadas, pero no se ha iniciado ninguna.
    }

    // Función para verificar si el usuario está logueado
    function is_logged_in() {
        return isset($_SESSION['user_id']);
    }

    // Función para cerrar la sesión actual
    function logout() {
        session_start();       // Asegurarse que la sesión esté iniciada
        $_SESSION = [];        // Eliminar todas las variables de sesión
        session_destroy();     // Terminar la sesión
    }
?>