<?php
session_start();
// Get Product Id From Query String
if (
isset($_GET["product_id"])
) {
    $productId = intval($_GET["product_id"]);
} else {
    $productId = 0;
}
try {
    if ($productId === 0) {
        throw new Exception("Product Id Is not Valid");
    }
} catch (Exception $ex) {
    die($ex->getMessage());
}
// Check If User Is Authenticated, Add Product To Cart
if (
    isset($_SESSION["user_login"]) &&
    isset($_SESSION["user_id"])
) {
    require_once "../settings/dbconfig.php";
    $userID = intval($_SESSION["user_id"]);
    // Get User Cart From Database
    try {
        $sql = "SELECT * FROM cart WHERE user_id=$userID";
        $result = mysqli_query($db_connection, $sql);
        $result = mysqli_fetch_assoc($result);
        if (!$result) {
            // Raise New Exception when User Doesnt have Cart
            throw new Exception("User Doesnt have any Cart in Database");
        }
    } catch (Exception $ex) {
        // Add New Cart For User in cart
        $sql = "INSERT INTO `cart` (`id`, `user_id`) VALUES (NULL, '$userID');";
        $result = mysqli_query($db_connection, $sql);
        $result = mysqli_fetch_assoc($result);
    }
    // Get The User Cart Id
    $userCartId = $result["id"];
    try {
        // Trying to get Field of Specified User and Product, Because If USer Have Already Product In His Cart, Add Count of that
        $sql = "SELECT * FROM `cart_products` WHERE product_id='$productId' AND cart_id='$userCartId';";
        $result = mysqli_query($db_connection, $sql);
        $result = mysqli_fetch_assoc($result);
        if (!$result) {
            // Raise Exception to Make new Field For Product In user cart
            throw new Exception("Product Is Not in the User Cart");
        }
        $productCount = intval($result["count"]) + 1;
        // Maximum Count of buying product handle
        if ($productCount > 10) {
            die("Maximum of Product Count For Buy!");
        }
        // Update Product In User Cart
        $productCartId = $result["id"];
        // Check If productCount is more than stock, Die The Program and show message
        $sql = "SELECT * FROM `product` WHERE id='$productId'";
        $result = mysqli_query($db_connection, $sql);
        $result = mysqli_fetch_assoc($result);
        if ($productCount > intval($result["count"])) {
            die("Maximum Count Of Our Stock");
        }
        $sql = "UPDATE `cart_products` SET count='$productCount' WHERE id='$productCartId'";
        $result = mysqli_query($db_connection, $sql);
    } catch (Exception $ex) {
        // Raise Exception If User Have Not Product In His cart_product And Add New Field With Count 1
        $sql = "INSERT INTO `cart_products` (`id`, `product_id`, `cart_id`, `count`) VALUES (NULL, '$productId', '$userCartId', '1')";
        $result = mysqli_query($db_connection, $sql);
    }
}
