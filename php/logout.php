<?php
session_start();
include 'config.php';

// Remove the session
session_unset();
session_destroy();

// Remove the cookie (expire it)
if (isset($_COOKIE['remember_me'])) {
    // Optional: remove token from DB
    list($user_id, $token) = explode(':', $_COOKIE['remember_me']);
    $stmt = $conn->prepare("UPDATE users SET remember_token = NULL WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    // Expire cookie in browser
    setcookie("remember_me", "", time() - 3600, "/", "", false, true);
}

// Redirect to login or homepage
header("Location: ../index.php");
exit;
?>