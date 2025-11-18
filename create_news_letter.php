<?php
session_start();
include('conex.php');

$title   = $_POST['title'];
$body    = $_POST['body'];
$user_id = $_POST['user_id'];

// Prepare the statement
$sql_insert = $conn->prepare("INSERT INTO news (title, body, user_id) VALUES (?, ?, ?)");

// Bind parameters
$sql_insert->bind_param("ssi", $title, $body, $user_id);

// Execute
if ($sql_insert->execute()) {
    header("Location: news.php"); 
    exit; 
} else {
    echo "Error: " . $sql_insert->error;
}

// Close statement
$sql_insert->close();
?>
