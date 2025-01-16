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

    <!-- Menu Section -->
<section class="menu-section container mt-5 pt-4">
    <div class="row mb-4" id="food-nav">
        <div class="col-md-4">
            <input type="text" class="form-control search-bar" placeholder="Search food by name or cuisine">
        </div>
        <div class="col-md-8 text-md-right">
            <div class="btn-group filter-group">
                <button class="btn btn-outline-primary filter-btn active" data-filter="all">All</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="breakfast">Breakfast</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="lunch">Lunch</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="dinner">Dinner</button>
            </div>
        </div>
    </div>


    <div class="row" id="menu-items">
        <?php
include '../assets/database_functions/database-connect.php';

$sql = "SELECT * FROM food_items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $id = $row['id'];
        $name = $row['name'];
        $cuisine = $row['cuisine'];
        $description = $row['description'];
        $price = $row['price'];
        $image = $row['image'];
        $category = $row['category'];

        echo "
                <div class='col-md-4 mb-4 food-item' data-category='$category'>
                    <div class='card'>
                        <img src='../assets/images/$image' class='card-img-top' alt='$name'>
                        <div class='card-body'>
                            <h5 class='card-title food-name'>$name</h5>
                            <p class='card-text'>Cuisine: <span class='food-cuisine'>$cuisine</span></p>
                            <p class='card-text'>Description: <span class='food-description'>$description</span></p>
                            <p class='card-text'> <span class='food-price'>Rs.$price</span></p>
                            <form action='cart.php' method='post'>
                            <input type='checkbox' name='cart[]' value='$id'> Select
                            <button type='submit' class='btn btn-success mt-2'>Add to Cart</button>
                        </div>
                    </div>
                </div>
                ";
    }
} else {
    echo "<p>No food items found.</p>";
}

$conn->close();
?>
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
    <script src="../assets/js/gallery_menu.js"></script>
  </body>
</html>
