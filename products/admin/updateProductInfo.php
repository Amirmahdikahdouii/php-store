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

$productInfo = $_POST['productData'];
$productInfo = json_decode($productInfo, true);
$productID = intval($productInfo['productId']);
$productName = $productInfo['productName'];
$productPrice = floatval($productInfo['productPrice']);
$productCount = intval($productInfo['productCount']);
$productOff = intval($productInfo['productOff']);
$productActive = intval($productInfo['productActive']);
$sql = "UPDATE product SET name='$productName', price='$productPrice', count='$productCount', have_price_with_off='$productOff', is_active='$productActive' WHERE id='$productID'";
$result = mysqli_query($db_connection, $sql);

// TODO: RESPONSE A JSON TO Request
// $JSONResponse["status"] = 1;
// $JSONResponse = json_encode($JSONResponse);
// echo $JSONResponse;
