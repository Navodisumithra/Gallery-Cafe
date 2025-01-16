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
    <link rel="stylesheet" href="assets/css/styles.css" />
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
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="assets/images/logo.png" alt="The Gallery Cafe Logo" />
        <span>The Gallery Cafe</span>
      </a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="pages/menu.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/pre-order.php">Pre Ordering</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/reservation.php">Table Reservation</a>
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
            <a class="nav-link btn btn-primary text-white" href="signin.html"
              >Sign In</a
            >
          </li>
        </ul>
      </div>
    </nav>

<body>
<section class="reservation container mt-5 pt-4">
    <div class="container mt-5">
        <h2> Table Reservation </h2>
       
        <form action="reservation.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="guests">Number of Guests</label>
                <input type="number" class="form-control" id="guests" name="guests" required>
            </div>
            <div class="form-group">
                <label for="special_requests">Special Requests</label>
                <textarea class="form-control" id="special_requests" name="special_requests"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Reserve</button>
        </form>
    </div>

    <?php
         // Database connection
        include '../assets/database_functions/database-connect.php';

       $sql = "SELECT * FROM reservations";
       $result = $conn->query($sql);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $guests = $_POST['guests'];
            $special_requests = $_POST['special_requests'];

           
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO reservations (name, email, phone, date, time, guests, special_requests) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssis", $name, $email, $phone, $date, $time, $guests, $special_requests);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Reservation successfully made!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
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
