<?php
    session_start();
    include('conex.php');

    $user_id        = $_POST['user_id'];    
    $comment        = trim($_POST['comment']); // trim to remove extra spaces
    $target_user_id = $_POST['target_user_id'];

    if ($comment === "") {
        die("Comentario vacío");
    }

    $sql = $conn->prepare("
        INSERT INTO comments (user_id, target_user_id, content)
        VALUES (?, ?, ?)
    ");
    
    $sql->bind_param("iis", $user_id, $target_user_id, $comment);

    if ($sql->execute()) {
        header("Location: user_viewer.php?user_id=" . $target_user_id);
        exit;
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
?>
