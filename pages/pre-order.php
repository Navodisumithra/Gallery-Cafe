<?php
include '../assets/database_functions/database-connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Gallery Cafe</title>

    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/css/styles.css" />
  </head>
  <body>
    <!-- Upper Navigation Bar -->
    <div class="bg-light py-2 fixed-top upper-nav">
      <div class="container d-flex justify-content-between">
        <div class="d-flex">
          <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
          <a href="#" class="me-3"><i class="bi bi-twitter"></i> </a>
          <a href="#"><i class="bi bi-instagram"></i></a>
        </div>
        <div class="d-flex">
          <a href="#" class="me-3"><i class="bi bi-cart"></i></a>
          <a href="#"><i class="bi bi-search"></i> Search</a>
        </div>
      </div>
    </div>

    <!-- Lower Navigation Bar -->
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-light fixed-top lower-nav"
    >
      <a class="navbar-brand d-flex align-items-center" href="../index.html">
        <img src="../assets/images/logo.png" alt="The Gallery Cafe Logo" />
        <span>The Gallery Cafe</span>
      </a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/pre-order.php">Pre Ordering</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="promotions.html">Table Reservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.html">Parking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-primary text-white" href="../signin.html"
              >Sign In</a
            >
          </li>
        </ul>
      </div>
    </nav>


    <!-- Pre-Ordering Section -->
<section class="pre-ordering py-5">
    <div class="container">
        <h2 class="mb-4">Pre-Order Your Meal</h2>
        <form id="pre-order-form" action="../assets/database_functions/food_menu/save-preorder.php" method="post">
            <div class="form-group">
                <label for="client-name">Client Name</label>
                <input type="text" id="client-name" name="clientName" placeholder="Client Name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="order-time">Order Need Time</label>
                <input type="time" id="order-time" name="orderTime" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="order-date">Order Need Date</label>
                <input type="date" id="order-date" name="orderDate" class="form-control" required>
            </div>

            <h3 class="mt-4">Select Your Items</h3>

            <!-- Breakfast -->
            <div class="category-section" id="breakfast">
                <h4>Breakfast</h4>
                <?php
$query = "SELECT * FROM food_items WHERE category = 'breakfast'";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    echo '<div class="food-item">';
    echo '<img src="../assets/images/' . $row['image'] . '" alt="' . $row['name'] . '" class="food-img">';
    echo '<div class="food-details">';
    echo '<h5>' . $row['name'] . '</h5>';
    echo '<p>' . $row['cuisine'] . '</p>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<p>Price: Rs.' . $row['price'] . '</p>';
    echo '<label>Quantity: <input type="number" name="qty[' . $row['id'] . ']" value="0" min="0" class="item-quantity"></label>';
    echo '</div>';
    echo '</div>';
}
?>
            </div>

            <!-- Lunch -->
            <div class="category-section" id="lunch">
                <h4>Lunch</h4>
                <?php
$query = "SELECT * FROM food_items WHERE category = 'lunch'";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    echo '<div class="food-item">';
    echo '<img src="../assets/images/' . $row['image'] . '" alt="' . $row['name'] . '" class="food-img">';
    echo '<div class="food-details">';
    echo '<h5>' . $row['name'] . '</h5>';
    echo '<p>' . $row['cuisine'] . '</p>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<p>Price: Rs.' . $row['price'] . '</p>';
    echo '<label>Quantity: <input type="number" name="qty[' . $row['id'] . ']" value="0" min="0" class="item-quantity"></label>';
    echo '</div>';
    echo '</div>';
}
?>
            </div>

            <!-- Dinner -->
            <div class="category-section" id="dinner">
                <h4>Dinner</h4>
                <?php
$query = "SELECT * FROM food_items WHERE category = 'dinner'";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    echo '<div class="food-item">';
    echo '<img src="../assets/images/' . $row['image'] . '" alt="' . $row['name'] . '" class="food-img">';
    echo '<div class="food-details">';
    echo '<h5>' . $row['name'] . '</h5>';
    echo '<p>' . $row['cuisine'] . '</p>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<p>Price: Rs.' . $row['price'] . '</p>';
    echo '<label>Quantity: <input type="number" name="qty[' . $row['id'] . ']" value="0" min="0" class="item-quantity"></label>';
    echo '</div>';
    echo '</div>';
}
?>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Save Pre-Order</button>
        </form>
    </div>
</section>




    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h5>Company</h5>
            <p><a href="about.html" class="text-white">About Us</a></p>
            <p><a href="contact.html" class="text-white">Contact Us</a></p>
            <p><a href="../pages/pre-order.php" class="text-white">Reservation</a></p>
          </div>
          <div class="col-md-3">
            <h5>Contact</h5>
            <p><i class="bi bi-geo-alt"></i> 123 Street, Colombo, Sri Lanka</p>
            <p><i class="bi bi-telephone"></i> +012 345 67890</p>
            <p><i class="bi bi-envelope"></i> info@example.com</p>
            <p>
              <a href="#" class="text-white me-2"
                ><i class="bi bi-instagram"></i
              ></a>
              <a href="#" class="text-white me-2"
                ><i class="bi bi-twitter"></i
              ></a>
              <a href="#" class="text-white me-2"
                ><i class="bi bi-youtube"></i
              ></a>
              <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
            </p>
          </div>
          <div class="col-md-3">
            <h5>Opening</h5>
            <p>Monday - Saturday</p>
            <p>09AM - 09PM</p>
            <p>Sunday</p>
            <p>10AM - 08PM</p>
          </div>
          <div class="col-md-3">
            <h5>Newsletter</h5>
            <p>Enter Your Email</p>
            <input type="email" class="form-control" placeholder="Your email" />
          </div>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>