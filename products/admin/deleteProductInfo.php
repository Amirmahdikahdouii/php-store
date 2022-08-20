<?php
require_once "../../settings/dbconfig.php";

// Check if user is not Admin, redirect to login;
session_start();
if (!isset($_SESSION['user_admin'])) {
    header("Location ../../Accounts/login.php");
}

// Set a header to a JSON response
header("Content-Type: application/json; charset=UTF-8");

$JSONResponse = [
    "status" => 0,
];

$productID = $_POST['id'];
$sql = "DELETE FROM product WHERE id='$productID'";
$result = mysqli_query($db_connection, $sql);