<?php
session_start();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_login'])) {
    header("Location: /php-store/Accounts/login.php");
}

// Set a header to a json response
header("Content-Type: application/json; charset=UTF-8");
