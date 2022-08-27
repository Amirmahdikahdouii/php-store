<?php
// Check to see User Is Authenticated Or Not
include_once "./authenticationCheck.php";
require_once "../../settings/dbconfig.php";

// TODO: Make This Page More Secure!;
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

if (
    !isset($_POST['name']) or
    !isset($_POST['familyName']) or
    !isset($_POST['birthday']) or
    !isset($_POST['phoneNumber'])
) {
    returnResponse("Error", "Form Is not valid!");
}

// Select User Data From DataBase
$sql = "SELECT * FROM `account` WHERE id='$userID'";
$userpastData = mysqli_query($db_connection, $sql);
$userpastData = mysqli_fetch_assoc($userpastData);
$userEmail = $userpastData['email'];

// GET form data;
$userName = $_POST['name'];
$userFamilyName = $_POST['familyName'];
$userBirthday = $_POST['birthday'];
$userPhoneNumber = $_POST['phoneNumber'];

// Change profile photo if user upload an image
if (isset($_FILES['profileImage'])) {
    $userProfile = $_FILES['profileImage'];
    if ($_FILES['profileImage']['type'] !== "image/jpg" && $_FILES['profileImage']['type'] !== "image/jpeg") {
        returnResponse("Error", "Image Is not valid! Image File Type Should be .jpg or .jpeg");
    }

    if (intval($userProfile['size']) > 5000000) {
        returnResponse("Error", "Image Size is too large! Maximum size is 4 Mg");
    }

    // Generate Profile Image Name
    $profileImageName = "$userEmail" . rand(1, 1000);
    $profileImageType = pathinfo($profileUserPath . $userProfile["name"], PATHINFO_EXTENSION);
    $profileImageName .= "." . $profileImageType;
    // Set Profile Upload Path
    include_once "../../media/user-profile-pictures/directoryPath.php";
    if (!move_uploaded_file($userProfile["tmp_name"], $profileUserPath . $profileImageName)) {
        returnResponse("Error", "File Doesnt Uploaded");
    } else if ($userpastData['profile_image'] !== "default.png") {
        // Delete user past profile!
        $userPastImage = $userpastData['profile_image'];
        unlink($profileUserPath . $userPastImage);
    }
} else {
    $profileImageName = $userpastData['profile_image'];
}

$sql = "UPDATE `account` SET `name`='$userName', family_name='$userFamilyName', phone_number='$userPhoneNumber', birthday='$userBirthday', profile_image='$profileImageName' WHERE id='$userID'";
$updateUserInfo = mysqli_query($db_connection, $sql);
if (!$updateUserInfo) {
    returnResponse("Error", "Update Data Failed!");
}
returnResponse("Successful!", "Your Profile Have been Updated!", 1);
