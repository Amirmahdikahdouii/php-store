<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
// redirect To login if user is not Logined
if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_login'])) {
    $userLoginStatus = ['user_authenticated' => false];
    $userLoginStatus = json_encode($userLoginStatus);
    echo $userLoginStatus;
}
$userLoginStatus = ['user_authenticated' => true];
$userLoginStatus = json_encode($userLoginStatus);
echo $userLoginStatus;
