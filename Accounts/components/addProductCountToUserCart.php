<?php
// Check to see User Is Authenticated Or Not
include_once "./authenticationCheck.php";
require_once "../../settings/dbconfig.php";
// TODO: Make This Page More Secure!;


// productStatusChange=1    ===> Add Count to Product
// productStatusChange=2    ===> remove Count to Product
$JSONResponse = ['status' => 1, 'productCount' => $productCountInUserCart];

$productID = intval($_POST['productId']);
$productStatusChange = intval($_POST['productStatusChange']);

$userID = intval($_SESSION['user_id']);
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
$productCountInUserCart = intval($userCartProduct['count']);
if ($productStatusChange === 1) {
    $productCountInUserCart++;
} else if ($productStatusChange === 2) {
    $productCountInUserCart--;
}
$sql = "UPDATE `cart_products` SET count='$productCountInUserCart' WHERE product_id='$productID'";
$userCartProduct = mysqli_query($db_connection, $sql);
$JSONResponse = json_encode($JSONResponse);
echo $JSONResponse;
