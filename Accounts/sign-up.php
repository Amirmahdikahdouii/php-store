<?php
if (isset($_SESSION["userLogin"])) {
    header("Location: dashboard.php");
}
session_start();
$_SESSION["csrf_token"] = bin2hex(random_bytes(16));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../static/css/signUp.css"/>
</head>
<body>
<section class="main-container">
    <a class="logo" href="../index.php">Coffee Shop</a>
    <div class="sign-in-up-container">
        <button class="form-title" id="login-form-switch-button"><a href="./login.php">Login</a></button>
        <button class="form-title form-title-active" id="sign-in-form-switch-button">Sign Up</button>
    </div>
    <form action="" class="form" method="post" id="sign-up-form">
        <input type="hidden" name="csrf_token" id="csrf_token" value="<?php $_SESSION['csrf_token'] ?>"/>
        <input type="email" name="email" id="email" placeholder="E-Mail" class="form-input"
               title="Please Enter E-mail"/>
        <input type="password" name="password" id="password" placeholder="Password" class="form-input"
               title="Please Enter Password"/>
        <input type="password" name="confirm-password" id="confirm-password" placeholder="Re-Password"
               class="form-input"
               title="Please Enter Password"/>
        <button class="submit-form-button" type="button">Sign Up</button>
    </form>
    <p class="rules-acception-text">
        I accept All <a href="#"> Coffee Shop Rules</a> and <a href="#">privacy</a>
    </p>
</section>

<script src="../static/js/sign-up.js"></script>
</body>
</html>