<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (
    isset($_SESSION['user_login']) &&
    array_key_exists('user_login', $_SESSION)
) {
    header('Location: dashboard.php');
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../static/css/login.css"/>
</head>
<body class="body">
<section class="main-container">
    <!--  User Not Found Modal  -->
    <div id="user-not-found-modal" class="user-not-found-modal">
        <div class="user-not-found-modal-content-container">
            <h1 class="user-not-found-modal-title">Error</h1>
            <p class="user-not-found-modal-text">Email or Password Is Not correct</p>
            <button id="user-not-found-modal-close-button">Close</button>
        </div>
    </div>
    <!--------------------------------------------------------->
    <a class="logo" href="../index.php">Coffee Shop</a>
    <div class="sign-in-up-container">
        <button class="form-title form-title-active" id="login-form-switch-button">Login</button>
        <button class="form-title" id="sign-in-form-switch-button"><a href="./sign-up.php">Sign Up</a></button>
    </div>
    <form action="" class="form" method="post" id="login-form">
        <input type="email" name="email" id="email" placeholder="E-Mail" class="form-input"
               title="Please Enter E-Mail"/>
        <input type="password" name="password" id="password" placeholder="Password" class="form-input"
               title="Please Enter Password"/>
        <button class="submit-form-button" type="submit">Sign In</button>
    </form>
    <p class="rules-acception-text">
        I accept All <a href="#">Coffee Shop Rules</a> and <a href="#">privacy</a>
    </p>
</section>
<?php
include_once "../settings/dbconfig.php";
if (isset($_POST['email']) &&
    isset($_POST['password']) &&
    array_key_exists("email", $_POST) &&
    array_key_exists("password", $_POST)
) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM account WHERE email='$email' AND password='$password';";
    $result = mysqli_query($db_connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        $result = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = intval($result['id']);
        $_SESSION['user_login'] = true;
        $_SESSION['user_id'] = $result['id'];
        // Check This Section later
        if (intval($result['is_admin']) === 1) {
            $_SESSION['user_admin'] = true;
        }
        header('Location: dashboard.php');
    } else {
        echo "<script>
                window.addEventListener('load', ()=>{
                    showUserNotFoundError();
                })
            </script>";
    }
}
?>
<script src="../static/js/login.js"></script>
</body>
</html>
