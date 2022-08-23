<?php
// Check to see User Is Authenticated Or Not
include_once "./authenticationCheck.php";
require_once "../../settings/dbconfig.php";
// TODO: Make This Page More Secure!;


// productStatusChange=1    ===> Add Count to Product
// productStatusChange=2    ===> remove Count to Product
$JSONResponse = ['status' => 1, "title" => "", "messageText" => ""];
function returnResponse($title, $message, $status = 0)
{
    global $JSONResponse;
    $JSONResponse['status'] = $status;
    $JSONResponse['title'] = $title;
    $JSONResponse['messageText'] = $message;
    $JSONResponse = json_encode($JSONResponse);
    echo $JSONResponse;
    die();
}
$productID = intval($_POST['productId']);
$productStatusChange = intval($_POST['productStatusChange']);

$userID = intval($_SESSION['user_id']);

// Redirect User if Product ID is not valid
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
    returnResponse("Error", "Product Doesnt Exist in your cart!");
}

$productCountInUserCart = intval($userCartProduct['count']);
// Handle Max and Min count of product in user Cart
if (($productCountInUserCart === 1 && $productStatusChange === 2) or ($productCountInUserCart === 10 && $productStatusChange === 1)) {
    $JSONResponse['productCount'] = $productCountInUserCart;
    returnResponse("Warning", "Product Count Minimum is 1 and Maximum is 10!", 1);
}

if ($productStatusChange === 1) {
    $productCountInUserCart++;
} else if ($productStatusChange === 2) {
    $productCountInUserCart--;
}

$sql = "UPDATE `cart_products` SET count='$productCountInUserCart' WHERE product_id='$productID'";
$userCartProduct = mysqli_query($db_connection, $sql);
$JSONResponse['productCount'] = $productCountInUserCart;
returnResponse("Successful", "Product Count succesfully updated!", 1);
