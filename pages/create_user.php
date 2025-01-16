<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header('Location: signin.html');
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'gallery_cafe');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (strlen($password) < 6) {
        $error_message = 'Password must be at least 6 characters long.';
    } else {
        $stmt = $conn->prepare('INSERT INTO users (email, password, role) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $email, $password, $role);
        $stmt->execute();
        $stmt->close();

        header('<Location:pages>admin_dashboard.php');
    }
}

$conn->close();
?>
