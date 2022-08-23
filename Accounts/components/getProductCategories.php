<?php
// Check to see User Is Authenticated Or Not
include_once "./authenticationCheck.php";
require_once "../../settings/dbconfig.php";

// Check to see user is admin or not
if (!isset($_SESSION['user_admin'])) {
    header("Location: ../login.php");
}

// TODO: Make This Page More Secure!;
$userID = intval($_SESSION['user_id']);

$sql = "SELECT * FROM `product_subcategory`";
$productCategories = mysqli_query($db_connection, $sql);
$productCategories = mysqli_fetch_all($productCategories, MYSQLI_ASSOC);
$JSONResponse = [];
for ($i = 0; $i < count($productCategories); $i++) {
    $productCategory = $productCategories[$i];
    $data = ["id" => 0, "category_name" => ""];
    $data["id"] = $productCategory['id'];
    $data["category_name"] = $productCategory['name'];
    $JSONResponse[$i] = $data;
}
$JSONResponse = json_encode($JSONResponse);
echo $JSONResponse;
