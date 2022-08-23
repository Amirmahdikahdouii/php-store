<?php
// Check to see User Is Authenticated Or Not
include_once "./authenticationCheck.php";
require_once "../../settings/dbconfig.php";

// TODO: Make This Page More Secure!;
$JSONResponse = ['status' => 0, "title" => "", "message" => ""];
$userID = intval($_SESSION['user_id']);

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

if (
    !isset($_POST['oldPassword']) or
    !isset($_POST['newPassword']) or
    !isset($_POST['confirmNewPassword'])
) {
    returnResponse("Error", "Form Data is not Valid");
}

// Get data from post Method
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$confirmNewPassword = $_POST['confirmNewPassword'];

// check old password is valid or not
$sql = "SELECT password FROM `account` WHERE id='$userID'";
$pastPassword = mysqli_query($db_connection, $sql);
$pastPassword = mysqli_fetch_assoc($pastPassword);
$pastPassword = $pastPassword['password'];
if ($pastPassword !== $oldPassword) {
    returnResponse("Warning", "Old password is not correct!");
}

// check new password and confirm new password
if ($newPassword === "") {
    returnResponse("Warning", "New password Should not be none!");
}
if ($newPassword !== $confirmNewPassword) {
    returnResponse("Warning", "New password and Confirm password are not the same!");
}

// Check old password and new password to not be the same
if ($newPassword === $oldPassword) {
    returnResponse("Warning", "New password and old password Cannot be same!");
}

$sql = "UPDATE account SET password='$newPassword' WHERE id='$userID'";
$setNewPasword = mysqli_query($db_connection, $sql);
if (!$setNewPasword) {
    returnResponse("Error", "New password Not Updated!");
}
returnResponse("Message", "Password Updated!", 1);
