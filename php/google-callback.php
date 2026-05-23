<?php
session_start();
require_once 'vendor/autoload.php';

// 1. Configure Google Client
$client = new Google_Client();
$client->setClientId('1097292719652-plk0lmgoscknjhd63ae79dv2r94c5d07.apps.googleusercontent.com');
$client->setClientSecret('');
$client->setRedirectUri('https://web-work.gamer.gd/php/google-callback.php');

// 2. Authenticate Code from Google
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // 3. Get Profile Data
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $email = $google_account_info->email;
    $name = $google_account_info->name;
    $google_id = $google_account_info->id;

    // 4. Connect to DB
    $conn = new mysqli("sql206.infinityfree.com", "if0_40667211", "", "if0_40667211_users_inf");

    // 5. Check if user exists
    $sql = "SELECT id FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id);
    if ($stmt->num_rows == 0) {
        // User does not exist
        $name_parts = explode(' ', $name);
        $first_name = $name_parts[0];
        $last_name = isset($name_parts[1]) ? implode(' ', array_slice($name_parts, 1)) : '';
        $stmt_insert = $conn->prepare("INSERT INTO users (first_name, last_name, email, google_id) VALUES (?, ?, ?, ?)");
        $stmt_insert->bind_param("ssss", $first_name, $last_name, $email, $google_id);
        $stmt_insert->execute();
        $user_id = $stmt_insert->insert_id;
    } 
    $stmt->fetch(); // for existing user, $user_id is set

    // 6. Set session and login
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;

    // 7. Create "remember me" cookie for Google login
    if (!empty($_SESSION['remember_google'])) {

        $token = bin2hex(random_bytes(32));
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);

        $stmt_update = $conn->prepare("UPDATE users SET remember_token=? WHERE id=?");
        $stmt_update->bind_param("si", $hashedToken, $user_id);
        $stmt_update->execute();

        setcookie(
            "remember_me",
            $user_id . ':' . $token,
            time() + (86400 * 30),
            "/",
            "",
            false,
            true
        );

        unset($_SESSION['remember_google']);

    } else {
        if (isset($_COOKIE['remember_me'])) {
            setcookie("remember_me", "", time() - 3600, "/", "", false, true);
        }
        $stmt_update = $conn->prepare("UPDATE users SET remember_token=NULL WHERE id=?");
        $stmt_update->bind_param("i", $user_id);
        $stmt_update->execute();
    }

    // Redirect to protected page
    header("Location: ../table.php");
    exit;
}
?>
