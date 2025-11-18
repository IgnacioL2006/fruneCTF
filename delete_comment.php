<?php
    session_start();
    include("conex.php");

    $logged_id  = intval($_SESSION['user_id']);
    $comment_id = intval($_POST['id']);

    // Delete comment
    $delete_sql = "DELETE FROM comments WHERE id = ?";
    $delete_res = $conn->prepare($delete_sql);
    $delete_res->bind_param("i", $comment_id);

    if ($delete_res->execute()) {
        echo "Comentario eliminado correctamente.";
    } else {
        echo "Error deleting comment: ". $delete_res->error;
    }
?>
