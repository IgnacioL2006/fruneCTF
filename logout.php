<?php
    // Conexiones necesarias
    include 'session_helper.php';
    logout(); // Llamar a la función logout() que finaliza la sesión del usuario
    header("Location: main.php"); // Redirigir al usuario a la página principal 
    exit; // Finalizar el script
?>
