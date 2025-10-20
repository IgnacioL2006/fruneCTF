<?php

include('conex.php');

$title = $_POST['title'];
$body = $_POST['body'];
$author = $_POST['author'];

// Prepare the statement
$sql_insert = $conn->prepare("INSERT INTO news (title, body, author) VALUES (?, ?, ?)");

// Bind parameters
$sql_insert->bind_param("sss", $title, $body, $author);

// Execute
if ($sql_insert->execute()) {
    echo "News added successfully";
} else {
    echo "Error: " . $sql_insert->error;
}

// Close statement
$sql_insert->close();


?>