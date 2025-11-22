<?php
    session_start();
    include("conex.php");

    header('Content-Type: application/json');

    // Read incoming JSON 
    $data = json_decode(file_get_contents('php://input'), true);

    $comment_id = intval($data['id'] ?? 0);
    $user_id    = intval($_SESSION['user_id'] ?? 0);

    // Basic validation
    if (!$comment_id || !$user_id) {
        echo json_encode(["status" => "error", "message" => "Invalid data"]);
        exit;
    }

    // Prepare and execute delete query 
    $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
    $stmt->bind_param("i", $comment_id);

    // Send JSON response 
    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }
