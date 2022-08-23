<?php
// Check to see User Is Authenticated Or Not
include_once "./authenticationCheck.php";
require_once "../../settings/dbconfig.php";

// TODO: Make This Page More Secure!;
$JSONResponse = ['status' => 0, "title" => "", "message" => ""];
$userID = intval($_SESSION['user_id']);

if (
    !isset($_POST['name']) or
    !isset($_POST['familyName']) or
    !isset($_POST['birthday']) or
    !isset($_POST['phoneNumber'])
) {
    $JSONResponse['title'] = "Error";
    $JSONResponse['message'] = "Form Is not valid!";
    $JSONResponse = json_encode($JSONResponse);
    echo $JSONResponse;
    die();
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
        $JSONResponse['title'] = "Error";
        $JSONResponse['message'] = "Image Is not valid! Image File Type Should be .jpg or .jpeg";
        $JSONResponse = json_encode($JSONResponse);
        echo $JSONResponse;
        die();
    }

    if (intval($userProfile['size']) > 5000000) {
        $JSONResponse['title'] = "Error";
        $JSONResponse['message'] = "Image Size is too large! Maximum size is 4 Mg";
        $JSONResponse = json_encode($JSONResponse);
        echo $JSONResponse;
        die();
    }

    // Generate Profile Image Name
    $profileImageName = "$userEmail" . rand(1, 1000);
    $profileImageType = pathinfo($profileUserPath . $userProfile["name"], PATHINFO_EXTENSION);
    $profileImageName .= "." . $profileImageType;
    // Set Profile Upload Path
    include_once "../../media/user-profile-pictures/directoryPath.php";
    if (!move_uploaded_file($userProfile["tmp_name"], $profileUserPath . $profileImageName)) {
        $JSONResponse['title'] = "Error";
        $JSONResponse['message'] = "File Doesnt Uploaded";
        $JSONResponse = json_encode($JSONResponse);
        echo $JSONResponse;
        die();
    } else {
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
    $JSONResponse['title'] = "Error";
    $JSONResponse['message'] = "Update Data Failed!";
    $JSONResponse = json_encode($JSONResponse);
    echo $JSONResponse;
    die();
}
$JSONResponse['status'] = 1;
$JSONResponse['title'] = "Successful!";
$JSONResponse['message'] = "Your Profile Have been Updated!";
$JSONResponse = json_encode($JSONResponse);
echo $JSONResponse;
die();
