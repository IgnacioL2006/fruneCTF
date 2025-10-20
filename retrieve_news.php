<?php

include('conex.php');

$sql_query = "SELECT * FROM news";
$table_result = mysqli_query($conn, $sql_query);

$rows = [];

while ($row = mysqli_fetch_row($table_result))
{
    $rows[] = $row;
}

echo json_encode($rows);

?>