<?php
$host = "localhost";      // Servidor local de Laragon
$user = "root";           // Usuario por defecto de Laragon
$pass = "";               // Contraseña vacía (por defecto)
$db   = "frune_ctf_database"; // Nombre de tu base de datos local

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
