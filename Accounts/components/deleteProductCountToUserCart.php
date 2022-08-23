<?php
// Check to see User Is Authenticated Or Not
include_once "./authenticationCheck.php";
require_once "../../settings/dbconfig.php";
// TODO: Make This Page More Secure!;

$JSONResponse = ['status' => 1];
$userID = intval($_SESSION['user_id']);
$productID = intval($_POST['productId']);
if ($productID <= 0) {
    header("Location: /php-store/index.php");
    die();
}

// Select User Cart;
$sql = "SELECT * FROM `cart` WHERE user_id='$userID'";
$userCart = mysqli_query($db_connection, $sql);
$userCart = mysqli_fetch_assoc($userCart);
$userCartID = intval($userCart['id']);

// Select User Cart products
$sql = "SELECT * FROM `cart_products` WHERE cart_id='$userCartID' AND product_id='$productID'";
$userCartProduct = mysqli_query($db_connection, $sql);
$userCartProduct = mysqli_fetch_assoc($userCartProduct);
if ($userCartProduct === null) {
    $JSONResponse['status'] = 0;
    $JSONResponse = json_encode($JSONResponse);
    echo $JSONResponse;
    die();
}
$userCartProductID = intval($userCartProduct['id']);
// DELETE user product in his cart
$sql = "DELETE FROM `cart_products` WHERE id='$userCartProductID'";
$userCartProduct = mysqli_query($db_connection, $sql);
$JSONResponse = json_encode($JSONResponse);
echo $JSONResponse;
