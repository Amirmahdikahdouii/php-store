<?php
// Set a header to a json response
header("Content-Type: application/json; charset=UTF-8");

require_once "../settings/dbconfig.php";

// DECODE Json DATA that have send into module
$formData = json_decode($_POST["formData"], true);


//Create a json Response
// statusCode is not mean HTTP status code, is a Contract in our project
$JSONResponse = ["statusCode" => 0, "title" => "", "responseMessage" => ""];

// Get Product Id
$productID = intval($formData["productID"]);
if ($productID <= 0) {
    $JSONResponse["statusCode"] = 0;
    $JSONResponse["title"] = "Product ID not valid";
    $JSONResponse["responseMessage"] = "Product ID not Valid, Please Try Again!";
    $JSONResponse = json_encode($JSONResponse);
    echo $JSONResponse;
    die();
}

// Get data from json variable and put that in some variable
$commentTitle = $formData["title"];
$commentMessage = $formData["message"];
$commentRate = intval($formData["rateMark"]);
$commentDate = date("Y/m/d");

// GET user_id from $_SESSION
session_start();
$userId = intval($_SESSION["user_id"]);
// SQL to connect to `account` table and get userName
$sql = "SELECT name FROM `account` WHERE id='$userId'";
$userName = mysqli_query($db_connection, $sql);
$userName = mysqli_fetch_assoc($userName);
$userName = $userName["name"];

// SQL To INSERT data into table
$sql = "INSERT INTO product_comment (user_id, userName, product_id, title, date, text, rateMark)
 VALUES ('$userId', '$userName', '$productID', '$commentTitle', '$commentDate', '$commentMessage', '$commentRate')";
$result = mysqli_query($db_connection, $sql);
if (!$result) {
    $JSONResponse["statusCode"] = 0;
    $JSONResponse["title"] = "Product ID not valid";
    $JSONResponse["responseMessage"] = "Product ID not Valid, Please Try Again!";
    $JSONResponse = json_encode($JSONResponse);
    echo $JSONResponse;
    die();
} else {
    $JSONResponse["statusCode"] = 1;
    $JSONResponse["title"] = "Comment Sent!";
    $JSONResponse["responseMessage"] = "Comment Have Been Send! Thank You";
    $JSONResponse = json_encode($JSONResponse);
    echo $JSONResponse;
    die();
}