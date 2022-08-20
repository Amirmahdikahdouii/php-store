<?php
require_once "../../settings/dbconfig.php";
include_once "./authenticateAdmin.php";

$JSONResponse = [
    "status" => 0,
];

// Get Product Id
$productId = intval($_GET['id']);
if ($productId <= 0) {
    $JSONResponse = json_encode($JSONResponse);
    echo $JSONResponse;
    die();
}

$sql = "SELECT * FROM `product` WHERE id='$productId'";
$result = mysqli_query($db_connection, $sql);
$result = mysqli_fetch_assoc($result);
$JSONResponse = [
    "status" => 1,
    "productId" => $result['id'],
    "productName" => $result['name'],
    "productPrice" => $result['price'],
    "productCount" => $result['count'],
    "productOff" => $result['have_price_with_off'],
    "productActive" => $result['is_active'],
];
$JSONResponse = json_encode($JSONResponse);
echo $JSONResponse;
