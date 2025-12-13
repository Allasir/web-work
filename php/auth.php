<?php
session_start();
include 'config.php';

// Only rebuild session from cookie
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_me'])) {
    list($user_id, $token) = explode(':', $_COOKIE['remember_me']);
    $stmt = $conn->prepare("SELECT remember_token FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($hashedToken);
    $stmt->fetch();

    if ($hashedToken && password_verify($token, $hashedToken)) {
        $_SESSION['user_id'] = $user_id;
    }
}
?>