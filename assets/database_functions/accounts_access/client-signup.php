<?php
include '../database-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        $full_name = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        
        if ($password !== $confirm_password) {
            die("Passwords do not match.");
        }

        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $full_name, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "Sign Up successful!";
            header("Location: ../../../signin.html");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        die("Required fields are missing.");
    }
}

$conn->close();
?>
