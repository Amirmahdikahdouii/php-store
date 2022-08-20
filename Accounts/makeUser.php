<?php
include_once "../settings/dbconfig.php";
function checkUsername($value)
{
    global $db_connection;
    $sql = "SELECT email FROM account";
    $result = mysqli_query($db_connection, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($result as $feild => $row) {
        if ($row["email"] === $value) {
            return false;
        }
    }
    return true;
}
if (
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    array_key_exists("email", $_POST) &&
    array_key_exists("password", $_POST)
) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!checkUsername($email)) {
        http_response_code(403);
        die();
    }
    $sql = "INSERT INTO account (`id`, `email`, `password`) VALUES (NULL, '$email', '$password');";
    mysqli_query($db_connection, $sql);
}else{
    header("Location: ../index.php");
}