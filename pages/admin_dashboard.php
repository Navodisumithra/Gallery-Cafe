<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container mt-5">
        <h2>Manage Menu Items</h2>
        
        <form action="manage_menu.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="item_name">Item Name</label>
                <input type="text" id="item_name" name="item_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="item_cuisine">Cuisine</label>
                <input type="text" id="item_cuisine" name="item_cuisine" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="item_description">Description</label>
                <textarea id="item_description" name="item_description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="item_price">Price</label>
                <input type="number" step="0.01" id="item_price" name="item_price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="item_image">Image URL</label>
                <input type="text" id="item_image" name="item_image" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="item_category">Category</label>
                <select id="item_category" name="item_category" class="form-control" required>
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                </select>
            </div>
            <button type="submit" name="action" value="add" class="btn btn-primary">Add Item</button>
        </form>

        
        <h3 class="mt-5">Existing Menu Items</h3>
        <?php
        include '../assets/database_functions/database-connect.php';

        $result = $conn->query('SELECT * FROM food_items');
        if ($result->num_rows > 0) {
            echo '<ul class="list-group">';
            while ($row = $result->fetch_assoc()) {
                echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                echo $row['name'] . ' - $' . $row['price'];
                echo '<form action="manage_menu.php" method="post" class="mb-0">
                        <input type="hidden" name="item_id" value="' . $row['id'] . '">
                        <button type="submit" name="action" value="delete" class="btn btn-danger btn-sm">Delete</button>
                    </form>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No menu items found.</p>';
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
