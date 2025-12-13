<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check empty fields
    if (empty($email) || empty($password)) {
        $_SESSION['login_error'] = "Please fill in all fields!";
        header("Location: ../log_in.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT id, first_name, last_name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $first_name, $last_name, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            // Normal session login
            $_SESSION['user_id'] = $id;

            // Remember me cookie
            if (isset($_POST['remember_me'])) {
                // generate a secure random token
                $token = bin2hex(random_bytes(32));

                // store hashed token in DB
                $hashedToken = password_hash($token, PASSWORD_DEFAULT);

                $update = $conn->prepare("UPDATE users SET remember_token = ? WHERE id = ?");
                $update->bind_param("si", $hashedToken, $id);
                $update->execute();

                // set cookie (user_id:token)
                setcookie(
                    "remember_me",
                    $id . ':' . $token,
                    time() + (86400 * 30), // 30 days
                    "/",
                    "",
                    false,
                    true
                );
            } else {
                // remove cookie and clear DB token
                if (isset($_COOKIE['remember_me'])) {
                    setcookie("remember_me", "", time() - 3600, "/", "", false, true);
                }
                $update = $conn->prepare("UPDATE users SET remember_token = NULL WHERE id = ?");
                $update->bind_param("i", $id);
                $update->execute();
            }
            header("Location: ../table.php");
            exit;
        } else {
            $_SESSION['login_error'] = "Incorrect email or password";
            header("Location: ../log_in.php");
            exit;
        }

    } else {
        $_SESSION['login_error'] = "Incorrect email or password";
        header("Location: ../log_in.php");
        exit;
    }
}
?>