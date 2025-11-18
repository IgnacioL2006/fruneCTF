<?php
    session_start();
    include("conex.php");

    $comment_id  = $_POST['id'] ?? null;
    $new_content = trim($_POST['content'] ?? ""); // delete extra spaces

    if (!$comment_id || $new_content === "") {
        die("Datos inválidos");
    }

    // Update comment
    $update = $conn->prepare("UPDATE comments SET content = ?, updated_at = NOW() WHERE id = ?");
    $update->bind_param("si", $new_content, $comment_id);

    if ($update->execute()) {
        echo "ok";
    } else {
        echo "error: " . $update->error;
    }

    $update->close();
?>
