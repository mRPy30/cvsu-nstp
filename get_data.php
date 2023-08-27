<?php
require_once "db_connect.php";

$query = "SELECT year, passing_rate FROM passing_rates";
$result = $conn->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conn->close();
?>
