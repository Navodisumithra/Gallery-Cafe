<?php
require_once '../database-connect.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM food_items";
$result = $conn->query($sql);

$foodItems = array();
while ($row = $result->fetch_assoc()) {
    $foodItems[] = $row;
}

echo json_encode($foodItems);

$conn->close();
?>
