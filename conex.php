<?php
$host = "mysql.inf.uct.cl";      // Servidor local de Laragon
$user = "iloncon";           // Usuario por defecto de Laragon
$pass = "yOOSDpUYdomxbs6bB";               // Contraseña vacía (por defecto)
$db   = "A2025_iloncon"; // Nombre de tu base de datos local

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
