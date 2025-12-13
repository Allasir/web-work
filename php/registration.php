<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check empty fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        $_SESSION['register_error'] = "Please fill in all fields!";
        header("Location: ../sign_up.php");
        exit;
    }

    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $_SESSION['register_error'] = "An account with this email already exists!";
        header("Location: ../sign_up.php");
        exit;
    }

    // Hash password and insert user
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $passwordHash);

    if ($stmt->execute()) {
        header("Location: ../log_in.php");
        exit;
    } else {
        $_SESSION['register_error'] = "Error: " . $stmt->error;
        header("Location: ../sign_up.php");
        exit;
    }
}
?>