<?php
include '../assets/database_functions/database-connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        
        $item_name = $_POST['item_name'];
        $item_cuisine = $_POST['item_cuisine'];
        $item_description = $_POST['item_description'];
        $item_price = $_POST['item_price'];
        $item_image = $_POST['item_image'];
        $item_category = $_POST['item_category'];

        
        if (!empty($item_name) && !empty($item_cuisine) && !empty($item_description) && !empty($item_price) && !empty($item_image) && !empty($item_category)) {
            
            $stmt = $conn->prepare('INSERT INTO food_items (name, cuisine, description, price, image, category) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->bind_param('ssssss', $item_name, $item_cuisine, $item_description, $item_price, $item_image, $item_category);

            if ($stmt->execute()) {
                echo '<p>Item added successfully!</p>';
            } else {
                echo '<p>Error: ' . $stmt->error . '</p>';
            }

            $stmt->close();
        } else {
            echo '<p>Please fill in all fields.</p>';
        }
    } elseif ($action === 'delete') {
        
        $item_id = $_POST['item_id'] ?? 0;

        
        if (filter_var($item_id, FILTER_VALIDATE_INT) && $item_id > 0) {
            
            $stmt = $conn->prepare('DELETE FROM food_items WHERE id = ?');
            $stmt->bind_param('i', $item_id);

            if ($stmt->execute()) {
                echo '<p>Item deleted successfully!</p>';
            } else {
                echo '<p>Error: ' . $stmt->error . '</p>';
            }

            $stmt->close();
        } else {
            echo '<p>Invalid item ID.</p>';
        }
    }

   
    header('Location: admin_dashboard.php');
    exit;
}


header('Location: admin_dashboard.php');
exit;
?>
