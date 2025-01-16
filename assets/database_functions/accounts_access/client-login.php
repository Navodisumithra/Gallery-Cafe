<?php
include '../database-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

       
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            
            if (password_verify($password, $hashed_password)) {
                echo "Sign In successful!";
                
                session_start();
                $_SESSION['user_id'] = $id;
                header("Location: ../../../index.html");
            } else {
                echo "Invalid password or Email.";
            }
        } else {
            echo "No account found with that email.";
        }

        $stmt->close();
    } else {
        die("Required fields are missing.");
    }
}

$conn->close();
?>
