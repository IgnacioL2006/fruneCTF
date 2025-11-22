<?php
    session_start();
    include("conex.php");

    header('Content-Type: application/json');

    // Read incoming JSON 
    $data = json_decode(file_get_contents('php://input'), true);

    $comment_id  = intval($data['id'] ?? 0);
    $new_content = trim($data['content'] ?? "");

    // Basic validation
    if (!$comment_id || $new_content === "") {
        echo json_encode(["status" => "error", "message" => "Invalid data"]);
        exit;
    }

    // Prepare and execute update query
    $stmt = $conn->prepare("UPDATE comments SET content = ?, updated_at = NOW() WHERE id = ?");
    $stmt->bind_param("si", $new_content, $comment_id);

    // Send JSON response
    if ($stmt->execute()) {
        echo json_encode(["status" => "ok"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
