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

// Check variable is Exist in form or not
if (
    !isset($_POST["name"]) or
    !isset($_POST["count"]) or
    !isset($_POST["categoryId"]) or
    !isset($_POST["price"])
) {
    returnResponse("Error", "Form Data is not Valid");
}

// Check image is exists or not
if (!isset($_FILES['Image'])) {
    returnResponse("Error", "Image Should be send!");
}

// Check Category ID
$productCategoryId = intval($_POST['categoryId']);
if ($productCategoryId <= 0) {
    returnResponse("Error", "Image Should be send!");
} else {
    $sql = "SELECT * FROM product_subcategory WHERE id='$productCategoryId'";
    $categoryProduct = mysqli_query($db_connection, $sql);
    $categoryProduct = mysqli_fetch_assoc($categoryProduct);
    if ($categoryProduct === null) {
        returnResponse("Error", "Category ID is not Valid!");
    }
}

// Get The Product Name
$productName = $_POST['name'];

// This Variable set the product active or deactive
$productActiveStatus = 1;

// Check The Product Count
$productCount = intval($_POST['count']);
if ($productCount < 0) {
    returnResponse("Warning", "Count is not valid!");
} else if ($productCount === 0) {
    $productActiveStatus = 0;
}

// Check The Product Price
$productPrice = floatval($_POST['price']);
if ($productPrice <= 0) {
    returnResponse("Warning", "Price is not Valid!");
}

$productImage = $_FILES['Image'];
if (strtolower($productImage['type']) !== "image/jpg" and strtolower($productImage['type']) !== "image/jpeg") {
    returnResponse("Error", "Image Is not valid! Image File Type Should be .jpg or .jpeg");
}
if (intval($productImage['size']) > 5000000) {
    returnResponse("Error", "Image Size is too large! Maximum size is 5 Mg");
}

// get The Directory Path
include_once "../../media/directoryPath.php";

// Generate Image Name
$productImageName = str_replace(" ", "-", $productName) . rand(1, 1000);
$profileImageType = pathinfo($mediaRootPath . "/product-image/" . $productImage["name"], PATHINFO_EXTENSION);
$productImageName .= "." . $profileImageType;
if (!move_uploaded_file($productImage['tmp_name'], $mediaRootPath . "/product-image/" . $productImageName)) {
    returnResponse("Error", "File Doesnt Uploaded");
}
$sql = "INSERT INTO `product`
(category_id, name, count, price, image, is_active) VALUES 
('$productCategoryId', '$productName', '$productCount', '$productPrice', '$productImageName', '$productActiveStatus')";
$newProduct = mysqli_query($db_connection, $sql);
if (!$newProduct) {
    returnResponse("Warning", "Uplaod Product failes");
}
returnResponse("Message", "Uplaod Product Done!", 1);
