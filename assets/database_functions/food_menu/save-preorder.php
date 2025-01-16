<?php

include '../database-connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clientName = $_POST['clientName'];
    $orderTime = $_POST['orderTime'];
    $orderDate = $_POST['orderDate'];

    
    $totalPrice = 0;
    $items = [];

    foreach ($_POST['qty'] as $foodItemId => $quantity) {
        $quantity = intval($quantity);
        if ($quantity > 0) {
            $query = "SELECT name, price FROM food_items WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $foodItemId);
            $stmt->execute();
            $stmt->bind_result($name, $price);
            $stmt->fetch();
            $stmt->close();

            $totalPrice += $price * $quantity;
            $items[] = [
                'id' => $foodItemId,
                'name' => $name,
                'quantity' => $quantity,
                'price' => $price
            ];
        }
    }

    
    $itemsJson = json_encode($items);

    
    echo "<pre>";
    echo "Items JSON: " . htmlspecialchars($itemsJson);
    echo "</pre>";

    
    $query = "INSERT INTO pre_orders (client_name, order_time, order_date, total_price, items) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssd", $clientName, $orderTime, $orderDate, $totalPrice, $itemsJson);
    $stmt->execute();
    $stmt->close();

    echo "Pre-order saved successfully!";
}
?>

