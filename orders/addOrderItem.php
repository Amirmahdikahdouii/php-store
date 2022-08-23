<?php
// This Module Add an order For User and order_item for every product in user cart
// And Return a JSON Response

require_once "../settings/dbconfig.php";

session_start();
// redirect To login if user is not Logined
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_login'])) {
    header("Location: /php-store/Accounts/login.php");
}

// Set a header to a json response
header("Content-Type: application/json; charset=UTF-8");
// Response Array
$JSONResponse = ['status' => 0, "title" => "", "message" => ""];
function returnResponse($title, $message, $status = 0)
{
    global $JSONResponse;
    $JSONResponse['status'] = $status;
    $JSONResponse['title'] = $title;
    $JSONResponse['message'] = $message;
    $JSONResponse = json_encode($JSONResponse);
    echo $JSONResponse;
    die();
}

$userID = intval($_SESSION['user_id']);
// Select User cart Id
$sql = "SELECT * FROM `cart` WHERE user_id='$userID'";
$cartID = mysqli_query($db_connection, $sql);
$cartID = mysqli_fetch_assoc($cartID);
if (!$cartID) {
    $returnResponse("Warning", "User Doesnt have any cart!");
}
$cartID = intval($cartID['id']);

// Check if form is valid or not
if (
    !isset($_POST['userID']) or
    !isset($_POST['cartID'])
) {
    returnResponse("ERROR", "Form is not valid");
}

// check form data
if (intval($_POST['userID']) !== $userID) {
    returnResponse("ERROR", "Form is not valid");
}
if (intval($_POST['cartID']) !== $cartID) {
    returnResponse("ERROR", "Form is not valid");
}

// get User product in cart

$sql = "SELECT * FROM `cart_products` WHERE cart_id='$cartID'";
$cartProducts = mysqli_query($db_connection, $sql);
$cartProducts = mysqli_fetch_all($cartProducts, MYSQLI_ASSOC);
if (count($cartProducts) === 0) {
    returnResponse("ERROR", "You Dont have Any Product in your cart");
}

// SELECT LAST order for getting id and generate new ID for new order
$sql = "SELECT * FROM `user_orders` ORDER BY id DESC LIMIT 1";
$lastOrderId = mysqli_query($db_connection, $sql);
$lastOrderId = mysqli_fetch_assoc($lastOrderId);
$lastOrderId = intval($lastOrderId['id']);
$userOrderID = $lastOrderId + 1;

// Make New Order For User
$sql = "INSERT INTO `user_orders` (id, user_id) VALUES ('$userOrderID', '$userID')";
$userOrder = mysqli_query($db_connection, $sql);

for ($productIndex = 0; $productIndex < count($cartProducts); $productIndex++) {
    // Cart_product Id, Id related to feild!
    $cartItemID = intval($cartProducts[$productIndex]['id']);

    // Product Id
    $cartProductID = intval($cartProducts[$productIndex]['product_id']);
    $cartProductCount = intval($cartProducts[$productIndex]['count']);
    // SELECT product for getting price and use in future
    $sql = "SELECT * FROM `product` WHERE id='$cartProductID' AND is_active='1'";
    $cartProductItem = mysqli_query($db_connection, $sql);
    $cartProductItem = mysqli_fetch_assoc($cartProductItem);
    if ($cartProductItem === null) {
        returnResponse("ERROR", "Product Not found");
    }

    // is_active variable status holder
    $productActiveStatus = 1;

    // Get Product Price
    if (intval($cartProductItem['have_price_with_off'])) {
        $cartProductItemID = intval($cartProductItem["id"]);
        $sql = "SELECT * FROM product_with_off_prices WHERE product_id='$cartProductItemID' AND is_active='1'";
        $cartProductUnitPrice = mysqli_query($db_connection, $sql);
        $cartProductUnitPrice = mysqli_fetch_assoc($cartProductUnitPrice);
        if (!$cartProductUnitPrice) {
            // Select Product Main Price From `product` table if price with off have been not active
            $cartProductUnitPrice = $cartProductItem['price'];
        } else {
            // Select New Price "With Off" from That Table
            $cartProductUnitPrice = floatval($cartProductUnitPrice['new_price']);
        }
    } else {
        // Select Product Main Price From `product` table
        $cartProductUnitPrice = $cartProductItem['price'];
    }

    // Check to minus count Of product in database
    $cartProductItemCount = $cartProductItem['count'];
    $cartProductItemCount -= $cartProductCount;
    if ($cartProductItemCount < 0) {
        returnResponse("ERROR", "Count Of Product Selected is not in our Store");
    } else if ($cartProductItemCount === 0) {
        $productActiveStatus = 0;
    }

    // Update Product Count and is active status
    $sql = "UPDATE `product` SET count='$cartProductItemCount', is_active='$productActiveStatus' WHERE id='$cartProductID'";
    $updateProductFeild = mysqli_query($db_connection, $sql);

    $sql = "INSERT INTO `user_orders_item` 
    (order_id, product_id, count, unit_price) 
    VALUES ('$userOrderID', '$cartProductID', '$cartProductCount', '$cartProductUnitPrice')";
    $newOrderItem = mysqli_query($db_connection, $sql);

    // Clear User Cart product
    $sql = "DELETE FROM `cart_products` WHERE cart_id='$cartID' AND  id='$cartItemID'";
    $deleteCartProductItem = mysqli_query($db_connection, $sql);
}
returnResponse("Successful", "Your Order Submited!", 1);
