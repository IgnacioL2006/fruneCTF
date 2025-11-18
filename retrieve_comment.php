<?php
include('conex.php');
header('Content-Type: application/json');

$user_id = intval($_GET['user_id']);

$sql_query = "
    SELECT 
        comments.id,
        comments.user_id,
        comments.content,
        comments.created_at,
        comments.updated_at,
        users.webname,
        users.photo_url
    FROM comments
    INNER JOIN users ON comments.user_id = users.id
    WHERE comments.target_user_id = $user_id
    ORDER BY comments.created_at DESC
";

$result = mysqli_query($conn, $sql_query);

if (!$result) {
    echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    exit;
}

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

echo json_encode($rows);
