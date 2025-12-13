<?php
$host = "sql206.infinityfree.com";
$user = "if0_40667211"; 
$pass = "";
$db   = "if0_40667211_users_inf";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>