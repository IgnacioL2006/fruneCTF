<?php
$host = "localhost";         // Servidor
$user = "root";         
$pass = "";              
$db   = "frune_ctf_database"; // Nombre de la base de datos

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
