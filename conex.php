<?php
$host = "localhost";         // Servidor
$user = "ltrillat";         
$pass = "Stormblessed";              
$db   = "A2025_ltrillat"; // Nombre de la base de datos

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
