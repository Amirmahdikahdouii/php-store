<?php
// Check if user is not Admin, redirect to login;
session_start();
if (!isset($_SESSION['user_admin'])) {
    header("Location ../../Accounts/login.php");
}

// Set a header to a JSON response
header("Content-Type: application/json; charset=UTF-8");